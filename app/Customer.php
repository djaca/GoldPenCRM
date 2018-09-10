<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use Sortable;

    public $sortable = [
        'user_id',
        'funnels_id',
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

    protected $fillable = [
        'user_id',
        'funnels_id',
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

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function funnel(){
        return $this->belongsTo('App\Funnel');
    }
}
