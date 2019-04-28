<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
	protected $fillable = array('subject_id', 'name');

	public function subject()
    {
        return $this->belongsTo('App\Model\Subject');
    }
}
