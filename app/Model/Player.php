<?php

namespace App\Model;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use Searchable;
    protected $table = "player";
    public $timestamps = false;

}
