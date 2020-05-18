<?php

namespace App\Model;
use App\Traits\Searchable;

use Illuminate\Database\Eloquent\Model;

class playecamp extends Model
{
    //
    use Searchable;
    protected $table = "playercamp";
    public $timestamps = false;
    public function player(){
        return $this->hasOne('App\Model\Player', 'id','playerid');
    }
    public function campain(){
        return $this->hasOne('App\Model\campain', 'id','campid');
    }

}
