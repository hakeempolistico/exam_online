<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Module;
use App\Model\Question;
use App\Model\Choice;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/questions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin/questions-add', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->choices);11
        $question = Question::create($request->all());
        $choice = $this->storeChoices($question, $request->choices);
        return redirect('question')->with('success-message', 'Successfully added question record!');    
    }

    private function storeChoices($question, $choices)
    {
        $arr = [];
        foreach ($choices as $key => $choice) {
            $arr[] = Choice::create([
                'question_id' => $question->id,
                'choice' => $choice
            ]);
        }
        return $arr;
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
        $modules = Module::all();
        $question = Question::findOrFail($id);
        return view('admin/questions-add', compact('question', 'modules'));
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
        $question = Question::find($id);
        $question->update($request->all());
        $question->choices->each->delete();
        $choices = $this->storeChoices($question, $request->choices);

        return redirect('question')->with('success-message', 'Successfully updated question record!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return redirect('question')->with('error-message', 'Successfully deleted question record!');
    }

    public function getQuestionsJson()
    {
        $questions = Question::all(); 
        $json = [
            'data' => []
        ];
        foreach ($questions as $key => $question) {
            $arr = [
                $key+1,
                $question->module->name,
                $question->question,
                '<form method="POST" action="/question/'.$question->id.'">
                     '.csrf_field().''.method_field('DELETE').' 
                    <a href="/question/'.$question->id.'/edit" class="btn btn-mint btn-icon btn-xs"><i class="demo-psi-pen-5 icon-sm"></i></a>
                    <button type="submit" data-id="'.$question->id.'" class="btn btn-danger btn-icon btn-xs btn-delete"><i class="demo-psi-remove icon-sm"></i></button>
                </form>',
            ];
            array_push($json['data'], $arr);
        }

        return json_encode($json);
    }
}
