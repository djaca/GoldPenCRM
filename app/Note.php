<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

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
        'title',
        'description'
    ];

    use Sortable;

    public $sortable = [
        'id',
        'user_id',
        'prospect_id',
        'title',
        'description',
        'created_at'
    ];

    public $sortableAs = ['not_admin'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function prospect(){
        return $this->belongsTo('App\Prospect');
    }

    public function funnel(){
        return $this->belongsTo('App\Funnel');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

}
