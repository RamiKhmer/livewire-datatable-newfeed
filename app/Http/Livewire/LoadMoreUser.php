<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class LoadMoreUser extends Component
{

    public $perPage = 35;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore(){
        $this->perPage = $this->perPage + 15;
    }

    public function render()
    {
        $users = User::latest()->paginate($this->perPage);
        $this->emit('userStore');

        return view('livewire.load-more-user', ['users' => $users]);
    }
}
