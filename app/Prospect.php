<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = [
        'user_id',
        'funnel_id',
        'name_last',
        'name_first',
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
