<template>
  <div>



<div class="centered">
    <v-progress-circular
     v-if="!loadApp"
      :size="70"
      :width="7"
      style="color:purple;"
      indeterminate
    ></v-progress-circular>
</div>

    
  <!-- <v-app id="inspire" v-if='loadApp' :class="['is'+appDirectionLang()]"> -->
  <v-app id="inspire" v-if='loadApp'>
    
    <navbar v-if="!$route.meta.hideNavbar"/>

    <v-main :class="[app_style ? 'dashboard' :'client']">

     
       <router-view :key="$route.path"></router-view>

       
    
    </v-main>

    
  </v-app>
</div>
</template>


<script>
import navbar from './layouts/client/nav.vue'
import Vue from 'vue'
import AppRequests from './requests/App'
import MyHelpers from './helpers'

export default {
  components:{navbar},
  data() {
    return {
      metasList:[],
      appTitle:null,
      user_route:['login','registerHome','forgotHome'],
      app_style:false,
      dialog_style:false,
      isAuth:false,
      loadApp:false,
      bodyColor:'',
    }
  }, 
  computed:{
  },
  methods: {
    load(){
this.$store.commit('fetchData')
if(localStorage.getItem('lang')==undefined || localStorage.getItem('lang')=='undefined' 
|| localStorage.getItem('lang')==null || localStorage.getItem('lang')=='') {
AppRequests.firstFetch({isLoadApp:true},(res)=>{
if (res.data.status===true) {
Vue.use(MyHelpers)
localStorage.setItem('lang',res.data.fetchsetting.lang) 
this.$store.state.setting = res.data.fetchsetting 
this.$store.state.metas = res.data.getmetas 
this.$store.state.socials = res.data.getsocials 
this.$store.state.actlang = res.data.fetchsetting.lang
}
}) 
}
else {
this.$store.state.actlang = localStorage.getItem('lang')
Vue.use(MyHelpers)
}
      setTimeout(() => {
        this.loadApp=true
        this.fetchDatas()
      }, 1000);
    },
    appdirectionLang(){
      return this.directionLang();
    },
 
fetchDatas(){
AppRequests.firstFetch({isLoadApp:true},(res)=>{
if (res.data.status===true) {
this.$store.state.setting = res.data.fetchsetting
console.log(this.$store.state.setting)
this.$store.state.metas = res.data.getmetas 
this.$store.state.socials = res.data.getsocials 
document.getElementById("appfavicon").href = this.uploadPath('/dashboard/setting/'+this.$store.state.setting.favicon)
this.metasAndHeaders()
}
})
},


metasAndHeaders(){
  document.getElementById('apptitle').innerHTML = this.$store.state.setting.en_name
if(this.lang()==='en') {
   this.appTitle = this.$store.state.setting.en_name
   }
  if(this.lang()==='ar') {
   this.appTitle = this.$store.state.setting.ar_name
   }
   if(this.lang()==='ku') { 
   this.appTitle = this.$store.state.setting.ku_name
   } 
   if(window.location.pathname.includes('/Dashboard') || window.location.pathname.includes('/dashboard')){
     this.app_style=true
   } 
   else {   
   this.$store.state.metas.forEach(element => {
     this.metasList.push({name:'keywords',content:element.ku_keywords})
     this.metasList.push({name:'keywords',content:element.ar_keywords})
     this.metasList.push({name:'keywords',content:element.en_keywords})
     this.metasList.push({name:'description',content:element.ku_content})
     this.metasList.push({name:'description',content:element.ar_content})
     this.metasList.push({name:'description',content:element.en_content})
   })
    }
}

  },
    metaInfo() {
    return { 
    title:this.appTitle,
    meta:this.metasList
    }
  }, 
  mounted(){
  this.load()
  }, 



  watch:{
    $route(){
                          window.scrollTo({
                        top:0,
                        behavior: 'smooth'
                        });
    }
  },


  created(){
    // document.body.classList.add('body');

    if (this.$vuetify.theme.dark==true) {
      this.$store.commit('set_body_color','#1E1E2F')
    }else{
      this.$store.commit('set_body_color','#EEEDF7')
    }
  }

}
</script>


<style>
@import './assets/css/client.css';
@import './assets/css/media_query.css';

  @font-face {
    font-family:"rabar";
    src: url(/assets/fonts/Rabar_039.ttf) format("truetype");
  }

  @font-face {
    font-family: "rudaw";
    src: local("rudaw"),
      url(/assets/fonts/rudawregular2.ttf) format("truetype");
  }

  *{
    font-family:"rabar" !important;
  }


  .rabar_font{
    font-family:"rabar" !important;
  }


.txtarea .v-input__control .v-input__slot::before{
    border: none !important;
    border-style: none !important;
}
.txtarea .v-input__control .v-input__slot::after{
    border: none !important;
    border-style: none !important;
}



.v-btn{
  letter-spacing: 0 !important;
}

.v-dialog{
  box-shadow: none !important;
}

.v-overlay__scrim{
background: #1e1e2f  !important;
}
.rabar-font{
  font-family: "rabar" !important;
}

.rudaw-font{
  font-family: "rudaw" !important;
}

.radius-10{
  border-radius: 10px !important;
}
.radius-15{
  border-radius: 15px !important;
}
.radius-20{
  border-radius: 20px !important;
}

.radius-circle{
  border-radius: 50% !important;
}

.v-tab {
  letter-spacing:normal !important;
}

.isltr .v-text-field .v-label {
    right: unset !important;
}


.isltr .v-list-item__content {
  text-align: left !important;
}

.router-link-active{
  text-decoration: none !important;
}


/*  client login and register color */
.theme--light .client_auth{
    background:linear-gradient(to right, #43cea2, #185a9d) !important
}

.theme--dark .client_auth .v-card{
    background:#2E3651 !important
}
.theme--light .client_auth .v-card .cancel_btn{
    color:#1976D2  !important
}

.theme--dark .client_auth .v-otp-input .v-input .v-input__control .v-input__slot {
    background: #1e1e2f !important;
}

.theme--dark .v-dialog .v-card{
  background:#27293D !important
}

.centered {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}



</style>


