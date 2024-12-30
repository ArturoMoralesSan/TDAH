<?php

namespace Database\Seeders;

use App\Models\Permission;
use DB;

class DashboardTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate(['dashboard_sections', 'dashboard_submenus', 'dashboard_links']);

        $permissions = Permission::all('id', 'key_name')->pluck('id', 'key_name');

        foreach ($this->getData() as $i => $section) {
            $sectionId = DB::table('dashboard_sections')->insertGetId([
                'name'       => $section['name'],
                'tile'       => $section['tile'],
                'order'      => $i + 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            foreach ($section['submenus'] as $j => $submenu) {
                $submenuId = DB::table('dashboard_submenus')->insertGetId([
                    'name'       => $submenu['name'],
                    'icon'       => $submenu['icon'],
                    'order'      => $j + 1,
                    'section_id' => $sectionId,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                foreach ($submenu['links'] as $k => $link) {
                    DB::table('dashboard_links')->insert([
                        'name'          => $link['name'],
                        'route'         => $link['route'],
                        'order'         => $k + 1,
                        'submenu_id'    => $submenuId,
                        'permission_id' => $permissions[$link['permission']],
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }
    }



    /**
     * Return the data to populate tables.
     *
     * @return array
     */
    private function getData()
    {
        return [
            [
                'name' => 'ACL',
                'tile' => 'lock.svg',
                'submenus' => [
                    [
                        'name' => 'Permisos',
                        'icon' => 'permissions.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar permisos',
                                'route'      => 'agregar-permisos',
                                'permission' => 'create.permissions'
                            ],
                            [
                                'name'       => 'Lista de permisos',
                                'route'      => 'permisos',
                                'permission' => 'view.permissions'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Roles',
                        'icon' => 'role.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar roles',
                                'route'      => 'agregar-roles',
                                'permission' => 'create.roles'
                            ],
                            [
                                'name'       => 'Lista de roles',
                                'route'      => 'roles',
                                'permission' => 'view.roles'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Usuarios',
                        'icon' => 'users.svg',
                        'links' => [
                            [
                                'name'       => 'Lista de usuarios',
                                'route'      => 'usuarios',
                                'permission' => 'view.users'
                            ]
                        ],
                    ],
                    
                ]
            ],
            [
                'name' => 'Pacientes',
                'tile' => 'lock.svg',
                'submenus' => [
                    [
                        'name' => 'pacientes',
                        'icon' => 'permissions.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar pacientes',
                                'route'      => 'agregar-pacientes',
                                'permission' => 'create.patient'
                            ],
                            [
                                'name'       => 'Lista de pacientes',
                                'route'      => 'pacientes',
                                'permission' => 'view.patient'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Análisis',
                        'icon' => 'role.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar análisis',
                                'route'      => 'agregar-analisis',
                                'permission' => 'create.analysis'
                            ],
                            [
                                'name'       => 'Lista de análisis',
                                'route'      => 'analisis',
                                'permission' => 'view.analysis'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Reportes',
                        'icon' => 'users.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar reportes',
                                'route'      => 'agregar-reportes',
                                'permission' => 'create.reports'
                            ],
                            [
                                'name'       => 'Lista de reportes',
                                'route'      => 'reportes',
                                'permission' => 'view.reports'
                            ]
                        ],
                    ],
                    
                ]
            ],
            [
                'name' => 'Diagnostico',
                'tile' => 'lock.svg',
                'submenus' => [
                    [
                        'name' => 'Diagnostico',
                        'icon' => 'permissions.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar diagnostico',
                                'route'      => 'agregar-diagnostico',
                                'permission' => 'create.patient'
                            ],
                            [
                                'name'       => 'Lista de diagnosticos',
                                'route'      => 'diagnosticos',
                                'permission' => 'view.diagnostics'
                            ]
                        ]
                    ],
                    [
                        'name' => 'Preguntas',
                        'icon' => 'role.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar preguntas',
                                'route'      => 'agregar-preguntas',
                                'permission' => 'create.questions'
                            ],
                            [
                                'name'       => 'Lista de preguntas',
                                'route'      => 'preguntas',
                                'permission' => 'view.questions'
                            ]
                        ]
                    ],
                    [
                        'name' => 'formularios',
                        'icon' => 'users.svg',
                        'links' => [
                            [
                                'name'       => 'Agregar formulario',
                                'route'      => 'agregar-formulario',
                                'permission' => 'create.diagnosticsforms'
                            ],
                            [
                                'name'       => 'Lista de formularios',
                                'route'      => 'formularios',
                                'permission' => 'view.diagnosticsforms'
                            ]
                        ],
                    ],
                    
                ]
            ],
            
        ];
    }
}

