<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\Student;
use App\Model\User;
use App\Model\UserType;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->getStudentsJson();
        return view('admin\students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\student-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentExist = Student::where('student_id', $request->student_id)->first();
        if($studentExist){
            return redirect()->back()->with('error-message', 'Student ID already exists!');
        }

        $userExist = User::where('email', $request->email)->first();
        if($userExist){
            return redirect()->back()->with('error-message', 'Email already exists!'); 
        }

        // Create User Account
        $request->password = Hash::make($request->password);
        $user_type_id = UserType::where('name', 'student')->first()->id;
        $user = [
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'user_type_id' => $user_type_id,
        ]; 
        $user_info = User::create($user);
        $student = $request->all();
        $student_info = $user_info->student()->create($student);
        return redirect('student')->with('success-message', 'Successfully added student record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin\student-add', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $update_student = $student->update($request->all());
        $update_user = $student->user()->update($request->all());
        return redirect('student')->with('success-message', 'Successfully updated student record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        Session::flash('error-message', 'Successfully deleted student record!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset($id)
    {
        $student = Student::findOrFail($id);
        return view('admin\student-reset', compact('student'));
    }
    public function updatePassword(Request $request, $id)
    {
        $request->password = Hash::make($request->password);
        $user_id = Student::findOrFail($id)->user_id;
        User::find($user_id)->update($request->all());
        return redirect('admin\student')->with('success-message', 'Successfully updated password record!');
    }

    public function getStudentsJson()
    {
        $students = Student::all(); 
        $json = [
            'data' => []
        ];
        $i = 0;
        foreach ($students as $key => $student) {
            $i++;
            $arr = [
                $i,
                $student->student_id,
                $student->first_name,
                $student->middle_name,
                $student->last_name,
                $student->gender,
                $student->address,
                $student->contact_number,
                $student->year.'-'.$student->section,
                '<a href="/student/'.$student->id.'/edit" class="btn btn-mint btn-icon btn-xs"><i class="demo-psi-pen-5 icon-sm"></i></a>
                <a href="/student/'.$student->id.'/reset" class="btn btn-primary btn-icon btn-xs"><i class="demo-psi-lock-user icon-sm"></i></a>
                <a data-id="'.$student->id.'" class="btn btn-danger btn-icon btn-xs btn-delete"><i class="demo-psi-remove icon-sm"></i></a>',
            ];
            array_push($json['data'], $arr);
        }

        return json_encode($json);
    }
}
