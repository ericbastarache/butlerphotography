<?php

namespace App;

use App\Gallery;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $table = 'galleries';

    public function photos () 
    {
    	return $this->hasMany('App\Photos', 'gallery_id');
    }
}
