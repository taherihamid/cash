<?php

namespace App\Classes;

use App\SsoLog;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Request;
use stdClass;
use Illuminate\Support\Facades\Lang;

class SSO
{
    protected $config;

    public function __construct()
    {
        $this->config = config('operators.sso');
    }

    /**
     * Signup - Send OTP to msisdn
     *
     * @param $msisdn
     * @return mixed
     * @throws Exception
     */
    public function signUp($msisdn)
    {
        $msisdn = $this->msisdnNormalizer($msisdn);

        $data = [
            'msisdn'    => $msisdn,
            'serviceId' => $this->config['service-id'],
            'type'      => 'msisdn'
        ];

        $response = $this->request('POST', 'signup', $data, $msisdn);

        return $this->response($response);
    }

    /**
     * Login - Verify user by send code and receive bearer token
     *
     * @param $msisdn
     * @param $code
     * @return mixed
     * @throws Exception
     */
    public function login($msisdn, $code)
    {
//        $msisdn = $this->msisdnNormalizer($msisdn);

        $data = [
            'username'  => $msisdn,
            'password'  => $code,
        ];

        $response = $this->request('POST', 'login', $data, $msisdn);

        if (($response->header and isset($response->header['Authorization'][0]))) {
            $response->body = str_replace('Bearer ', '', $response->header['Authorization'][0]);
        }

        return $this->response($response);
    }

    /**
     * Send OTP - Send OTP to msisdn
     *
     * @param $msisdn
     * @return mixed
     * @throws Exception
     */
    public function sendOtp($msisdn)
    {
        $msisdn = $this->msisdnNormalizer($msisdn);

        $data = [
            'msisdn'    => $msisdn,
            'serviceId' => $this->config['service-id'],
        ];


        $response = $this->request('POST', 'otp/request', $data, $msisdn);

        return $this->response($response);
    }


    /*
     * Validate OTP
     *
     * @param $msisdn
     * @param $code
     * @return mixed
     * @throws Exception
     */
    public function confirmOtp($msisdn, $code){

        $msisdn = $this->msisdnNormalizer($msisdn);

        $data = [
            'msisdn'    =>$msisdn,
            'serviceId' =>$this->config['service-id'],
            'password'  =>$code,
        ];

        $response = $this->request('POST', 'otp/validate',$data, $msisdn);

        return $this->response($response);
    }


    /**
     * Produce Response.
     *
     * @param $response
     * @return mixed
     */
    protected function response($response)
    {
        unset($response->header);

        return $response;
    }

    /**
     * Request generator.
     *
     * @param $method
     * @param $url
     * @param array $data
     * @param string $dataType
     * @return stdClass
     */
    protected function request($method, $url, $data = [], $msisdn, $dataType = 'json'): stdClass
    {
        $result = new stdClass();
        $result->status = false;
        $result->statusCode = null;
        $result->message = null;
        $result->header = null;
        $result->body = null;
        $result->data = null;
        $result->wait = false;


        $client = new Client([
            'base_uri' => $this->config['baseurl'],
            'timeout'  => $this->config['timeout'],
        ]);
//        dd($client);
      try {
            $response = $client->request($method, $url, [
                $dataType => $data,
               /* 'verify'   => false,
                'curl' => [
                    CURLOPT_SSL_VERIFYPEER => false
                ],*/
            ]);

            $sso_log = new SsoLog();
            $sso_log->msisdn = $msisdn;
            $sso_log->type = $url;
            $sso_log->request = json_encode($data);
            $sso_log->ip = Request::ip();

            $result->statusCode = $response->getStatusCode();
            $sso_log->status = $result->statusCode;
            info($response->getStatusCode());
            info($result->statusCode);

            if ($result->statusCode == 200) {
                $result->header = $response->getHeaders();
                $result->body = json_decode($response->getBody());

                info('sso response');
                info($response->getBody());

                $result->message = 'success';

                $sso_log->response = json_encode($result->body);

                if (isset($result->body->responseCode)) {

                    $result->message = Lang::has("messages.sso.responses.{$result->body->responseCode}") ? Lang::get("messages.sso.responses.{$result->body->responseCode}") : Lang::get('messages.sso.responses.99');

                    if ($result->body->responseCode == 0) {
                        $result->status = true;
                    }elseif ($result->body->responseCode == 112){
                        $result->wait = true;
                    }
                }

            }else{
                $result->status = false;
                $result->message = 'failed';
            }

            $sso_log->save();
      }
      catch (RequestException $e) {
           info('request exception'.$e->getMessage());
            $result->statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 500;
            $result->message = $e->getMessage();
        }
        catch (GuzzleException $e) {
           info('guzzle exception');
            $result->statusCode = 500;
            $result->message = $e->getMessage();
        }
        catch (\Exception $e){
           info('timeout exception');
            $result->statusCode = 500;
            $result->message = $e->getMessage();
        }
        dd($result);
        return $result;
    }

    /**
     * Generate normal msisdn.
     *
     * @param $input
     * @return null|string
     * @throws Exception
     */
    protected function  msisdnNormalizer($input)
    {
        $msisdn = setClearPhone($input, 98);

        if ($msisdn) {
            return $msisdn;
        }

        throw new Exception('msisdn is not valid');
    }
}
