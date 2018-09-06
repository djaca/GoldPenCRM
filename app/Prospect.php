<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

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
    use Sortable;

    public $sortable = [
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



    public function user(){
        return $this->belongsTo('App\User');
    }

    public function notes(){
        return $this->belongsTo('App\Note');
    }

    public function funnel(){
        return $this->belongsTo('App\Funnel');
    }
}
