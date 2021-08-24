<?php

namespace App\Http\Livewire\Room;

use App\Models\Message;
use App\Models\Room;
use Livewire\Component;

class Messages extends Component
{
    public $messages;

    public $room;

    public function getListeners()
    {
        return [
            'message-added'=>'prependMessage',
            "echo-private:room.chat.{$this->room->id},Room\\MessageAdded"=>'prependMessageFromBroadcast',
        ];

    }

    public function prependMessage($messages)
    {
        $this->messages->prepend(Message::find($messages));
    }

    public function prependMessageFromBroadcast($payload)
    {

        $this->prependMessage($payload['messageId']);
    }

    public function mount($messages , Room $room)
    {
        $this->messages = $messages;
        $this->room = $room;
    }


    public function render()
    {
        return view('livewire.room.messages');
    }
}
