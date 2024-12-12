<?php

namespace App\Events;

use App\Models\Mensajes;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Mensajes $mensaje;
    public int $chatId;
    /**
     * Create a new event instance.
     */
    public function __construct(Mensajes $mensaje, int $chatId)
    {
        $this->mensaje=$mensaje;
        $this->chatId=$chatId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel("chat_$this->chatId");
    }

    // public function broadcastAs(){
    //     return 'message.sent';
    // }
}
