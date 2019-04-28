<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
use App\Model\SubjectCategory;

class SubjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/subject-categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin/subject-categories-add', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubjectCategory::create($request->all());
        return redirect('category')->with('success-message', 'Successfully added subject category record!');   
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
        $subjects = Subject::all();
        $category = SubjectCategory::findOrFail($id);
        return view('admin/subject-categories-add', compact('category', 'subjects'));
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
        SubjectCategory::find($id)->update($request->all());
        return redirect('category')->with('success-message', 'Successfully updated subject category record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getSubjectCategoriesJson()
    {
        $categories = SubjectCategory::all(); 
        $json = [
            'data' => []
        ];
        $i = 0;
        foreach ($categories as $key => $category) {
            $i++;
            $arr = [
                $i,
                $category->subject->name,
                $category->name,
                '<form method="POST" action="/category/'.$category->id.'">
                     '.csrf_field().''.method_field('DELETE').' 
                    <a href="/category/'.$category->id.'/edit" class="btn btn-mint btn-icon btn-xs"><i class="demo-psi-pen-5 icon-sm"></i></a>
                    <button type="submit" data-id="'.$category->id.'" class="btn btn-danger btn-icon btn-xs btn-delete"><i class="demo-psi-remove icon-sm"></i></button>
                </form>',
            ];
            array_push($json['data'], $arr);
        }

        return json_encode($json);
    }
}
