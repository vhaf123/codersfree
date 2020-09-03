@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    
                    
                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                        
                        <div class="form-group">
                            {!! Form::label('name', null) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
                        </div>

                        <h2 class="h3">Lista de roles</h2>
                        
                        <ul class="list-unstyled">
                            @foreach ($roles as $role)
                                
                                <li>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null) !!}
                                        {{$role->name}} ({{$role->description}})
                                    </label>
                                </li>
                                
                            @endforeach
                        </ul>

                        <div class="form-group">
                            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection