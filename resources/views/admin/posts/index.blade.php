@extends('adminlte::page')

@section('title', 'Posts')

@section('plugins.Datatables', true)

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="posts">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Vistas</th>
                        <th width = '10px'></th>
                        <th width = '10px'></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td>{{$post->categoria->name}}</td>
                        <td>
                            @switch($post->status)
                                @case(1)
                                    <span class="badge badge-danger">Borrador</span>
                                    @break
                                @case(2)
                                    <span class="badge badge-primary">Publicado</span>
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td>{{$post->contador}}</td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td>
                            {!! Form::open(['route' => ['admin.posts.destroy', $post], 'method' => 'delete', 'class' => 'formulario-eliminar']) !!}
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
        $('#posts').DataTable({
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

        //Confirmar eliminar
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