<?php
namespace Database\Seeders;

use DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(['permissions']);

        foreach ($this->getData() as $keyName => $name) {
            DB::table('permissions')->insert([
                'key_name'   => $keyName,
                'name'       => $name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }


    /**
     * Return the data to populate table.
     *
     * @return array
     */
    private function getData()
    {
        return [
             /*
             * Profile
             */
            'update.password' => 'Cambiar contraseña',
            'update.profile'  => 'Cambiar Perfil',

            /*
             * Patient
             */
            'view.patient'   => 'Ver pacientes',
            'create.patient' => 'Agregar pacientes',
            'edit.patient'   => 'Editar pacientes',
            'delete.patient' => 'Eliminar pacientes',

            /*
             * Analysis
             */
            'view.analysis'   => 'Ver análisis',
            'create.analysis' => 'asignar análisis ',
            'edit.analysis'   => 'Editar análisis',
            'delete.analysis' => 'Eliminar análisis',

            /*
             * Permission
             */
            'view.permissions'   => 'Ver permisos',
            'create.permissions' => 'Agregar permisos',
            'edit.permissions'   => 'Editar permisos',
            'delete.permissions' => 'Eliminar permisos',

            /*
             * Roles
             */
            'view.roles'   => 'Ver roles',
            'create.roles' => 'Agregar roles',
            'edit.roles'   => 'Editar roles',
            'delete.roles' => 'Eliminar roles',

            /*
             * Reports
             */
            'view.reports'   => 'Ver Reportes',
            'create.reports' => 'Agregar Reportes',
            'edit.reports'   => 'Editar Reportes',
            'delete.reports' => 'Eliminar Reportes',

            /*
             * Users
             */
            'view.users'   => 'Ver Usuarios',
            'create.users' => 'Agregar usuarios',

            /*
             * Users
             */

            'view.diagnostics'   => 'Ver diagnosticos',
            'create.diagnostics' => 'Agregar diagnosticos',

            /*
             * questions
             */
            
            'view.questions'   => 'Ver preguntas',
            'create.questions' => 'Agregar preguntas',

            /*
             * questions
             */
            
             'view.diagnosticsforms'   => 'Ver formularios',
             'create.diagnosticsforms' => 'Agregar formularios',
             
        ];
    }
}
