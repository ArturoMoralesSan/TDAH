<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('view.patients') || Gate::allows('create.patients'), 403);
        $patients = Patient::all();
        return view('admin.pacientes.index', compact('patients'));   
    }

    public function save(PatientRequest $request)
    {
        abort_unless(Gate::allows('view.patients') || Gate::allows('edit.patients'), 403);
        
        $patient = new Patient;
        $patient->name = $request->name;
        $patient->first_last_name = $request->first_last_name;
        $patient->second_last_name = $request->second_last_name;
        $patient->age = $request->age;
        $patient->sex = $request->sex;
        $patient->father_name = $request->father_name;
        $patient->mother_name = $request->mother_name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->optional_phone = $request->optional_phone;
        $patient->save();

        alert('Se ha agregado un paciente.');

        return response('', 204, [
            'Redirect-To' => url('admin/pacientes/')
        ]);
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('view.patients') || Gate::allows('edit.patients'), 403);
        $patient = Patient::find($id);

        return view('admin.pacientes.editar', compact('patient'));
    }


    public function update(PatientRequest $request, $id)
    {
        abort_unless(Gate::allows('view.patients') || Gate::allows('edit.patients'), 403);

        $patient = Patient::find($id);
        $patient->name = $request->name;
        $patient->first_last_name = $request->first_last_name;
        $patient->second_last_name = $request->second_last_name;
        $patient->age = $request->age;
        $patient->sex = $request->sex;
        $patient->father_name = $request->father_name;
        $patient->mother_name = $request->mother_name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->optional_phone = $request->optional_phone;
        $patient->save();

        alert('Se ha actualizado un paciente.');

        return response('', 204, [
            'Redirect-To' => url('admin/pacientes/')
        ]);
    }

    public function delete($id)
    {
        abort_unless(Gate::allows('view.patients') || Gate::allows('create.patients'), 403);

        $patient = Patient::find($id);
        $patient->delete();

        return response('', 204);

    }
}
