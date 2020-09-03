@extends('adminlte::page')

@section('title', 'Usuarios')

@section('plugins.Datatables', true)

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css"> --}}
@endsection


@section('content')
  <div class="card">
    <div class="card-body">
      <table class="table table-striped" id="usuarios">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Correo</th>
            <th>Incorporación</th>
            <th width='10px'></th>
          </tr>
        </thead>

        <tbody>

          @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>
                <a href="{{route('admin.users.edit', $user)}}" class="btn btn-success btn-sm">Agregar un rol</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>

@endsection

@section('js')
  {{-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script> --}}
  <script>
    $('#usuarios').DataTable({
      responsive: true,
      autoWidth: false,
      order: [ 0, 'desc' ],
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
  </script>
@endsection