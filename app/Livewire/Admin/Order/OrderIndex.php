<?php

namespace App\Livewire\Admin\Order;

use Livewire\Attributes\Title;
use Livewire\Component;

class OrderIndex extends Component
{
    #[Title('ORDER-CUSTOMER')] 
    public function render()
    {
        return view('livewire.admin.order.order-index');
    }
}
