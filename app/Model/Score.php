<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['user_id', 'module_id', 'score'];

    public function user()
    {
    	return $this->hasOne('App\Model\User');
    }

    public function module()
    {
    	return $this->belongsTo('App\Model\Module');
    }
}
