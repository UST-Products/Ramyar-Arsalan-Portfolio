<template>
  <div>
    
    <navbar></navbar>


<v-container>
<v-row no-gutters>
<v-col cols="12" xs="6" sm="6" md="4" lg="3" xl="2" v-for="(item, index) in services" :key="index">
<v-card tile link class="mx-1 mt-1 py-1 home-card radius-rounded "  >
<v-list-item dense>
<v-list-item-content>
<div class="fs-small rabar">
{{item.name}}
</div>
<v-list-item-title class="text-h6">
{{item.num}}
</v-list-item-title>
</v-list-item-content>
<v-list-item-avatar tile size="35" class="rounded">
<v-icon :color="item.color" large>{{item.icon}}</v-icon>
</v-list-item-avatar>
</v-list-item>
</v-card>
</v-col>
</v-row>
</v-container>





    <div class="mt-16"></div>
      <dashboardFooter/>

  </div>
</template>

<script>
  import navbar from '../../layouts/dashboard/nav.vue'
  import dashboardFooter from '../../layouts/dashboard/dashboardFooter.vue'
  export default {
    data() {
      return {
        services: [
          { 
            name: this.langkeyword('USERS'),
            icon: 'mdi-account',
            num:this.$store.state.dashboardhome.countusers,
            color: 'deep-purple darken-1'
          },
          { 
            name: this.langkeyword('CONTACTS'),
            icon: 'mdi-card-account-mail',
            num:this.$store.state.dashboardhome.countcontacts,
            color: 'deep-purple darken-1'
          }
        ]
      }
    },
    components: {
      navbar,dashboardFooter
    },
    methods: {

    },
    mounted(){
      
    }
  }
</script>


<style>
  @font-face {
    font-family: "rabar";
    src: local("rabar"),
      url(../../assets/fonts/Rabar_039.ttf) format("truetype");
  }

  .radius-rounded {
    border-radius: 15px !important;
  }

  .rabar {
    font-family: "rabar" !important;
  }
  
  .fs-small {
    font-size:.9rem;
  }

  .theme--dark .dashboard .home-card:hover{
    background:#393B56 !important;
    transition: ease 0.2s !important;
  }
  .theme--light .dashboard .home-card:hover{
    background:#ECEAEA !important;
    transition: ease 0.2s !important;
  }
</style>