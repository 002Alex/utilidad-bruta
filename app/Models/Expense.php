<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'provider_id',
        'amount',
        'concept',
        'date',
        'description'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getAmountFormattedAttribute()
    {
        return '$' . number_format($this->amount, 2);
    }

    public function getDateFormattedAttribute()
    {
        return Carbon::parse($this->date)->format('Y-m-d');
    }
}
