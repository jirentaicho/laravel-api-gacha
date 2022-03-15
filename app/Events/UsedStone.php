<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UsedStone
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public int $used_stone;

    public string $gacha_type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $used_stone, string $gacha_type)
    {
        //
        $this->used_stone = $used_stone;
        $this->gacha_type = $gacha_type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
