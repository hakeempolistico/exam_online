<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	protected $fillable = array('name', 'description', 'subject_category_id');

	public function category()
    {
        return $this->belongsTo('App\Model\SubjectCategory', 'subject_category_id');
    }

	public function questions()
    {
        return $this->hasMany('App\Model\Question');
    }

}
