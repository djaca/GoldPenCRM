<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'fax'
    ];
}
