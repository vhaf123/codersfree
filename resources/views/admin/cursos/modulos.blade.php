@extends('adminlte::page')

@section('title', 'modulos del curso')

@section('content_header')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li> --}}
        <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.cursos.edit', $curso)}}">{{$curso->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">modulos</li>
        </ol>
    </nav>
    
@stop

@section('content')
    
    <div id="app">

        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">


                <div class="card">
                    <div class="card-body">
                        <form v-on:submit.prevent = "modulosStore">
                            <div class="form-group">
                                <label for="name">Nuevo modulo</label>
                                <input type="text" class="form-control" id="name" v-model="modulos_name">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Agregar modulo</button>
                        </form>
                    </div>
                </div>



                <div class="card" v-for="modulo in modulos">

                    <div class="card-body">
                        <strong>Módulo: </strong>@{{modulo.name}}
                    </div>    

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCentered" v-on:click = "modulosEdit(modulo)">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm" v-on:click = "modulosDestroy(modulo)">Eliminar</button>

                        <a :href="'/admin/modulos/' + modulo.id" class="btn btn-success btn-sm float-right">Agregar video</a>
                    </div>
                </div>                
                
            </div>

            
        </div>



        {{-- Modal --}}
        <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenteredLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form v-on:submit.prevent = "modulosUpdate">
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Ingrese una modulo" v-model="modulos_name_edit">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script>
        new Vue({
            el: '#app',
            data:{
                curso_id: "{{$curso->id}}",
                modulos: "",
                modulos_name: "",
                modulos_name_edit: "",
                modulo_id: ""
            },
            created(){
                this.getmodulos();
            },
            methods:{
                getmodulos(){
                    axios.get("{{route('axios.cursos.modulos', $curso)}}")
                    .then(response => {
                        this.modulos = response.data
                    })
                },

                modulosStore() {
                    axios.post('/admin/modulos', {
                        curso_id: this.curso_id,
                        name: this.modulos_name,

                    }).then(response => {

                        this.modulos_name = "";
                        this.getmodulos();

                        Swal.fire({
                            icon: 'success',
                            title: '¡Creado con éxito!',
                            text: 'Su archivo se creó con exito',
                        })

                    }).catch(error => {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Algo salió mal!',
                        })

                    })
                },

                modulosEdit(modulo){
                    this.modulos_name_edit = modulo.name
                    this.modulo_id = modulo.id
                },
                
                modulosUpdate(){

                    axios.put('/admin/modulos/' + this.modulo_id, {
                        name: this.modulos_name_edit,
                    }).then(response => {
                        
                        $("#exampleModalCentered").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();


                        this.getmodulos();

                        Swal.fire({
                            icon: 'success',
                            title: '¡Actualizado con éxito!',
                            text: 'Su archivo se actualizó con exito',
                        })

                    }).catch(error => {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Algo salió mal!',
                        })

                    })
                },
                modulosDestroy(modulo){

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Si, elimínalo!',
                        cancelButtonText: '¡No, cancelar!',

                        }).then((result) => {

                        if (result.value) {

                            var url = "/admin/modulos/" + modulo.id;

                            axios.delete(url).then(response => {

                                this.getmodulos();

                                Swal.fire(
                                    '¡Eliminado!',
                                    'Su archivo ha sido eliminado.',
                                    'success'
                                )

                            }).catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '¡Algo salió mal!',
                                })
                            })

                        }

                    })
                }
            }
        });
    </script>
@endsection