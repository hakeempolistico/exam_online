<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = array('title', 'content', 'subject_category_id');

    public function subject_category()
    {
    	return $this->belongsTo('App\Model\SubjectCategory');
    }
}
