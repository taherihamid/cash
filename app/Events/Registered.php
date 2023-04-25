<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;

class Registered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $personal_id;
    public $api_key;
    public $password;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email,$personal_id, $password,$api_key = null)
    {
        $this->email = $email;
        $this->personal_id = $personal_id;
        $this->api_key = $api_key;
        $this->password = $password;
    }
}
