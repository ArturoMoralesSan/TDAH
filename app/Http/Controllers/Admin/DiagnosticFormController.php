<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosticForm;
use App\Models\Diagnostic;
use App\Models\Question;
use App\Models\QuestionForm;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\DiagnosticFormRequest;
use Illuminate\Support\Str;

class DiagnosticFormController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('view.diagnosticsforms') || Gate::allows('create.diagnosticsforms'), 403);
        $diagnosticforms = DiagnosticForm::with('questionsform')->get();
        
        return view('admin.formularios.index', compact('diagnosticforms'));   
    }
    public function create()
    {
        abort_unless(Gate::allows('view.diagnosticsforms') || Gate::allows('create.diagnosticsforms'), 403);
        
        $diagnostics = Diagnostic::pluck('type','id');
        $questions = Question::pluck('question','id');
        return view('admin.formularios.crear', compact('diagnostics', 'questions'));   
    }

    public function save(DiagnosticFormRequest $request)
    {
        abort_unless(Gate::allows('view.diagnosticsforms') || Gate::allows('create.diagnosticsforms'), 403);
        
        $diagnosticforms = new DiagnosticForm;
        $diagnosticforms->form = $request->form;
        $diagnosticforms->diagnostic_id = $request->diagnostic_id;
        $diagnosticforms->active = 'Active';
        $diagnosticforms->save();

        for($i = 1; $i <= $request->question_count; $i++){
            $questionsforms = new QuestionForm;
            $questionsforms->question_id = $request['question'.$i.'_question'];
            $questionsforms->diagnostic_form_id = $diagnosticforms->id;
            $questionsforms->save();
        }

        alert('Se ha agregado un formulario.');

        return response('', 204, [
            'Redirect-To' => url('admin/formularios/')
        ]);
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('view.diagnosticforms') || Gate::allows('create.diagnosticsforms'), 403);
        
        $diagnosticform = DiagnosticForm::find($id);
        $questionsform = QuestionForm::where('diagnostic_form_id',$id)->get();
        $diagnostics = Diagnostic::pluck('type','id');
        $questions = Question::pluck('question','id');

        return view('admin.formularios.editar', compact('questionsform','diagnosticform', 'diagnostics', 'questions'));
    }


    public function update(DiagnosticFormRequest $request, $id)
    {
        abort_unless(Gate::allows('view.diagnosticsforms') || Gate::allows('create.diagnosticsforms'), 403);

        $diagnosticforms = DiagnosticForm::find($id);
        $diagnosticforms->form = $request->form;
        $diagnosticforms->diagnostic_id = $request->diagnostic_id;
        $diagnosticforms->active = 'Active';
        $diagnosticforms->save();

        for ($i = 1; $i <= $request->question_count; $i++) {
            $questionForm = QuestionForm::where('diagnostic_form_id', $diagnosticforms->id)
                ->where('question_id', $request['question'.$i.'_question'])
                ->first();
            if ($questionForm) {
                $questionForm->question_id = $request['question'.$i.'_question'];
                $questionForm->save();
            } else {
                $newQuestionForm = new QuestionForm;
                $newQuestionForm->question_id = $request['question'.$i.'_question'];
                $newQuestionForm->diagnostic_form_id = $diagnosticforms->id;
                $newQuestionForm->save();
            }
        }

        alert('Se ha actualizado un formulario.');

        return response('', 204, [
            'Redirect-To' => url('admin/formularios/')
        ]);
    }

    public function delete($id)
    {
        abort_unless(Gate::allows('view.diagnosticsforms') || Gate::allows('create.diagnosticsforms'), 403);

        $diagnosticform = DiagnosticForm::find($id);
        $diagnosticform->delete();

        return response('', 204);

    }
}
