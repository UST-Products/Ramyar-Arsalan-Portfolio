<template lang="">
  <div >

    <v-app-bar app  class="navbar" >
      <v-app-bar-nav-icon large @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar flat >

<v-spacer></v-spacer>

<v-menu offset-y rounded open-on-hover v-model="lang_menu">
      <template v-slot:activator="{ on, attrslang }">
        <v-btn
          color="deep-purple"
          class="white--text"
          v-bind="attrslang"
          v-on="on"
        >
          {{langkeyword('LANGUAGE')}}
          <v-icon v-if="lang_menu">mdi-menu-up</v-icon>
          <v-icon v-else>mdi-menu-down</v-icon>
        </v-btn>
      </template>
      <v-list style="text-align-last:center">
        <v-list-item
          v-for="(lang, index) in langs"
          :key="index"
          link
        >
          <v-list-item-title v-on:click="changeLang(lang.value)">{{ lang.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
</v-menu>
   <v-switch class="mx-3" hide-details @click="darkmode()" v-model="switchBtn"></v-switch>

        <v-spacer></v-spacer>




    <v-menu offset-y>
      <template v-slot:activator="{ on, attrs }">
        <v-btn
        large
         icon
          color="light"
          v-bind="attrs"
          v-on="on"
        >                     
        <v-icon>mdi-account</v-icon>
        </v-btn>
      </template>
      <v-list  dense nav outlined two-line>


        <v-list-item>
          <v-list-item-title>
        <v-tooltip bottom >
          <template v-slot:activator="{ on, attrs }">
            <v-btn to="/dashboard/profile"
             text large 
             class="mx-2 "
             v-bind="attrs" v-on="on">
              <v-icon>mdi-account</v-icon>
              <span>{{username}}</span>
            </v-btn>
          </template>
          <span class="rabar-font">{{langkeyword('PROFILE')}}</span>
        </v-tooltip>
          </v-list-item-title>
        </v-list-item>



        <v-list-item>
          <v-list-item-title>
        <v-dialog v-model="dialog" persistent max-width="290">
          <template v-slot:activator="{ on, attrs }">
            <v-btn v-bind="attrs" v-on="on" text large width="100%">
            <span class="mx-4">{{langkeyword('LOGOUT')}}</span> 
<v-icon :style="directionLang().dir=='rtl' ? 'transform:rotate(180deg)' : '' ">mdi-logout-variant</v-icon>
           </v-btn>
          </template>
          <v-card class="logout">
            <v-card-title class="logout">
              {{langkeyword('WARNING')}} 
            </v-card-title>
            <v-card-text>{{langkeyword('ARE_YOU_SURE_YOU_WANT_CLOSE_ACCOUNT')}}</v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="red darken-1" text @click="dialog = false">
                {{langkeyword('NO')}}
              </v-btn>
              <v-btn color="green darken-1" text @click="logout()">
                {{langkeyword('YES')}}
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
          </v-list-item-title>
        </v-list-item>




  

      </v-list>
    </v-menu>


<!-- 
        <v-tooltip bottom >
          <template v-slot:activator="{ on, attrs }">
            <v-btn to="/dashboard/profile"
             text small 
             class="mx-2 "
             v-bind="attrs" v-on="on">
              <v-icon>mdi-account</v-icon>
             
              <span>{{username}}</span>
            </v-btn>
          </template>
          <span class="rabar-font">{{langkeyword('PROFILE')}}</span>
        </v-tooltip> -->





        <!-- <v-dialog v-model="dialog" persistent max-width="290">
          <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on">
              <v-icon :style="directionLang().dir=='rtl' ? 'transform:rotate(180deg)' : '' ">mdi-logout-variant</v-icon>
            </v-btn>
          </template>
          <v-card class="logout">
            <v-card-title class="logout">
              {{langkeyword('WARNING')}} 
            </v-card-title>
            <v-card-text>{{langkeyword('ARE_YOU_SURE_YOU_WANT_CLOSE_ACCOUNT')}}</v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="red darken-1" text @click="dialog = false">
                {{langkeyword('NO')}}
              </v-btn>
              <v-btn color="green darken-1" text @click="logout()">
                {{langkeyword('YES')}}
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog> -->

        

      </v-toolbar>
    </v-app-bar>

    
    <v-navigation-drawer v-model="drawer" app  :right="langoptions('rtl')==true">
      <template v-slot:prepend>
        <v-list-item>
          <v-list-item-content>
            <v-list-item-title :class=" lang()=='en'? 'text-justify ml-1' : 'text-justify mr-1' ">
            <h3>  <v-icon color="light">mdi-view-dashboard</v-icon>
             <span :class="lang()=='en' ? 'ml-7' : 'mr-7'"> {{appName()}}  </span> </h3>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item> 
      </template>

      <v-divider class="my-3"></v-divider>

      <v-list nav dense>
        <v-list-item-group v-model="selectedItem">

          <v-list-item  to="/dashboard/home" link>
            <v-list-item-icon>
              <v-icon>mdi mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title class="item-title">{{langkeyword('HOME')}}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          

          <v-list-item  to="/dashboard/users" link>
            <v-list-item-icon>
              <v-icon>mdi mdi-account-group</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title class="item-title">{{langkeyword('USERS')}}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>


    <v-list-group prepend-icon="mdi-cog" :value="$route.fullPath.includes('/setting/')===true ? true : false">

        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>{{langkeyword('SETTINGS')}}</v-list-item-title> 
          </v-list-item-content>
        </template>

        <v-list-item link to="/dashboard/setting/appearances">
        <v-list-item-icon>
        <v-icon>mdi-invert-colors</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{langkeyword('APPEARANCES')}}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/dashboard/setting/contacts">
        <v-list-item-icon>
        <v-icon>mdi-contacts</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{langkeyword('CONTACTS')}}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/dashboard/setting/metas">
        <v-list-item-icon>
        <v-icon>mdi-card-search</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{langkeyword('METATAGS')}}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>


        <v-list-item link to="/dashboard/setting/socials">
        <v-list-item-icon>
        <v-icon>mdi-social-distance-2-meters</v-icon>
        </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{langkeyword('SOCIALS')}}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      </v-list-group>











        </v-list-item-group>
          <v-list-item class="my-5">
            <v-list-item-subtitle class="text-center">{{appName()}} &copy; </v-list-item-subtitle>
          </v-list-item>
      </v-list>



    </v-navigation-drawer>




  </div>
