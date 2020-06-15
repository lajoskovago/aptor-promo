<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nume', 'email', 'nume_contact', 'email_contact'
    ];
}
