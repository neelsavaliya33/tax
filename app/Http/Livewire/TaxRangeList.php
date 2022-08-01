<?php

namespace App\Http\Livewire;

use App\Models\TaxRang;
use Livewire\Component;

class TaxRangeList extends Component
{
    public $taxRanges;

    protected $listeners = ['taxCreated' => 'refresh'];

    public function mount()
    {
        $this->taxRanges = TaxRang::orderBy('range_from')->get();
    }

    public function render()
    {
        return view('livewire.tax-range-list');
    }

    public function refresh()
    {
        $this->taxRanges = TaxRang::orderBy('range_from')->get();
    }
}
