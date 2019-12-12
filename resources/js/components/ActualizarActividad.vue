<template>
     <main class="main ">
         <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
         <div class="container-fluid">
             <div>
                  <center>  <h1>Actualizar Actividad</h1></center>

             </div>
             <br><br>

<div class="container">
        <div class="row" v-if="array_contenido.length!=0">
                    <div class="col-2">

                    </div>
                    <div class="col-8" v-if="array_contenido.length!=0">
                            <div  class="form-group row" >
                            <label class="col-md-3 form-control-label" for="text-input">Contenido</label>
                            <div class="col-md-3">
                       <select class="custom-select" ref="seleccionado" >

                                    <option v-for="contenido in array_contenido" :key="contenido.id" :value="contenido.id"  v-text="contenido.titulos"></option>


                        </select>
                            </div>
                             <div class="col-md-3">


                                <input type="submit"  @click="informacion()"  class="btn btn-primary" value="Actualizar Contenido">



                            </div>
                            <div class="col-md-2">


                                <input type="submit"  @click="eliminar()"  class="btn btn-primary" value="Eliminar">



                            </div>
                            </div>
                    </div>
                    <div class="col-2">

                    </div>

             </div>
                         <form  v-if="array_contenido.length!=0" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                            <label class="col-md-3 form-control-label" for="text-input">Fecha</label>
                            <div class="col-md-9">
                                <input type="date" v-model="fecha" class="form-control" placeholder="" >
                                <span class="help-block">(*) Ingrese la Fecha</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
                            <div class="col-md-9">
                                <input type="text" v-model="lugar" class="form-control" placeholder="Lugar" >
                                <span class="help-block">(*) Ingrese el Lugar</span>
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


 <div class="row">
<div class="col-3">

</div>

<div class="col-6">
<img v-if="url!=''" class="imagen" :src="url">
</div>

<div class="col-3">

</div>
 </div>
                     <div class="col-2">

                     </div>
                 </div>

 <div class="form-group row" v-if="array_contenido.length!=0">

                                    <vue-editor class="hola" :customModules="customModulesForEditor"  v-model="content"> </vue-editor>


                        </div>
                            <br><br>
                            <div class="row" v-if="array_contenido.length!=0">
                                <div class="col-4"></div>
                            <div class="col-4">
                                <input type="submit" @click="registrarServicio()" class="btn btn-primary" value="Actualizar Contenido">
                            </div>
                            <div class="col-4"></div>
                            </div>
                             <div v-if="array_contenido.length==0">
               <h1>No hay Actividades</h1>
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
            image:'',
            url:'',
            fecha:'',
            lugar:'',

           }
       },
       methods:{

            traercontenido(){
                let me= this;
                 axios.post('actividades'
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
                 axios.post('act',{'id':me.contenido_id}
                 ).then(function(response){
                     console.log(response);
                    me.titulo=response.data['titulos'];
                    me.descripcion=response.data['descripcion'];
                    me.content=response.data['contenido'];
                    me.url=response.data['destacada'];
                    me.fecha=response.data['fecha'];
                    me.lugar=response.data['lugar'];



                                    }).catch(function(error){
                                            console.log(error);
                                    });

            },
            eliminar(){
let me = this;
 me.contenido_id = this.$refs.seleccionado.value;

 swal.fire({
  title: '¿Está seguro?',
  text: "¿Quieres borrarlo?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'si, Borralo!'
}).then((result) => {
  if (result.value) {
      axios.post('eliminarActividad',{

                    'id':me.contenido_id
                })
                .then(function(response){


                        console.log(response.data);
                          swal.fire(
      'Borrado!',
      'Tu Actividad ha sido borrado.',
      'success'
    )
   location.reload();
    }).catch(function(error){
                                            console.log(error);
                                    });


  }
})





            },

            registrarServicio(){

                                    let me = this;
                                if(this.titulo==''){

                                }else


                                 if(this.descripcion=='')
                                {
                                     swal.fire('Falta ingresar la descripcion','','error');
                                }else{
                                axios.post('actualizarActividad',{
                                    'id':this.contenido_id,
                                    'algo':this.image,
                                    'titulo':this.titulo,
                                    'descripcion':this.descripcion,
                                    'contenido':this.content,
                                    'fecha':this.fecha,
                                    'lugar':this.lugar,

                                }).then(function(response){
 if(response.data==-5){
                                        swal.fire('revise el tamaño de la imagen debe ser de ancho 650 y alto 350','','error');
                                    }else {
                                     swal.fire('Actividad actualizado','','success');
                                      me.traercontenido();
                                      me.informacion();}

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
                   swal.fire('Contenido Actualizado','','success');
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
.imagen{
    width: 400px;
    height: 200px;
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
