<?php

namespace App\Http\Livewire\Room;

use App\Events\Room\MessageAdded;
use App\Models\Room;
use Livewire\Component;

class SendMessage extends Component
{
    public $message;

    public $room;

    protected $rules=[
        'message'=>'required|min:3|max:1024'
    ];

    public function room(Room $room)
    {
        $this->room = $room;
    }

    public function updated($name){
        $this->validateOnly($name);
    }

    public function send()
    {
        $this->validate();
        $message= $this->room->messages()->create([
            'body'=>$this->message,
            'user_id'=>auth()->user()->id,
        ]);

        $this->emit('message-added',$message->id);
        broadcast(new MessageAdded($this->room->id,$message->id))->toOthers();
        $this->message=null;
    }
    public function render()
    {
        return view('livewire.room.send-message');
    }
}
