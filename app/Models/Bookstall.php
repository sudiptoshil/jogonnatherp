<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookstall extends Model
{
    protected $guarded =[];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
