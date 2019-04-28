<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/subjects');
    }

    public function getSubjectsJson()
    {
        $subjects = Subject::all(); 
        $json = [
            'data' => []
        ];
        $i = 0;
        foreach ($subjects as $key => $subject) {
            $i++;
            $arr = [
                $i,
                $subject->name,
                '<form method="POST" action="/subject/'.$subject->id.'">
                     '.csrf_field().''.method_field('DELETE').' 
                    <a href="/subject/'.$subject->id.'/edit" class="btn btn-mint btn-icon btn-xs"><i class="demo-psi-pen-5 icon-sm"></i></a>
                    <button type="submit" data-id="'.$subject->id.'" class="btn btn-danger btn-icon btn-xs btn-delete"><i class="demo-psi-remove icon-sm"></i></button>
                </form>',
            ];
            array_push($json['data'], $arr);
        }

        return json_encode($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/subjects-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subject::create($request->all());
        return redirect('subject')->with('success-message', 'Successfully added subject record!');    
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
        $subject = Subject::findOrFail($id);
        return view('admin/subjects-add', compact('subject'));
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
        Subject::find($id)->update($request->all());
        return redirect('subject')->with('success-message', 'Successfully updated subject record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
        return redirect('subject')->with('error-message', 'Successfully deleted subject record!');
    }
}
