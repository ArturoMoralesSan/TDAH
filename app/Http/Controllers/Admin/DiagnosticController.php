<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnostic;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\DiagnosticRequest;
use Illuminate\Support\Str;

class DiagnosticController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);
        $diagnostics = Diagnostic::all();
        return view('admin.diagnostico.index', compact('diagnostics'));   
    }

    public function save(DiagnosticRequest $request)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('edit.diagnostics'), 403);
        
        $diagnostic = new Diagnostic;
        $diagnostic->type = $request->type;
        $diagnostic->description = $request->description;
        $diagnostic->save();

        alert('Se ha agregado un diagnostico.');

        return response('', 204, [
            'Redirect-To' => url('admin/diagnosticos/')
        ]);
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('view.diagnostic') || Gate::allows('edit.diagnostic'), 403);
        $diagnostic = Diagnostic::find($id);

        return view('admin.diagnostico.editar', compact('diagnostic'));
    }


    public function update(DiagnosticRequest $request, $id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('edit.diagnostics'), 403);

        $diagnostic = Diagnostic::find($id);
        $diagnostic->type = $request->type;
        $diagnostic->description = $request->description;
        $diagnostic->save();
        $diagnostic->save();

        alert('Se ha actualizado un diagnostico.');

        return response('', 204, [
            'Redirect-To' => url('admin/diagnosticos/')
        ]);
    }

    public function delete($id)
    {
        abort_unless(Gate::allows('view.diagnostics') || Gate::allows('create.diagnostics'), 403);

        $diagnostic = Diagnostics::find($id);
        $diagnostic->delete();

        return response('', 204);

    }
}
