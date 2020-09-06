@extends('adminlte::page')

@section('title', 'Manual de Laravel')

@section('plugins.Datatables', true)

@section('content_header')
    {{-- <div class="d-flex align-items-center justify-content-between">
        <h1>Lista de capitulos</h1>
        
        @can('admin.cursos.create')
            <a href="{{route('admin.capitulos.create')}}" class="btn btn-primary">Agregar capitulo</a>
        @endcan

    </div> --}}


    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.capitulos.store']) !!}

                {!! Form::hidden('manual_id', $manual->id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ), 'required']) !!}

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                {!! Form::submit('Crear capítulo', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="capitulos">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th width="10px"></th>
                                <th width="10px"></th>
                                <th width="10px"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($manual->capitulos as $capitulo)
                                <tr>
                                    <td>{{$capitulo->id}}</td>
                                    <td>{{$capitulo->name}}</td>
                                    
                                    <td>
                                        {{-- <a href="{{route('admin.capitulos.edit', $capitulo)}}" class="btn btn-primary btn-sm">Editar</a> --}}
                                        <button type="button" onclick='editar("{{$capitulo->name}}", "{{$capitulo->id}}")'  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCentered">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['admin.capitulos.destroy', $capitulo], 'method' => 'delete', 'class' => 'formulario-eliminar']) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.capitulos.show', $capitulo)}}" class="btn btn-success btn-sm">Temas</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>


    {{-- Modal --}}
    <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" id="formulario_actualizar" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenteredLabel">Editar capítulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="manual_id" value="{{$manual->id}}">
                        <input type="text" name="name" id="name_edit" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        /* Datatable */
        $('#capitulos').DataTable({
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


        function editar(name, id){

            url = '/admin/capitulos/' + id;

            $('#name_edit').val(name);

            $('#formulario_actualizar').attr('action', url);
        }

    </script>
@endsection