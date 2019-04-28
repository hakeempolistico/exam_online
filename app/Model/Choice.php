<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = array('question_id', 'choice', 'answer');

    public function question()
    {
    	return $this->belongsTo('App\Model\Question');
    }

}
