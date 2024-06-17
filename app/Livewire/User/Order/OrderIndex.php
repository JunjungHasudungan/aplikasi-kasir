<?php

namespace App\Livewire\User\Order;

use Livewire\Attributes\Title;
use Livewire\Component;

class OrderIndex extends Component
{
    #[Title('ORDER-USER')]
    public function render()
    {
        return view('livewire.user.order.order-index');
    }
}
