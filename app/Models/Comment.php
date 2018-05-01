<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['issue_id','content','user_id'];

    public function issue(){
        return $this->belongsTo('App\Models\Issue');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
