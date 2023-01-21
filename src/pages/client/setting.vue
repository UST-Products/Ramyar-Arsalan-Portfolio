<template>
    <div>
    

<v-card
    class="mx-auto bg_mode mt-4 rounded-lg"
    max-width="370"
  >


    <v-list
      subheader
    >
      <v-subheader> <v-icon class="mx-1">mdi-translate</v-icon>Language</v-subheader>

      <v-list-item>
        <v-list-item-content class="pa-2">
            <v-radio-group
              column
              v-model="activeLang"
               @change="changeLang(activeLang)"
            >
              <v-radio
              class="mb-5"
                label="Kurdish"
                color="#7668E4"
                value="ku"
              ></v-radio>

              <v-radio
               class="mb-5"
                label="English"
                color="#7668E4"
                value="en"
              ></v-radio>

              <v-radio
               class="mb-5"
                label="Arabic"
                color="#7668E4"
                value="ar"
              ></v-radio>


            </v-radio-group>
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-divider></v-divider>

    <v-list
      subheader
      two-line
    >
      <v-subheader> <v-icon class="mx-1" >mdi-theme-light-dark</v-icon>Change Theme</v-subheader>


      <v-list-item>
        <v-list-item-content class="pa-2">
                        <v-list-item-title v-if="$vuetify.theme.dark">Light Mode</v-list-item-title>
                        <v-list-item-title v-else>Dark Mode</v-list-item-title>
        </v-list-item-content>

        <v-list-item-action>
                          <v-switch hide-details  @click="mode()" v-model="darktheme"></v-switch>
        </v-list-item-action>

      </v-list-item>
    
    </v-list>

<v-divider></v-divider>

    <v-list>
      <v-list-item link to="/about">
         <v-list-item-avatar>
          <v-icon
            style="background:#2C6C70"
            dark
          >mdi-information</v-icon>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>About</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>





  </v-card>



        <appFooter/>
    </div>
</template>

<script>
import appFooter from "../../layouts/client/footer.vue";
    export default {
        components:{appFooter},
        data() {
            return {
                settings: [],
                   darktheme: false,
                       activeLang:'',   
                          icons: [
      {
        img:"facebook.png",
        link: "https://www.facebook.com/yusufothmann/",
      },
      {
        img: "youtube.png",
        link: "https://www.youtube.com/channel/UCdyy5nLZDWUsecoOkvQGNBg",
      },
      {
        img: "instagram.png",
        link: "https://www.instagram.com/accounts/login/?next=/yusfothman/",
      },
      {
        img: "tik-tok.png",
        link: "https://www.tiktok.com/@yusfothman",
      },
       {
        img: "telegram.png",
        link: "https://t.me/yusfothman",
      }
    ],   
            }
        },

        methods:{
                  mode() 
                {
                this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
                this.$store.commit('set_theme',this.darktheme)
                if (this.darktheme) {
                  this.$store.commit('set_body_color','#1E1E2F')
                }else{
                  this.$store.commit('set_body_color','#EEEDF7')
                }
                localStorage.setItem("clientTheme", this.$vuetify.theme.dark.toString());
                },
        changeLang(lang){
        localStorage.removeItem('lang')
        localStorage.setItem('lang',lang)
        this.$store.state.actlang = lang
        window.location.href=''
      },
        },

        mounted(){


if(this.lang()==='en') {
   this.activeLang = "en";
   }

   if(this.lang()==='ku') {
   this.activeLang = "ku";
   }

   if(this.lang()==='ar') {
   this.activeLang = "ar";
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
                } else {
                    this.$vuetify.theme.dark = false;
                    this.darktheme = false;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>