</template>


<script>
import NavRequests from '../../requests/dashboard/Nav'
  export default {
    data:function(){
      return{
      messages:5,
      menu: false,
      hints: true,
      username:this.$store.state.dashboardauth.name,
      selectedItem: 0,
      drawer: null,
      setFont:[],
      dialog: false,
      lang_menu:false,
      langs:[
        {title:this.langkeyword('KURDISH'),value:'ku'},
        {title:this.langkeyword('ENGLISH'),value:'en'},
        {title:this.langkeyword('ARABIC'),value:'ar'}
        ],
      backcolor: '#8366FC',
      textcolor: '#FFFFFF',
      switchBtn:false
 
    }},
    methods: {
      changeLang(lang){
        localStorage.removeItem('lang')
        localStorage.setItem('lang',lang)
        this.$store.state.actlang = lang
        window.location.href=''
      },
      authcheck(){
    NavRequests.checkAuth({
    isAuthCheck:true,
    user_id:this.dashboardAuthId(),
    token:this.dashboardAuthToken(),
  },(res)=>{
    if (res.data.status===false){
this.$router.push('/dashboard/auth/login')
    }
    else if(res.data.status===true) {
     this.$store.state.dashboardauth = res.data.data
     this.username = this.$store.state.dashboardauth.name
    }
  })
      },

      darkmode() {
        this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
        localStorage.setItem("dashboardTheme", this.$vuetify.theme.dark.toString());
      },
      logout() {  
    NavRequests.logOut({
    isLogout:true,
    user_id:this.dashboardAuthId(),
  },(res)=>{
    if (res.data.status===true) {
      localStorage.removeItem("dashboardauthId")
      localStorage.removeItem("dashboardauthToken")
      this.$router.push('/dashboard/auth/login')
    }
  })
      },
    },
    mounted() {
      this.authcheck()
const AppLanguage=this.$store.state.actlang
        if (AppLanguage=='ku' || AppLanguage=='ar') {
           this.$vuetify.rtl = true
        }
        if (AppLanguage=='en') {
           this.$vuetify.rtl = false
        }

        const theme = localStorage.getItem("dashboardTheme");
            if (theme) {
                if (theme == "true") {
                    this.$vuetify.theme.dark = true;
                    this.switchBtn = true;
                } else {
                    this.$vuetify.theme.dark = false;
                    this.switchBtn = false;
                }
            }
    },
    computed: {

    },





  }
</script>


<style  lang="css">
  @font-face {
    font-family: "rabar";
    src: local("rabar"),
      url(../../assets/fonts/Rabar_039.ttf) format("truetype");
  }

  
  @font-face {
    font-family: "rudaw";
    src: local("rudaw"),
      url(../../assets/fonts/rudawregular2.ttf) format("truetype");
  }

  *{
    font-family: "rabar" !important;
  }

  :root {
    --navbar-color: #2C6C70;
    --navbar-text: #FFFFFF;
    --purple-color: #2C6C70;
    --bgGreyColor: #EEEDF7;
    --grayColor: rgb(0, 0, 0, 54%);
    --bgdarkblue: #1e1e2f;
    --darknavbar: #27293d;
    --another: #27293d;
     --comp: #27293d;
  }
  
