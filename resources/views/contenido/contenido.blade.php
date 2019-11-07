@extends('principal')
@section('contenido')
<!-- Contenido Principal -->
<template v-if="menu==0">
<h1>Hola mundo menu 0</h1>
</template>
<template v-if="menu==1">

    <slider-component></slider-component>
</template>
<template v-if="menu==2">
        <user></user>
</template>
<template v-if="menu==3">
    <h1>Hola mundo menu 3</h1>
</template>
<template v-if="menu==4">
    <h1>Hola mundo menu 4</h1>
</template>
<template v-if="menu==5">
    <evento></evento>


</template>
<template v-if="menu==6">
    <h1>Hola mundo menu 6</h1>
</template>
<template v-if="menu==7">
<novedad></novedad>
</template>
<template v-if="menu==8">
    <h1>Hola mundo menu 8</h1>
</template>
<template v-if="menu==9">
    <categoria></categoria>
</template>
<template v-if="menu==10">
    <archivo></archivo>
</template>
<template v-if="menu==11">
   <mensaje></mensaje>
</template>
<template v-if="menu==12">
    <h1>Hola mundo menu 12</h1>
</template>
<template v-if="menu==20">
       <tramite></tramite>
    </template>
    <template v-if="menu==21">
        <archivo_tramite></archivo_tramite>
     </template>
     <template v-if="menu==30">
            <respuesta></respuesta>
         </template>
         <template v-if="menu==100">
            <servicio></servicio>
         </template>
         <template v-if="menu==101">
            <a-servicio></a-servicio>
         </template>
         <template v-if="menu==102">
            <imagen></imagen>
         </template>
         <template v-if="menu==103">
            <archivo_servicio></archivo_servicio>
         </template>

@endsection
