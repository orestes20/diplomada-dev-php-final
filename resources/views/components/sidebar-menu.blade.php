@php
    $request = Request();
    $pathname = $request->getPathInfo();
    $baseUrl = $request->getBaseUrl();
    $idPerfil = session('id_perfil');

    $menu = [
        [
            'name' => 'Lista de Registros',
            'icon' => 'fa-solid fa-list',
            'profileId' => [1],
            'childrens' => [
                ['name' => 'Aspirantes', 'route' => '/aspirante/aspirantes', 'profileId' => [1]],
                ['name' => 'Estudiantes', 'route' => '/aspirante/estudiantes', 'profileId' => [1]],
            ],
        ],
        [
            'name' => 'Usuarios', 
            'icon' => 'fa-solid fa-gear',
            'route' => '/admin/usuarios', 
            'profileId' => [1]
        ],
        [
            'name' => 'Asignar Profesores', 
            'icon' => 'fa-solid fa-edit',
            'route' => '/admin/asignar_profesores', 
            'profileId' => [1]
        ],
        [
            'name' => 'Datos del Usuario',
            'icon' => 'fa-solid fa-folder-open',
            'profileId' => [2, 3],
            'childrens' => [
                ['name' => 'Consultar Información', 'route' => '#', 'profileId' => [2, 3]],
                [
                    'name' => 'Actualizar Información',
                    'route' => '#',
                    //'route' => '/aspirante/view_actualizar_informacion',
                    'profileId' => [2, 3],
                ],
            ],
        ],
        [
            'name' => 'Cargar Documentos',
            'icon' => 'fa-solid fa-upload',
            'route' => '/aspirante/view_cargar_documentos',
            'profileId' => [2, 3],
        ],
        [
            'name' => 'Ver Notas',
            'icon' => 'fa-solid fa-list',
            'route' => '/aspirante/estudiante_notas',
            'profileId' => [2, 3],
        ],
        [
            'name' => 'Inscripción',
            'icon' => 'fa-solid fa-file',
            'route' => '/aspirante/inscripcion',
            'profileId' => [3],
        ],
        [
            'name' => 'Verificar Documentos',
            'icon' => 'fa-solid fa-file',
            'route' => '/aspirante/revisar_documentos',
            'profileId' => [4],
        ],
        [
            'name' => 'Estudiantes',
            'icon' => 'fa-solid fa-list',
            'route' => '/aspirante/nomina',
            'profileId' => [5]
        ],
        [
            'name' => 'Consultar', 
            'icon' => 'fa-solid fa-edit',
            'route' => '/aspirante/consultar', 
            'profileId' => [5]
        ],
    ];
@endphp

<div class="list-group list-group-flush mx-3 mt-4">
    @foreach ($menu as $item)
        @if (in_array($idPerfil, $item['profileId']))
            @if (isset($item['childrens']))
                <div class="list-group-item list-group-item-action py-2 px-2 ripple border-0 d-flex align-items-center justify-content-start flex-row {{ array_search($pathname, array_column($item['childrens'], 'route')) !== false ? 'rounded-5 text-dark' : 'text-white' }}"
                    style="background-color: {{ array_search($pathname, array_column($item['childrens'], 'route')) !== false ? '#E1C564' : '#203767' }}; cursor: pointer"
                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <span style="font-size: 15px" class="d-flex align-items-center">
                        <i class="{{ $item['icon'] }} me-3"></i>
                        {{ $item['name'] }}
                    </span>
                </div>
                <div id="collapseOne"
                    class="accordion-collapse collapse {{ array_search($pathname, array_column($item['childrens'], 'route')) !== false ? 'show' : '' }}"
                    data-bs-parent="#accordionExample">
                    @foreach ($item['childrens'] as $children)
                        @if (in_array($idPerfil, $children['profileId']))
                            <a href={{ $baseUrl . $children['route'] }}
                                class="ps-3 list-group-item list-group-item-action py-2 px-2 ripple border-0 d-flex align-items-center {{ str_contains($pathname, strtolower($children['route'])) ? 'rounded-5 text-white' : 'text-white' }}"
                                style="background-color: {{ str_contains($pathname, strtolower($children['route'])) ? '#E1C5646f' : '#203767' }}">
                                <span style="font-size: 15px" class="d-flex flex-direction-columns align-items-center">
                                    <i style="font-size: 4px" class="fa-solid fa-circle fa-2xs me-3"></i>
                                    {{ $children['name'] }}
                                </span>
                            </a>
                        @endif
                    @endforeach
                </div>
            @else
                <a href={{ $baseUrl . $item['route'] }}
                    class="list-group-item list-group-item-action py-2 px-2 ripple border-0 d-flex align-items-center {{ str_contains($pathname, strtolower($item['route'])) ? 'rounded-5 text-dark' : 'text-white' }}"
                    style="background-color: {{ str_contains($pathname, strtolower($item['route'])) ? '#E1C564' : '#203767' }}">
                    <span style="font-size: 15px" class="d-flex flex-direction-columns align-items-center">
                        <i class="{{ $item['icon'] }} me-3"></i>
                        {{ $item['name'] }}
                    </span>
                </a>
            @endif
        @endif
    @endforeach
</div>
