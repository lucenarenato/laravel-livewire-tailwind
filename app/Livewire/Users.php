<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $deleteId = '';
    public $showModal = false;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.users', [
            'users' => User::take(10)->get(),
        ])->layout('layouts.app-livewire');
        //->extends('layouts.app');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function deleteId($id)
    {
        $this->deleteId = $id;
        // Set showModal to true when delete button is clicked
        //$this->showModal = true;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete()
    {
        User::find($this->deleteId)->delete();
        //$this->showModal = false;
    }
}
