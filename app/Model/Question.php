<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = array('question', 'module_id');

    public function module()
    {
    	return $this->belongsTo('App\Model\Module');
    }

    public function choices()
    {
    	return $this->hasMany('App\Model\Choice');
    }
}
