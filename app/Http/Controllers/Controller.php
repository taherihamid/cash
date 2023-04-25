<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


/**
 * @OA\Info(
 *    title="Cash2Pay  ApplicationAPI",
 *    version="1.0.0",
 * )
 */

class Controller extends BaseController
{
    const HTTP_OK = 200;
    const HTTP_NO_CONTENT = 204;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_NOT_FOUND = 404;
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_SSO_LOGIN_ERROR = 440;
    const HTTP_ERROR = 500;

    const MESSAGE_SUCCESS = 1;
    const MESSAGE_VALIDATION_ERROR = 2;
    const MESSAGE_UNKNOWN_ERROR = 3;
    const MESSAGE_NOT_FOUND = 4;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $paginate_count  = 12;

    public function __construct()
    {

    }

    protected function sortModel(Request $request, $model)
    {
        $this->validate($request, [
            'model' => 'required',
            'swap'  => 'required',
            'type'  => ['required', 'in:moveAfter,moveBefore']
        ]);

        $rows = $model::withoutGlobalScopes()->whereIn('id', [$request->model, $request->swap])->get();

        if ($rows->count() == 2) {
            try {
                $model = $rows->where('id', $request->model)->first();
                $swap = $rows->where('id', $request->swap)->first();

                if ($request->type == 'moveBefore')
                    $model->moveBefore($swap);
                else
                    $model->moveAfter($swap);

                $data = ['status' => 1, 'message' => $this->successMessage()];
            }
            catch (Exception $e) {
                $data = ['status' => 0, 'message' => $e->getMessage()];
            }
        }
        else {
            $data = ['status' => 0, 'message' => $this->unknownErrorMessage()];
        }

        return response()->json($data, 200);
    }

}
