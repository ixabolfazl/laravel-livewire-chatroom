<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    protected $listeners=[
        'room-added'=>'$refresh',
        'echo-private:room.added,Eoom\\RoomAdded'=>'$refresh',
    ];

    public function render()
    {
        $rooms=Room::latest()->get();
        return view('livewire.room.index',compact('rooms'));
    }
}
