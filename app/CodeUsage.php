<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeUsage extends Model
{
    protected $fillable = [
        'service_id', 'service_option_id', 'promo_code'
    ];
}
