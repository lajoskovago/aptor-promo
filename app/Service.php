<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nume', 'email', 'nume_contact', 'prenume_contact','email_contact'
    ];
}
