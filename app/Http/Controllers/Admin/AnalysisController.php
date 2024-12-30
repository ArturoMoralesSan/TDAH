<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnalysisPatient;
use App\Models\AnalysisForms;
use App\Models\DiagnosticForm;
use App\Models\FormResponse;
use App\Models\Patient;
use App\Models\Diagnostic;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AnalysisPatientRequest;
use App\Http\Requests\AnalysisQuestionRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AnalysisController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);
        $analysis = AnalysisPatient::with('patient', 'diagnostic')->get();
        return view('admin.analisis.index', compact('analysis'));   
    }

    public function indexforms($id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);
        $forms = AnalysisForms::with('diagnosticform')->where('analysis_patient_id',$id)->get();
        return view('admin.analisis.indexforms', compact('forms'));   
    }

    public function form($id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);
        
        $form = AnalysisForms::with('diagnosticform.questionsform.question')->find($id);
        if (!$form->completed_at) {
            return view('admin.analisis.form', compact('form'));
        } else {
            return redirect()->to(url('admin/analisis-formularios/' . $form->analysis_patient_id)); 
        }
          
    }

    public function createform(AnalysisQuestionRequest $request, $id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);
        $form = AnalysisForms::with('diagnosticform.questionsform.question')->find($id);
        foreach ($form->diagnosticform->questionsform as $question) 
        {
            $res = Str::slug($request["question-{$question->id}"], '-');

            if ($res == "no") {
                $res = 0;  // "No" se convierte en 0
            } elseif ($res == "si") {
                $res = 1;  // "Sí" se convierte en 1
            } elseif ($res == "bajo") {
                $res = 0;  // "Bajo" se convierte en 0
            } elseif ($res == "medio") {
                $res = 1;  // "Medio" se convierte en 1
            } elseif ($res == "alto") {
                $res = 2;  // "Alto" se convierte en 2
            } elseif ($res == "retraso") {
                $res = 0;  // "Retraso" se convierte en 0
            } elseif ($res == "normal") {
                $res = 1;  // "Normal" se convierte en 1
            } elseif ($res == "mujer") {
                $res = 0;  // "Mujer" se convierte en 0
            } elseif ($res == "hombre") {
                $res = 1;  // "Hombre" se convierte en 1
            }

            $response = new FormResponse;
            $response->response         = $res;
            $response->analysis_patient_id = $form->analysis_patient_id;
            $response->question_form_id = $question->id;
            $response->completed_at      = Carbon::now();
            $response->save();
        
        }

        $form->completed_at = Carbon::now();
        $form->save();

        alert('Se completo un formulario.');

        return response('', 204, [
            'Redirect-To' => url('admin/analisis/')
        ]);   
    }

    public function create()
    {
        abort_unless(Gate::allows('view.diagnostic') || Gate::allows('edit.diagnostic'), 403);
        $patients    = Patient::pluck('name','id');
        $diagnostics = Diagnostic::pluck('type','id');
        return view('admin.analisis.crear', compact('patients', 'diagnostics'));
    }

    public function save(AnalysisPatientRequest $request)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('edit.diagnostics'), 403);
        
        $analysis = new AnalysisPatient;
        $analysis->patient_id    = $request->patient_id;
        $analysis->diagnostic_id = $request->diagnostic_id;
        $analysis->save();

        $diagnosticforms = DiagnosticForm::where('diagnostic_id', $request->diagnostic_id)->where('active', 'Active')->get();

        foreach ($diagnosticforms as $form) {
            $analysisform = new AnalysisForms;
            $analysisform->analysis_patient_id = $analysis->id;
            $analysisform->diagnostic_form_id = $form->id;
            $analysisform->save();
        }
        
        alert('Se ha agregado un análisis.');

        return response('', 204, [
            'Redirect-To' => url('admin/analisis/')
        ]);
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('view.diagnostic') || Gate::allows('edit.diagnostic'), 403);
        $analysis    = AnalysisPatient::find($id);
        $patients    = Patient::pluck('name','id');
        $diagnostics = Diagnostic::pluck('type','id');
        return view('admin.analisis.editar', compact('analysis', 'patients', 'diagnostics'));
    }


    public function update(AnalysisPatientRequest $request, $id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('edit.diagnostics'), 403);

        $diagnosticforms = DiagnosticForm::where('diagnostic_id', $request->diagnostic_id)->where('active', 'Active')->get();

        $analysis = AnalysisPatient::find($id);
        $analysis->patient_id = $request->patient_id;
        $analysis->diagnostic_id = $request->diagnostic_id;
        $analysis->save();

        if ($analysis->diagnostic_id != $request->diagnostic_id) 
        {
            
            AnalysisForms::where('analysis_patient_id', $analysis->id)->delete();

            foreach ($diagnosticforms as $form) {
                $analysisform = new AnalysisForms;
                $analysisform->analysis_patient_id = $analysis->id;
                $analysisform->diagnostic_form_id = $form->id;
                $analysisform->save();
            }
        } else {
            
            foreach ($diagnosticforms as $form) {
                
                $exists = AnalysisForms::where('analysis_patient_id', $analysis->id)
                               ->where('diagnostic_form_id', $form->id)
                               ->exists();

                if (!$exists) { 
                    $analysisform = new AnalysisForms;
                    $analysisform->analysis_patient_id = $analysis->id;
                    $analysisform->diagnostic_form_id = $form->id;
                    $analysisform->save();
                }
            }
        }
        
        alert('Se ha actualizado un análisis.');

        return response('', 204, [
            'Redirect-To' => url('admin/analisis/')
        ]);
    }

    public function delete($id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);


        $analysis = AnalysisPatient::find($id);
        AnalysisForms::where('analysis_patient_id', $analysis->id)->delete();
        $analysis->delete();

        return response('', 204);

    }
}
