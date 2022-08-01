<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxRang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'range_from',
        'range_to',
        'tax'
    ];

    public function maxValue(): int
    {
        return (int)self::max('range_to');
    }

    public function minValue(): int
    {
        return (int)self::min('range_to');
    }
}
