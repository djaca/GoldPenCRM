<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Note extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'prospect_id',
        'customer_id',
        'title',
        'description'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function prospect(){
        return $this->belongsTo('App\Prospect');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
