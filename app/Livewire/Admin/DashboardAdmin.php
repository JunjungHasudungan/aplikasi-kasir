<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Title;
use Livewire\Component;

class DashboardAdmin extends Component
{

    public $product;
    public $order;
    
    #[Title('DASHBOARD')] 
    public function render()
    {
        return view('livewire.admin.dashboard-admin');
    }
}
