<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('view.questions') || Gate::allows('create.questions'), 403);
        $questions = Question::all();
        return view('admin.preguntas.index', compact('questions'));   
    }

    public function save(QuestionRequest $request)
    {
        abort_unless(Gate::allows('view.questions') || Gate::allows('edit.questions'), 403);
        
        $question = new Question;
        $question->question = $request->question;
        $question->description = $request->description;
        $question->save();

        alert('Se ha agregado una pregunta.');

        return response('', 204, [
            'Redirect-To' => url('admin/preguntas/')
        ]);
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('view.questions') || Gate::allows('edit.questions'), 403);
        $question = question::find($id);

        return view('admin.preguntas.editar', compact('question'));
    }


    public function update(QuestionRequest $request, $id)
    {
        abort_unless(Gate::allows('view.questions') || Gate::allows('edit.questions'), 403);

        $question = Question::find($id);
        $question->question = $request->question;
        $question->description = $request->description;

        $question->save();

        alert('Se ha actualizado una pregunta.');

        return response('', 204, [
            'Redirect-To' => url('admin/preguntas/')
        ]);
    }

    public function delete($id)
    {
        abort_unless(Gate::allows('view.questions') || Gate::allows('create.questions'), 403);

        $question = Question::find($id);
        $question->delete();

        return response('', 204);

    }
}
