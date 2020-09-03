@extends('adminlte::page')

@section('title', 'Cursos')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Cursos</h1>
        
        @can('admin.cursos.create')
            <a href="{{route('admin.cursos.create')}}" class="btn btn-primary">Crear curso</a>
        @endcan

    </div>
@stop

@section('content')
    
    
    <div class="card">
        <div class="card-header">
            <table class="table table-striped" id="cursos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Categoría</th>
                        <th>Matriculados</th>
                        <th width = '10px'></th>
                        <th width = '10px'></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{$curso->id}}</td>
                            <td>{{$curso->name}}</td>
                            <td>{{$curso->Categoria->name}}</td>
                            <td>{{$curso->users_count}} alumnos</td>

                            @can('admin.cursos.edit')
                                <td>
                                    <a href="{{route('admin.cursos.edit', $curso)}}" class="btn btn-success btn-sm">Editar</a>
                                </td>
                            @endcan

                            @can('admin.cursos.destroy')
                                <td>
                                    {!! Form::open(['route' => ['admin.cursos.destroy', $curso], 'method' => 'delete', 'class' => 'formulario-eliminar']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </td>
                            @endcan
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
        $('#cursos').DataTable({
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