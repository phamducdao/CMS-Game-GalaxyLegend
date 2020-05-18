<?php

namespace App\Model;
use App\Traits\Searchable;



use Illuminate\Database\Eloquent\Model;

class reward extends Model
{
    //
    use Searchable;
    protected $table = 'reward';
    public $timestamps = false;
}
