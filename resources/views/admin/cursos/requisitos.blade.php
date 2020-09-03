@extends('adminlte::page')

@section('title', 'Requisitos del curso')

@section('content_header')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li> --}}
        <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.cursos.edit', $curso)}}">{{$curso->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Requisitos</li>
        </ol>
    </nav>
    
@stop

@section('content')
    
    <div id="app">

        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">


                <div class="card">
                    <div class="card-body">
                        <form v-on:submit.prevent = "requisitosStore">
                            <div class="form-group">
                                <label for="name">Nuevo requisito</label>
                                <input type="text" class="form-control" id="name" v-model="requisitos_name">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Agregar requisito</button>
                        </form>
                    </div>
                </div>



                <div class="card" v-for="requisito in requisitos">

                    <div class="card-body">
                        <strong>Requisito: </strong>@{{requisito.name}}
                    </div>    

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCentered" v-on:click = "requisitosEdit(requisito)">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm" v-on:click = "requisitosDestroy(requisito)">Eliminar</button>
                    </div>
                </div>
                
                <div v-if = "requisitos.length == 0">
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>Aún no has agregado ninguna requisito</strong>
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

                <form v-on:submit.prevent = "requisitosUpdate">
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Ingrese una requisito" v-model="requisitos_name_edit">
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
                requisitos: "",
                requisitos_name: "",
                requisitos_name_edit: "",
                requisito_id: ""
            },
            created(){
                this.getrequisitos();
            },
            methods:{
                getrequisitos(){
                    axios.get("{{route('axios.cursos.requisitos', $curso)}}")
                    .then(response => {
                        this.requisitos = response.data
                    })
                },

                requisitosStore() {
                    axios.post('/admin/requisitos', {
                        curso_id: this.curso_id,
                        name: this.requisitos_name,

                    }).then(response => {

                        this.requisitos_name = "";
                        this.getrequisitos();

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

                requisitosEdit(requisito){
                    this.requisitos_name_edit = requisito.name
                    this.requisito_id = requisito.id
                },
                
                requisitosUpdate(){

                    axios.put('/admin/requisitos/' + this.requisito_id, {
                        name: this.requisitos_name_edit,
                    }).then(response => {
                        
                        $("#exampleModalCentered").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();


                        this.getrequisitos();

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
                requisitosDestroy(requisito){

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

                            var url = "/admin/requisitos/" + requisito.id;

                            axios.delete(url).then(response => {

                                this.getrequisitos();

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