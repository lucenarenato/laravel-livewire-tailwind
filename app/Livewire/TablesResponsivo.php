<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class TablesResponsivo extends Component
{
    use WithPagination;

    public $orders;

    public function mount()
    {
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->orders = Order::paginate(10)->items();
    }

    public function render()
    {
        return view('livewire.tables-responsivo')->layout('layouts.app-livewire');
    }
}
