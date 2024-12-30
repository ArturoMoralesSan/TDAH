<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    /**
    * Update password.
    *
    * @param \App\Http\Requests\UpdatePasswordRequest $request
    * @return \Illuminate\Http\Response
    */
   public function update(UpdatePasswordRequest $request)
   {
       Auth::user()->update(['password' => bcrypt($request->password)]);

       alert('Se ha actualizado la contraseña.');

        return response('', 204, [
            'Redirect-To' => url('admin/perfil/cambiar-contrasena')
        ]);
   }
}
