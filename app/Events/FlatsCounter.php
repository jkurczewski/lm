<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FlatsCounter implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $flats;

    public function __construct($flats)
    {
        $this->flats = $flats;
    }

    public function broadcastOn()
    {
        return ['flats'];
    }
    public function broadcastAs()
    {
        return 'flats-count';
    }

    public function broadcastWith() {
        return [
            'counter' => $this->flats
        ];
    }
}