/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: none;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background:#2C6C70;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background:#2C6C70;
}

    /* body  background */

  .theme--light .dashboard {
    background: #EEEDF7 !important;
  }

  .theme--dark .dashboard {
    background:#1e1e2f !important;
  }

 .dashboard .account,
  .dashboard.theme-text,
  .dashboard.logout {
    font-family: "rabar" !important;
  }



  /* active tab color */
  .theme--dark .dashboard .v-list-item-group .v-list-item--active {
     color: white !important;
  }
  /* navigation drawer */

  .theme--dark .dashboard .v-navigation-drawer {
    background: var(--another) !important;
  }

  /* logout */
  .theme--dark  .logout {
    background: var(--darknavbar) !important;
  }


 * {
    font-family: "rabar";
  }

  /*  set color for list item text*/
  .theme--light .dashboard .v-list .v-list-item__title {
    color: var(--another) !important;
  }

  /* when user hover of any list focused and set background  */
  .theme--light .dashboard .v-list-item--active:hover::before,
  .theme--light .dashboard .v-list-item--active::before {
    background: #2C6C70;
    color: #2C6C70;
  }

  .theme--dark .dashboard.v-list-item--active:hover::before,
  .theme--dark .dashboard.v-list-item--active::before {
    background: #3a3f51;

  }

  /* card */
  .theme--dark .dashboard .v-card {
    background: var(--another) !important;
  }

  .client-footer .dashboard .v-card{
  background:  #EEEDF7 !important;
}



  .theme--light  .dashboard  .v-list .v-list-item--active .v-icon {
    color: var(--another) !important;
  }

  .theme--light .dashboard  .v-list .v-list-item--active .v-list-item__title {
    color: var(--another) !important;
  }


  .theme--dark.v-data-table {
    background: var(--another) !important;
  }


  /* data table hover row */
  .theme--dark.v-data-table>.v-data-table__wrapper>table>tbody>tr:hover:not(.v-data-table__expanded__content):not(.v-data-table__empty-wrapper) {
    background: #3a3f51 !important;
  }

  /* data table radius */
  .dashboard .v-data-table .v-toolbar__content,
  .v-toolbar__extension {
    border-radius: 15px !important;
  }

  .theme--dark .dashboard .v-data-table .v-sheet {
    border-radius: 0px !important;
    background: var(--another) !important;
  }

  .dashboard .v-data-table {
    padding: 15px !important;
  }




  /* navbar background  */

  /* for light mode */
  

 
  .theme--light .dashboard .navbar .v-toolbar.v-sheet{
    background: rgb(255, 255, 255) !important;
  }
  .theme--light .dashboard .navbar{
    background: rgb(255, 255, 255) !important;
  }



  /* for dark mode */
  .theme--dark .dashboard .v-app-bar.v-toolbar.v-sheet,
  .theme--dark .dashboard .v-toolbar__content,
  .dashboard .v-toolbar__extension {
    background: var(--another)  !important;
  }

    .theme--dark .dashboard .v-app-bar.client-navbar.v-sheet,
  .theme--dark .dashboard .client-navbar .v-toolbar__content{
    background: #EEEDF7  !important;
  }

 


  /* pagination */
  .theme--dark .dashboard .v-pagination .v-pagination__item {
    background: var(--another) !important;
  }

  .theme--dark .dashboard .v-pagination .v-pagination__item--active {
    background: #0d47a1 !important;
  }

  .theme--dark .dashboard .v-pagination .v-pagination__navigation {
    background: var(--another) !important;
  }

  /* tabs */

  .theme--dark .dashboard .v-tabs-items {
    background: var(--another) !important;
    border-bottom-left-radius: 10px !important;
    border-bottom-right-radius: 10px !important;
  }

  .theme--dark .dashboard .v-tabs>.v-tabs-bar {
    background: #3a3f51 !important;
    border-top-left-radius: 10px !important;
    border-top-right-radius: 10px !important;
  }


  /* account */
   .dashboard .account {
    border-radius: 10px !important;
    font-size: 12px !important;
    color: white !important;
  }

   .dashboard .account::before {
    background: transparent !important;
  }

  .dashboard  .account:hover {
    background: #484c5a !important;
    border-radius: 10px !important;
  }

/* footer */
.theme--light .dashboard .v-footer{
  background: white  !important;
  color:#3a3f51 !important;
}

.theme--dark .dashboard .v-footer{
  background: var(--another)  !important;
  color: white !important;
}



/* v-sheet */
.theme--dark .dashboard .slider-group{
  background: var(--bgdarkblue) !important;
}



/* bottom navigation */
.theme--dark .dashboard .bottom-nav {
  background: var(--another) !important;
}
.theme--light .dashboard .bottom-nav {
  background: var(--navbar-color) !important;
}


/* skeleton loader background */

.theme--dark .dashboard .v-skeleton-loader .v-skeleton-loader__actions, .theme--dark.v-skeleton-loader .v-skeleton-loader__article, .theme--dark.v-skeleton-loader .v-skeleton-loader__card-heading, .theme--dark.v-skeleton-loader .v-skeleton-loader__card-text, .theme--dark.v-skeleton-loader .v-skeleton-loader__date-picker, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item-avatar, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item-text, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item-two-line, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item-avatar-two-line, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item-three-line, .theme--dark.v-skeleton-loader .v-skeleton-loader__list-item-avatar-three-line, .theme--dark.v-skeleton-loader .v-skeleton-loader__table-heading, .theme--dark.v-skeleton-loader .v-skeleton-loader__table-thead, .theme--dark.v-skeleton-loader .v-skeleton-loader__table-tbody, .theme--dark.v-skeleton-loader .v-skeleton-loader__table-tfoot{
  background: var(--another) !important;
}

</style>