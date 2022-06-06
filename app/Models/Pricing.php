<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'offer_topic',
        'offer_type',
        'price',
        'old_price',
        'duration',
        'offer_description',
    ];
}
