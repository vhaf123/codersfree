@extends('adminlte::page')

@section('title', 'Metas del curso')

@section('content_header')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.cursos.edit', $curso)}}">{{$curso->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Metas</li>
        </ol>
    </nav>
    
@stop

@section('content')
    
    <div id="app">

        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">


                <div class="card">
                    <div class="card-body">
                        <form v-on:submit.prevent = "metasStore">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" v-model="metas_name">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Agregar meta</button>
                        </form>
                    </div>
                </div>



                <div class="card" v-for="meta in metas">

                    <div class="card-body">
                        <strong>Meta: </strong>@{{meta.name}}
                    </div>    

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCentered" v-on:click = "metasCreate(meta)">
                            Editar
                        </button>
                        <button class="btn btn-danger btn-sm" v-on:click = "metasDestroy(meta)">Eliminar</button>
                    </div>
                </div>
                
                <div v-if = "metas.length == 0">
                    <div class="alert alert-danger text-center" role="alert">
                        <strong>Aún no has agregado ninguna meta</strong>
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

                <form v-on:submit.prevent = "metasUpdate">
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Ingrese una meta" v-model="metas_name_edit">
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
                metas: "",
                metas_name: "",
                metas_name_edit: "",
                meta_id: ""
            },
            created(){
                this.getMetas();
            },
            methods:{
                getMetas(){
                    axios.get("{{route('axios.cursos.metas', $curso)}}")
                    .then(response => {
                        this.metas = response.data
                    })
                },

                metasCreate(meta){
                    this.metas_name_edit = meta.name
                    this.meta_id = meta.id
                },

                metasStore() {
                    /* alert('prueba'); */
                    axios.post('/admin/metas', {
                        curso_id: this.curso_id,
                        name: this.metas_name,

                    }).then(response => {
                        this.metas_name = "";
                        this.getMetas();

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
                
                metasUpdate(){

                    axios.put('/admin/metas/' + this.meta_id, {
                        name: this.metas_name_edit,
                    }).then(response => {
                        
                        $("#exampleModalCentered").modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();


                        this.getMetas();

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
                metasDestroy(meta){

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

                            var url = "/admin/metas/" + meta.id;

                            axios.delete(url).then(response => {

                                this.getMetas();

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