<?php

namespace App\Livewire\Custom;

use App\Models\Com10;
use Illuminate\Support\Collection;
use Livewire\Component;

class NavigationMenu extends Component
{
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    public function render()
    {
        $com10s = Com10::all();
        $cvens = auth()->user()->codVendedorAsignados->pluck('cven');
        return view('livewire.custom.navigation-menu', compact('cvens', 'com10s'));
    }
}
