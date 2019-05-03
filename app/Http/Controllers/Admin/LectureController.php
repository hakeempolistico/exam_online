<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Lecture;
use App\Model\SubjectCategory;
use App\Model\Score;
use App\Model\User;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/lecture');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentIndex()
    {
        $lectures = Lecture::all();
        $categories = SubjectCategory::all();
        return view('student/lecture', compact('lectures', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject_categories = SubjectCategory::all();
        return view('admin/lecture-add', compact('subject_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lecture::create($request->all());
        return redirect('lecture')->with('success-message', 'Successfully added module record!');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeScore($user_id, $module_id, $score)
    {
        $score = [
            'user_id' => $user_id,
            'module_id' => $module_id,
            'score' => $score
        ];

        $score = Score::create($score);

        return redirect('/result/'.$user_id);    
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function studentShow($lecture_id)
    {
        $lecture = Lecture::findOrFail($lecture_id);
        return view('student/lecture-sheet', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject_categories = SubjectCategory::all();
        $lecture = Lecture::findOrFail($id);
        return view('admin/lecture-add', compact('subject_categories', 'lecture'));
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
        $lecture = Lecture::find($id);
        $lecture->update($request->all());

        return redirect('lecture')->with('success-message', 'Successfully updated lecture record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lecture::findOrFail($id)->delete();
        return redirect('lecture')->with('error-message', 'Successfully deleted lecture record!');
    }

    public function getlecturesJson()
    {
        $lectures = Lecture::all(); 
        $json = [
            'data' => []
        ];
        $i = 0;
        foreach ($lectures as $key => $lecture) {
            $i++;
            $arr = [
                $i,
                $lecture->subject_category->name,
                $lecture->title,
                '<form method="POST" action="/lecture/'.$lecture->id.'">
                     '.csrf_field().''.method_field('DELETE').' 
                    <a href="/lecture/'.$lecture->id.'/edit" class="btn btn-mint btn-icon btn-xs"><i class="demo-psi-pen-5 icon-sm"></i></a>
                    <button type="submit" data-id="'.$lecture->id.'" class="btn btn-danger btn-icon btn-xs btn-delete"><i class="demo-psi-remove icon-sm"></i></button>
                </form>',
            ];
            array_push($json['data'], $arr);
        }

        return json_encode($json);
    }

    public function result($user_id)
    {
        $user = User::findOrFail($user_id);   
        return view('student/result', compact('user'));
    }
}
