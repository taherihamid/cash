<?php

namespace App\Classes;

use App\Notification;
use App\AdminDeviceToken;
use Edujugon\PushNotification\PushNotification;

class AdminPush
{
    protected $message;
    protected $type;
    protected $android_tokens = [];
    protected $ios_tokens = [];

    public function __construct($message, $type, $tokens = [])
    {
        $this->message = $message;
        $this->type = $type;

        $this->setTokens($tokens);
    }

    public function send()
    {
        switch ($this->type) {
            case Notification::ALL_DEVICE_TYPE:
                $this->android();
                $this->ios();
                break;

            case Notification::ANDROID_DEVICE_TYPE:
                $this->android();
                break;

            case Notification::IOS_DEVICE_TYPE:
                $this->ios();
                break;
        }
    }

    private function android()
    {
        $message = $this->setMessage(Notification::ANDROID_DEVICE_TYPE);

        $push = new PushNotification('fcm');
        $push->setMessage($message);

        $push->setDevicesToken($this->android_tokens);
        $push->send();

        $feedback = $push->getFeedback();

        return (bool)$feedback->success;
    }

    private function ios()
    {
        $message = $this->setMessage(Notification::IOS_DEVICE_TYPE);

        $push = new PushNotification('apn');
        $push->setMessage($message);
        $push->setDevicesToken($this->ios_tokens);
        $push->send();
        $feedback = $push->getFeedback();
        $unregistered_tokens = $push->getUnregisteredDeviceTokens();

        if ($unregistered_tokens) {
            AdminDeviceToken::whereIn('reg_id', $unregistered_tokens)->update(['reg_id' => null]);
        }

        if (isset($feedback->success))
            return (bool)$feedback->success;

        return false;
    }

    private function setTokens($tokens)
    {
        $exist = false;

        if (is_array($tokens) && !empty($tokens)) {
            $exist = true;
        } else if ($tokens) {
            $exist = true;
            $tokens = [$tokens];
        }

        if (!$exist) {
            switch ($this->type) {
                case Notification::ALL_DEVICE_TYPE:
                    $tokens = $this->getAllTokens();
                    $this->ios_tokens = $tokens['ios'];
                    $this->android_tokens = $tokens['android'];
                    break;

                case Notification::ANDROID_DEVICE_TYPE:
                    $this->android_tokens = $this->getAndroidTokens();
                    break;

                case Notification::IOS_DEVICE_TYPE:
                    $this->ios_tokens = $this->getIOSTokens();
                    break;
            }
        } else {
            switch ($this->type) {
                case Notification::ANDROID_DEVICE_TYPE:
                    $this->android_tokens = $tokens;
                    break;

                case Notification::IOS_DEVICE_TYPE:
                    $this->ios_tokens = $tokens;
                    break;
            }
        }
    }

    private function getAllTokens()
    {
        $tokens = AdminDeviceToken::groupBy('reg_id')->get();

        $ios = $tokens->where('type', AdminDeviceToken::IOS)->pluck('reg_id')->toArray();
        $android = $tokens->where('type', AdminDeviceToken::ANDROID)->pluck('reg_id')->toArray();
        $web = $tokens->where('type', AdminDeviceToken::WEB)->pluck('reg_id')->toArray();

        return [
            'ios' => $ios,
            'android' => $android,
            'web' => $web,
        ];
    }

    private function getAndroidTokens()
    {
        $tokens = AdminDeviceToken::where('type', AdminDeviceToken::ANDROID)->whereNotNull('reg_id')->groupBy('reg_id')->get()->pluck('reg_id')->toArray();
        return $tokens;
    }

    private function getIOSTokens()
    {
        $tokens = AdminDeviceToken::where('type', AdminDeviceToken::IOS)->whereNotNull('reg_id')->groupBy('reg_id')->get()->pluck('reg_id')->toArray();
        return $tokens;
    }

    private function setMessage($type)
    {
        if ($type == Notification::IOS_DEVICE_TYPE) {
            if ($this->message['title']) {
                return [
                    'aps' => [
                        'alert' => [
                            'title' => $this->message['title'],
                            'body'  => $this->message['body']
                        ],
                        'sound' => 'default'
                    ],
                    'payload'   => [
                        'type'  => $this->message['type'],
                        'url'   => $this->message['url'],
                        'image' => $this->message['image'],
                    ]
                ];
            } else {
                return [
                    'aps' => [
                        'alert' => [
                            'body' => $this->message['body']
                        ],
                        'sound' => 'default'
                    ],
                    'payload'   => [
                        'type'  => $this->message['type'],
                        'url'   => $this->message['url'],
                        'image' => $this->message['image'],
                    ]
                ];
            }
        } else {
            if ($this->message['title']) {
                return [
                    'data' => [
                        'title' => $this->message['title'],
                        'body'  => $this->message['body'],
                        'type'  => $this->message['type'],
                        'url'   => $this->message['url'],
                        'image' => $this->message['image'],
                        'sound' => 'default'
                    ]
                ];
            } else {
                return [
                    'data' => [
                        'body'  => $this->message['body'],
                        'type'  => $this->message['type'],
                        'url'   => $this->message['url'],
                        'image' => $this->message['image'],
                        'sound' => 'default'
                    ]
                ];
            }
        }
    }
}
