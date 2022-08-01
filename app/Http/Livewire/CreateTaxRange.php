<?php

namespace App\Http\Livewire;

use App\Models\TaxRang;
use Livewire\Component;

class CreateTaxRange extends Component
{
    public $range_from, $range_to, $tax;

    protected $rules = [
        'range_from' => "required|numeric",
        'range_to' => ['required', 'numeric', 'greater_than_field:range_from'],
        'tax' => ['required', 'numeric']
    ];
    protected $customMessages = ['greater_than_field' => 'The :attribute value must be greater than start amount.'];

    public function render()

    {
        $maxValue = TaxRang::maxValue();
        $this->range_from = $maxValue == 0 ? 0 : $maxValue + 1;
        return view('livewire.create-tax-range');
    }

    public function create()
    {
        $this->validate($this->rules,$this->customMessages);
        TaxRang::create([
            'range_from' => $this->range_from,
            'range_to' => $this->range_to,
            'tax' => $this->tax
        ]);
        $this->emit('success', 'Tax range created successfully.');
        $this->emit('taxCreated');
//        $this->refresh();
        $this->reset();
    }
}
