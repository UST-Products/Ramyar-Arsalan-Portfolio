<template>
    <div>
  
  
  
  <!--       :class="directionLang().dir=='rtl' ? 'v-navigation-drawer--right' : 'v-navigation-drawer--left'" -->
  <!-- mobile drawer -->
     <v-navigation-drawer
        v-model="mobileDrawer"
        temporary
        app
        left
      >
        <v-list-item to="/profile" active-class="profile_mobile">
          <v-list-item-avatar>
            <v-img src="https://cdn.pixabay.com/photo/2019/09/04/13/41/couple-4451632__340.jpg"></v-img>
          </v-list-item-avatar>
  
          <v-list-item-content>
            <v-list-item-title>Zhyar Ali</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
  
        <v-divider></v-divider>
  
          <v-list >
            <v-list-item >
              <v-list-item-title v-if="$vuetify.theme.dark">LightMode</v-list-item-title>
              <v-list-item-title v-else>DarkMode</v-list-item-title>
              <v-list-item-action>
                <v-switch hide-details  @click="mode()" v-model="darktheme"></v-switch>
              </v-list-item-action>
            </v-list-item>
    
  
                   <v-menu  v-model="lang_menu_mobile" offset-y>
                <template v-slot:activator="{ on, attrs }">
                  <v-btn class="text-capitalize font_rabar" v-bind="attrs" v-on="on" text>
                    <v-icon>mdi-translate</v-icon>
                    {{ activeLang }}
                    <v-icon >mdi-menu-down</v-icon>
                  </v-btn>
                </template>
                <v-list dense>
                  <v-list-item link v-for="(lang, index) in langs" :key="index">
                    <v-list-item-title v-on:click="changeLang(lang.value)">{{ lang.title }}</v-list-item-title>
                  </v-list-item>
                </v-list>
              </v-menu>
  
          
          <v-list-item to="/login" link  class="rounded-lg">
             <v-icon >mdi-logout</v-icon> &nbsp; Logout
          </v-list-item>
  
          <v-list-item to="/edit_profile" link  class="rounded-lg">
             <v-icon >mdi-cog</v-icon> &nbsp; Setting
          </v-list-item>
  
          </v-list>
      
      </v-navigation-drawer>
  
  
  
      <v-app-bar
        app
        class="px-2 navbarColor "
        v-if="isXs"
    
      >
 

      <v-btn  text @click="click_home()"  class="mx-2 text-capitalize">
           <h3>Home</h3>
      </v-btn>

      <v-btn href="#exp"  text  class="mx-2 text-capitalize">
           <h3>Experience</h3>
      </v-btn>

      <v-btn href="#about" text  class="mx-2 text-capitalize">
           <h3>About Me</h3>
      </v-btn>

      <v-btn  text  class="mx-2 text-capitalize">
           <h3>Contact</h3>
      </v-btn>
      
    
  
   <v-spacer></v-spacer>
  

