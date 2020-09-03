@extends('adminlte::page')

@section('title', 'Categorias')

@section('plugins.Datatables', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Categorias</h1>
        
        @can('admin.categorias.create')
            <a href="{{route('admin.categorias.create')}}" class="btn btn-primary">Crear categoría</a>
        @endcan
    </div>
@stop

@section('content')
    
    
    <div class="card">
        <div class="card-header">
            <table class="table table-striped" id="categorias">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th width = '10px'></th>
                        <th width = '10px'></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->name}}</td>
                            <td>
                                
                                <span class="badge {{$categoria->badge}}">{{$categoria->badge}}</span>
                                
                            </td>
                            <td>
                                @can('admin.categorias.edit')
                                    <a href="{{route('admin.categorias.edit', $categoria)}}" class="btn btn-success btn-sm">Editar</a>
                                @endcan
                            </td>
                            <td>
                                @can('admin.categorias.destroy')
                                    {!! Form::open(['route' => ['admin.categorias.destroy', $categoria], 'method' => 'delete', 'class' => 'formulario-eliminar']) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endcan

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

        //Datatables
        $('#categorias').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                    "lengthMenu": "Mostrar " + 
                                `<select class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value = '10'>10</option>
                                    <option value = '25'>25</option>
                                    <option value = '50'>50</option>
                                    <option value = '100'>100</option>
                                    <option value = '-1'>All</option>
                                </select>` +
                                " registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
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

        //Confirmacion eliminar
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