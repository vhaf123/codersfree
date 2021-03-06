@extends('adminlte::page')

@section('title', 'Roles')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Roles</h1>
        
        @can('admin.cursos.create')
            <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Crear rol</a>
        @endcan

    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="roles">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Descripción</th>
                        <th width = '10px'></th>
                        <th width = '10px'></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->description}}</td>

                            <td>
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-success btn-sm">Editar</a>
                            </td>

                            <td>
                                {!! Form::open(['route' => ['admin.roles.destroy', $role], 'method' => 'delete', 'class' => 'formulario-eliminar']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /* Datatable */
        $('#roles').DataTable({
            responsive: true,
            autoWidth: false,

            order: [ 0, 'desc' ],

            language: {
                    "lengthMenu": "Mostrar " + 
                                `<select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value = '10'>10</option>
                                    <option value = '25'>25</option>
                                    <option value = '50'>50</option>
                                    <option value = '100'>100</option>
                                    <option value = '-1'>All</option>
                                </select>` +
                                " registros por página",
                    "zeroRecords": "No se encontró ningún curso",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar:',
                    'paginate': {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                    }
            }
        });

        /* Confirmar eliminar */
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();


            Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta categoría se eliminara definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.value) {

                this.submit();
            }
            })

        });
    </script>
@endsection