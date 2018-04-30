<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'fax',
    ];
}
