<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    protected $fillable = [
        'charity_legal_name', 'full_address', 'charity_website', 'service_type',
        'latitude', 'longitude', 'state', 'postcode'
    ];
}
