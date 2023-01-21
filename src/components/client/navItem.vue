<template>
        <v-btn v-bind="attrs" v-on="on" text :to="to" class="  mx-2">
           <!-- <v-icon>{{icon}}</v-icon> -->
           <h5 >{{text}}</h5>
        </v-btn>
    
</template>

<script>
    export default {
        props:['to','class_style','icon','TooltipText','text']
    }
</script>

<style>
  /* .navItem{
    margin: 10px !important;
  } */
</style>