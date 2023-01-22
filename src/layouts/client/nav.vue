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
       
      <v-list>

        <v-list-item link href="#" @click="click_home_drawer()">
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link href="#" v-scroll-to="'#exp'" @click="mobileDrawer=false">
          <v-list-item-content>
            <v-list-item-title>Experience</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link href="#" v-scroll-to="'#about'" @click="mobileDrawer=false">
          <v-list-item-content>
            <v-list-item-title>About</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link href="#" v-scroll-to="'#contact'" @click="mobileDrawer=false">
          <v-list-item-content>
            <v-list-item-title>Contact</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item >
          <div class=" mt-6">

<v-row class="d-flex  px-3">
  <h5>Follow Me</h5>
</v-row>

<v-row class="d-flex  px-2" >
  <a href="https://www.facebook.com/profile.php?id=100007840786454&mibextid=LQQJ4d" style="text-decoration: none;"> <v-icon class="mx-1">mdi-facebook</v-icon></a>
               <a href="https://youtube.com/@ramyar_group6450" style="text-decoration: none;"> <v-icon class="mx-1">mdi-youtube</v-icon></a>
               <a href="https://instagram.com/ramyar_arsalan?igshid=NTdlMDg3MTY=" style="text-decoration: none;"> <v-icon class="mx-1">mdi-instagram</v-icon></a>
</v-row>

</div>
        </v-list-item>


      </v-list>

      

      <!-- <template v-slot:append>
        <div class="pa-2 mb-4">

           <v-row class="d-flex  px-4">
             <h5>Follow Me</h5>
           </v-row>
          
          <v-row class="d-flex  px-2" >
               <a href="#" style="text-decoration: none;"> <v-icon class="mx-1">mdi-facebook</v-icon></a>
               <a href="#" style="text-decoration: none;"> <v-icon class="mx-1">mdi-youtube</v-icon></a>
               <a href="#" style="text-decoration: none;"> <v-icon class="mx-1">mdi-instagram</v-icon></a>
         </v-row>

        </div>
      </template> -->
      
      </v-navigation-drawer>
  
  
  
      
      <v-app-bar
        app
        elevation="0"
        class=" navbarColor navbar-desktop"
        style="padding:0px 90px  !important"
      >
 
      
      

      <v-btn   :class="{ active: isActive('home') }"  text @click="click_home()"  class="mx-2 text-capitalize">
           <h3>Home</h3>
      </v-btn>

      <v-btn href="#" v-scroll-to="'#exp'" :class="{ active: isActive('exp') }" @click="setActive('exp')"  text  class="mx-2 text-capitalize">
           <h3>Experience</h3>
      </v-btn>

      <v-btn href="#" v-scroll-to="'#about'" text :class="{ active: isActive('about') }" @click="setActive('about')"  class="mx-2 text-capitalize">
           <h3>About Me</h3>
      </v-btn>

      <v-btn href="#" v-scroll-to="'#contact'" text :class="{ active: isActive('contact') }" @click="setActive('contact')" class="mx-2 text-capitalize">
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
               <a href="https://www.facebook.com/profile.php?id=100007840786454&mibextid=LQQJ4d" style="text-decoration: none;"> <v-icon class="mx-1">mdi-facebook</v-icon></a>
               <a href="https://youtube.com/@ramyar_group6450" style="text-decoration: none;"> <v-icon class="mx-1">mdi-youtube</v-icon></a>
               <a href="https://instagram.com/ramyar_arsalan?igshid=NTdlMDg3MTY=" style="text-decoration: none;"> <v-icon class="mx-1">mdi-instagram</v-icon></a>
         </v-row>
  
  
      
  
        
          
      </v-app-bar>
  
  
  
      <!-- for mobile -->
  
        <v-app-bar
        app
        class="px-2 bg_mode color_mode navbar-mobile"
      
      >
      


            <v-btn
            @click="mode()"
              fab
              small
              elevation="0"
            >
            <v-icon v-if="$vuetify.theme.dark==false" >mdi-weather-night</v-icon>
            <v-icon v-if="$vuetify.theme.dark==true" >mdi-white-balance-sunny</v-icon>
        
            </v-btn>

            <v-spacer></v-spacer>

        <v-btn
          text
          fab
          small
          elevation="0"
          @click.stop="mobileDrawer = !mobileDrawer"
        >
          <v-icon>mdi-menu</v-icon>
        </v-btn>
 
      </v-app-bar>
  
  
 
  
  
  
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
      items: [
          { title: 'Home', to: '#home' },
          { title: 'Experience', to: '#exp' },
          { title: 'About Me', to: '#about' },
          { title: 'Contact', to: '#contact' },
        ],
        activeItem: 'home'
      // testt:i18n.t('ENGLISH')
  
          
     
    }),
    // components:{navItem},
    props: {
      color: String,
      flat: Boolean,
    }, 

  
    methods: {


      isActive(menuItem) {
      return this.activeItem === menuItem
    },

    setActive(menuItem) {
      this.activeItem = menuItem // no need for Vue.set()
    },

        click_home(){
          this.setActive('home')
          window.scrollTo({
                        top:0,
                        behavior: 'smooth'
          });

        },
        click_home_drawer(){
          this.mobileDrawer=false
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
  
  