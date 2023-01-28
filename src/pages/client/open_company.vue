<template>
    <div>
        <!-- <navbar/> -->

        <v-container>
         <v-row class="mt-1">
          <v-btn v-if="lang()=='en'" to="/" flat icon color="primary" >
            <v-icon>mdi-arrow-left</v-icon>
           </v-btn>
           <v-btn v-else to="/" flat icon color="primary" >
            <v-icon>mdi-arrow-right</v-icon>
           </v-btn>
         </v-row>
         </v-container>
        
        <v-container>
            <v-row class="d-flex justify-center  pa-5 ">
                <v-card class="bg_mode pa-10 rounded-lg" width="100%">

                     <v-row align="center" class="d-flex flex-wrap company_image_row">

                        <v-img
                        max-width="130"
                        class="company_image"
                        src="https://imgs.search.brave.com/rYoPelsfyW9ev18-EKOHksgjr0RenPMAg99FivrMLKs/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9jZG4u/ZnJlZWJpZXN1cHBs/eS5jb20vbG9nb3Mv/bGFyZ2UvMngvbW9u/ZXJvLWxvZ28tcG5n/LXRyYW5zcGFyZW50/LnBuZw"
                      ></v-img>

                        <v-list style="background:transparent !important" class="company_name_list">
                  <v-list-item >
                  
                    <v-list-item-content>
                      <v-list-item-title style="font-size: 30px;">Company Name</v-list-item-title>
                      <p></p>
                      <p></p>
                      <v-list-item-title style="font-size: 17px;"> <v-icon>mdi-map-marker</v-icon> iraq, slemani ,twi malik</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>

                     </v-row>

                    
                      <v-row class="d-flex justify-space-between flex-wrap mt-10">
                        <v-col cols="12" md="4" lg="4">
                                <h3 class="indesktop-center"> {{langkeyword('ABOUT_COMPANY')}}</h3>
                                <p class="text-opacity mt-5 text-justify">
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years,
                                </p>
                        </v-col>

                        <v-col cols="12" md="4" lg="4" class="">
                                <h3 class="indesktop-center">{{langkeyword('SERVICE_TYPE')}}</h3>
                                <p class="text-opacity mt-5  indesktop-center">
                                    Social Media Management
                                </p>
                        </v-col>

                        <v-col cols="12" md="4" lg="4" >
                                <h3 class="indesktop-center">{{langkeyword('START_FROM')}}</h3>
                                <p class="text-opacity mt-5  indesktop-center">
                                    Dec, 19, 2021
                                </p>

                                 <v-row class="mt-10">
                                   <v-col cols="" md="">
                                    <h3 class="indesktop-center">{{langkeyword('FINISHED_TO')}}</h3>
                                <p class="text-opacity mt-5 indesktop-center ">
                                    Dec, 19, 2022
                                </p>
                                   </v-col>
                                 </v-row>
                        </v-col>

                      </v-row>



                </v-card>
         </v-row>
       </v-container>





        <appFooter/>
    </div>
</template>

<script>
// import navbar from "../../../layouts/client/nav.vue";
import appFooter from "../../layouts/client/footer.vue";
    export default {
        components:{appFooter},
        data() {
            return {
              lang_menu: false,
              lang_menu_mobile: false,
              langs:[],
              activeLang:'',
            }
        },
        
        
        mounted() {



            
      let updatelangs = [
        {title:this.langkeyword('ENGLISH'),value:'en'},
        {title:this.langkeyword('KURDISH'),value:'ku'},
        {title:this.langkeyword('ARABIC'),value:'ar'}
      ]
      this.langs = updatelangs
     if(this.lang()==='en') {
     this.activeLang = this.langkeyword('ENGLISH')
     this.arrowIcon='mdi-arrow-left'
     }
    if(this.lang()==='ar') {
     this.activeLang =this.langkeyword('ARABIC')
     this.arrowIcon='mdi-arrow-right'
     }
     if(this.lang()==='ku') {
     this.activeLang =this.langkeyword('KURDISH')
      this.arrowIcon='mdi-arrow-right'
     }
    
    
         const AppLanguage=this.$store.state.actlang
          if (AppLanguage=='ku' || AppLanguage=='ar') {
             this.$vuetify.rtl = true
          }
          if (AppLanguage=='en') {
             this.$vuetify.rtl = false
          }


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
    }
</script>

<style scoped>

</style>