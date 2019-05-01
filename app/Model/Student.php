<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = array('student_id', 'user_id', 'first_name', 'middle_name', 'last_name', 'contact_number', 'gender');

    public function user()
    {
    	return $this->belongsTo('App\Model\User');
    }

}
