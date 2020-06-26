<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourist extends Model
{
    protected $fillable = [
        'nume', 'prenume', 'email', 'hotel','checkin_date', 'checkout_date', 'checkout_timestamp', 'oras', 'tara', 'transport', 'scop', 'voucher', 'telefon'
    ];
}