<v-btn
    @click="mode()"
      fab
      small
      elevation="0"
      class="mx-6 "
    >
     <v-icon v-if="$vuetify.theme.dark==false" >mdi-weather-night</v-icon>
     <v-icon v-if="$vuetify.theme.dark==true" >mdi-white-balance-sunny</v-icon>
 
    </v-btn>

    <v-spacer></v-spacer>


         <v-row class="d-flex justify-end px-2" >
                <v-icon class="mx-1">mdi-facebook</v-icon>
                <v-icon class="mx-1">mdi-youtube</v-icon>
                <v-icon class="mx-1">mdi-instagram</v-icon>
         </v-row>
  
  
      
  
        
          
      </v-app-bar>
  
  
  
      <!-- for mobile -->
  
        <v-app-bar
        app
        class="px-2 b_mode color_mode "
        v-else
      >
      
        <v-app-bar-title>
          <router-link to="/">
          <!-- <v-img src="@/assets/applogo.png" max-width="120px" /> -->
          <h5 class="white--text">Kalian</h5>
        </router-link>
        </v-app-bar-title>
      
            <v-spacer></v-spacer>
  
           <v-btn icon to="/cart" color="white">
             <v-icon>mdi-cart</v-icon>
          </v-btn>
           <v-btn icon to="/setting" color="white">
             <v-icon>mdi-cog</v-icon>
          </v-btn>
           <v-btn text to="/login" color="white" style="font-size: 11px;">
              Logout
             <v-icon>mdi-logout</v-icon>
          </v-btn>
           <v-btn text to="/login" color="white" style="font-size: 11px;">
              Login
             <v-icon>mdi-login</v-icon>
          </v-btn>
      </v-app-bar>
  
  
  
  
  <!-- mobile bottom nav -->
      <v-bottom-navigation
      app fixed
      v-if="!isXs"
      color="primary"
    >
      <v-btn to="/">
        <span>Home</span>
         <v-icon>mdi-home-variant</v-icon>
      </v-btn>
  
  
      <v-btn to="/products">
        <span>Product</span>
         <v-icon>mdi-package</v-icon>
      </v-btn>
  
      <v-btn to="/productCategory">
        <span>Categories</span>
         <v-icon>mdi-shape</v-icon>
      </v-btn>
  
      <v-btn to="/brands">
        <span>Brands</span>
         <v-icon>mdi-tag-multiple</v-icon>
      </v-btn>
  
  
  
  
    </v-bottom-navigation>
  
  
  
    </div>
  </template>
  
  
  
  
  
  <script>
  // import notification from "../../components/client/navbarNotification.vue"
  // import navItem from "../../components/client/navItem.vue"
  // import i18n from '../../i18n'
  
  export default {
    data: () => ({
      username:'Zhyar Ali',
       mobileDrawer:false,
       menu:false,
      drawer: null,
      isXs: false,
      goDark:false,
      darktheme: false,
      lang_menu: false,
      lang_menu_mobile: false,
      langs:[],
      activeLang:'',
      radioGroup:'1',
      // testt:i18n.t('ENGLISH')
  
          
     
    }),
    // components:{navItem},
    props: {
      color: String,
      flat: Boolean,
    }, 
    methods: {

        click_home(){
          window.scrollTo({
                        top:0,
                        behavior: 'smooth'
          });
        },

        changeLang(lang){
          localStorage.setItem('lang',lang)
        //  let activeLang=localStorage.getItem('lang')
          window.location.href=''
        }, 
  
  
      onResize() {
        this.isXs = window.innerWidth > 850;
      },
                  mode() {
                  this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
                  localStorage.setItem("clientTheme", this.$vuetify.theme.dark.toString());
              },
  
  
           
    },
    
    mounted() {
  
      let updatelangs = [
        {title:this.langkeyword('ENGLISH'),value:'en'},
        {title:this.langkeyword('KURDISH'),value:'ku'},
        {title:this.langkeyword('ARABIC'),value:'ar'}
      ]
      this.langs = updatelangs
     if(this.lang()==='en') {
     this.activeLang =  this.langkeyword('ENGLISH')
     this.arrowIcon='mdi-arrow-left'
     }
    if(this.lang()==='ar') {
     this.activeLang =  this.langkeyword('ARABIC')
     this.arrowIcon='mdi-arrow-right'
     }
     if(this.lang()==='ku') {
     this.activeLang =  this.langkeyword('KURDISH')
      this.arrowIcon='mdi-arrow-right'
     }
    
    
         const AppLanguage=this.$store.state.actlang
          if (AppLanguage=='ku' || AppLanguage=='ar') {
             this.$vuetify.rtl = true
          }
          if (AppLanguage=='en') {
             this.$vuetify.rtl = false
          }
  
         
          // if (AppLanguage=='kurdish' || AppLanguage=='arabic') {
          //    this.$vuetify.rtl = true
          // }
          // if (AppLanguage=='english') {
          //    this.$vuetify.rtl = false
          // }
          
  
  
      this.onResize();
      window.addEventListener("resize", this.onResize, { passive: true });
  
              const theme = localStorage.getItem("clientTheme");
              if (theme) {
                  if (theme == "true") {
                      this.$vuetify.theme.dark = true;
                      this.darktheme = true;
                        this.$store.commit('set_theme',true)
                  } else {
                      this.$vuetify.theme.dark = false;
                      this.darktheme = false;
                      this.$store.commit('set_theme',false)
                  }
              }
    },
  
  
  };
  </script>
  
  
  
  
  <style scoped>
  
  
  .v-toolbar {
    transition: 0.6s;
  }
  
  
  .expand {
    height: 80px !important;
    padding-top: 10px;
  }
  
  /* mobile sidebar */
  
  /* .subtitile-1{
  font-family:"rabar" !important;
  }
  .font_rabar{
  font-family:"rudaw" !important;
  } */
  
  
  
  .v-list-item{
    margin-bottom: 10px !important;
  }
  
  
  .theme--light .profile_mobile {
    background: rgb(255, 255, 255) !important;
  }
  .theme--dark .profile_mobile {
    background: #2E3651 !important;
    color:white !important;
  }
  .theme--dark .profile_mobile .v-list-item__title{
    color:white !important;
  }
  
  </style>
  
  