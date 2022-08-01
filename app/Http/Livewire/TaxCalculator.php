<?php

namespace App\Http\Livewire;

use App\Models\TaxRang;
use Livewire\Component;

class TaxCalculator extends Component
{
    public $earning, $tax = 0;

    protected $rules = ['earning' => 'required|numeric'];

    public function render()
    {
        return view('livewire.tax-calculator');
    }

    function calculateTax()
    {
        $this->validate();
        $taxableValue = $this->earning;
        $totalTax = 0;
        $taxedValue = 0;
        TaxRang::orderBy('range_from')->get()->each(function ($tax) use (&$taxableValue, &$totalTax, &$taxedValue) {
            if ($taxedValue <= $taxableValue) {
                if ($taxableValue <= $tax->range_to) {
                    $ctv = $taxableValue - $taxedValue;
                    $totalTax += $this->getPercentage($tax->tax, $ctv);
                    $taxedValue += $taxableValue;
                } else {
                    $ctv = ($tax->range_to) - $taxedValue;
                    $totalTax += $this->getPercentage($tax->tax, $ctv);
                    $taxedValue += $ctv;
                }
            }
        });
        $this->tax = $totalTax;

    }

    public function getPercentage($percentage, $total)
    {
        return ($total * $percentage) / 100;
    }
}
