<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOption extends Model
{
    protected $fillable = [
        'nume_serviciu', 'descriere_serviciu', 'service_id'
    ];
}
