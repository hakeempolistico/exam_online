<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Module;
use App\Model\SubjectCategory;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/modules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = SubjectCategory::all();
        return view('admin/modules-add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Module::create($request->all());
        return redirect('module')->with('success-message', 'Successfully added module record!');    
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
        $module = Module::findOrFail($id);
        $categories = SubjectCategory::all();
        return view('admin/modules-add', compact('module', 'categories'));
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
        Module::find($id)->update($request->all());
        return redirect('module')->with('success-message', 'Successfully updated module record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::findOrFail($id)->delete();
        return redirect('module')->with('error-message', 'Successfully deleted module record!');
    }

    public function getModulesJson()
    {
        $modules = Module::all(); 
        $json = [
            'data' => []
        ];
        foreach ($modules as $key => $module) {
            $arr = [
                $key+1,
                $module->name,
                $module->description,
                $module->category->name,
                '<form method="POST" action="/module/'.$module->id.'">
                     '.csrf_field().''.method_field('DELETE').' 
                    <a href="/module/'.$module->id.'/edit" class="btn btn-mint btn-icon btn-xs"><i class="demo-pli-pen-5 icon-sm"></i></a>
                    <a href="/module/'.$module->id.'/questions" class="btn btn-success btn-icon btn-xs"><i class="demo-pli-question icon-sm"></i></a>
                    <button type="submit" data-id="'.$module->id.'" class="btn btn-danger btn-icon btn-xs btn-delete"><i class="demo-pli-remove icon-sm"></i></button>
                </form>',
            ];
            array_push($json['data'], $arr);
        }

        return json_encode($json);
    }
}
