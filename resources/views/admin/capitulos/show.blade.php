@extends('adminlte::page')

@section('title', 'Capítulos')

@section('plugins.Datatables', true)

@section('content_header')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$capitulo->name}}</li>
        <li class="breadcrumb-item active" aria-current="page">temas</li>
        </ol>
    </nav>

    <div class="card shadow">
        <div class="card-body">
            <h1 class="h4 mb-2">NUEVO TEMA</h1>

            <form action="{{route('admin.temas.store')}}" class="mb-2" method="POST">
                
                @csrf

                <input type="hidden" name="capitulo_id" value="{{$capitulo->id}}">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Agregar</button>
                </div>
              </div>
            </form>
        </div>
    </div>

@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="temas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th width="10px"></th>
                    <th width="10px"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($capitulo->temas as $tema)
                    <tr>
                        <td>{{$tema->id}}</td>
                        <td>{{$tema->name}}</td>
                        <td>
                            <a href="{{route('admin.temas.edit', $tema)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td>
                            {!! Form::open() !!}
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
        $('#temas').DataTable({
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
    </script>
@endsection