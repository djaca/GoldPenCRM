<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Note extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'prospect_id',
        'title',
        'description'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function prospect(){
        return $this->belongsTo('App\Prospect');
    }
}
