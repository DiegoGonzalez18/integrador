<template>
     <main class="main ">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
         <div class="container-fluid">
             <div>
                  <center>  <h1>Registrar Servicio</h1></center>

             </div>
             <br><br>

<div class="container">

                         <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Titulo</label>
                            <div class="col-md-9">
                                <input type="text" v-model="titulo" class="form-control" placeholder="Titulo " >
                                <span class="help-block">(*) Ingrese el titulo </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
                            <div class="col-md-9">
                                <input type="text" v-model="descripcion" class="form-control" placeholder="Descripcion " >
                                <span class="help-block">(*) Ingrese la descripcion</span>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="file-input" required >Imagen</label>
                            <div class="col-md-9">
                                <input type="file"  required
                                @change="imageChanged"
                                class="form-control">
                            </div>
                        </div>


                    </form>


                     <div class="col-2">

                     </div>
                 </div>

 <div class="form-group row">

                                    <vue-editor class="hola" :customModules="customModulesForEditor"  v-model="content"> </vue-editor>


                        </div>
                            <br><br>
                            <div class="row">
                                <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" @click="registrarServicio()" class="btn btn-primary" value="Actualizar Contenido">
                            </div>
                            <div class="col-4"></div>
                            </div>
                            <br><br><br><br>


    </div>
     </main>
</template>
<script>

const axios= require('axios');
import { VueEditor } from "vue2-editor";
    export default {
        components: { VueEditor },

       data(){
           return{
               content: "<h1>Contenido</h1>",
            array_contenido:[],
            contenido_id:'',
            titulo:'',
            descripcion:'',
            image:''

           }
       },
       methods:{

            traercontenido(){
                let me= this;
                 axios.post('servicios'
                 ).then(function(response){
                    me.array_contenido=response.data;


                                    }).catch(function(error){
                                            console.log(error);
                                    });
            },
            imageChanged(e){

                                var filereader= new FileReader();
                                filereader.readAsDataURL(e.target.files[0]);
                                filereader.onload = (e)=>{
                                        this.image= filereader.result;
                                };

                                const files = e.target.files;

                                this.image=files;
            },
            informacion(){


               let me= this;
               me.contenido_id=this.$refs.seleccionado.value;
                 axios.post('c',{'id':me.contenido_id}
                 ).then(function(response){
                     console.log(response);
                    me.titulo=response.data['titulo'];
                    me.content=response.data['contenido'];


                                    }).catch(function(error){
                                            console.log(error);
                                    });

            },
            registrarServicio(){

                                    let me = this;
                                if(this.titulo==''){

                                }else if(this.image==''){
                                swal.fire('Falta ingresar la imagen','','error');

                                } if(this.descripcion=='')
                                {
                                     swal.fire('Falta ingresar la descripcion','','error');
                                }else{
                                axios.post('admin/servicio/registrarServicio',{
                                    'algo':this.image,
                                    'titulo':this.titulo,
                                    'descripcion':this.descripcion,
                                    'contenido':this.content
                                }).then(function(response){
                                    console.log(response.data);
                                    if(response.data==-1){
                                        swal.fire('Revise el tamaño de la imagen debe ser de ancho 1500 y alto 500','','error');
                                    }else if(response.data==-5){
                                        swal.fire('Revise el tamaño de la imagen debe ser entre un acho mayor a 150 y menor  a 400 y un alto mayor 250 y menor a 400','','error');

                                    }else {
                                     swal.fire('Servicio Registrado','','success');
                                    me.listarSlider(1,'');
                                    me.cerrarModal();
                                    }
                                    }).catch(function(error){
                                        console.log(error);
                                    });
                            }
        },
            actualizar(){
               let me= this;

                 axios.post('actualizarContenido',
                 {'id':me.contenido_id,
                 'titulo':me.titulo,
                 'contenido':me.content}
                 ).then(function(response){
                 //   location.reload();
                  if(response.data==-5){
                                        swal.fire('Revise el tamaño de la imagen debe ser entre un acho mayor a 150 y menor  a 400 y un alto mayor 250 y menor a 400','','error');

                                    }else{
                   swal.fire('Contenido Actualizado','','success');}
                            me.traercontenido();


                                    }).catch(function(error){
                                            console.log(error);
                                    });
            }
        },

        mounted(){
this.traercontenido();

        },created(){
            this.traercontenido();
        }
    }
</script>
<style >
.mostrar{
   display: list-item !important;
   opacity: 1 !important;
   position: absolute !important;
   background-color: #3c29297a !important;
}
.modal-content{
    width: 100% !important;
    position:absolute !important;

}

.modal-body{
    height: 500px;
}
.boxContenedor {


 overflow : auto;
}
.hola{
    width: 100%;
    height: 400px;
}
</style>
