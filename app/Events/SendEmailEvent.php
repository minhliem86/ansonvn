<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendEmailEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     protected $layout;
     protected $arrayData;
     protected $from;
     protected $to;
     protected $subject;
    public function __construct($layout, $arrayData, $from, $to, $subject)
    {
        $this->layout = $layout;
        $this->arrayData = $arrayData;
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
