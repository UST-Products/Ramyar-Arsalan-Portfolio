<template>
    <div class="anotherpageremovepadding">
        <!-- <navbar/> -->

        <v-container class="d-flex justify-space-between">

           <v-btn v-if="lang()=='en'" to="/" flat icon color="primary" >
            <v-icon>mdi-arrow-left</v-icon>
           </v-btn>
           <v-btn v-else to="/" flat icon color="primary" >
            <v-icon>mdi-arrow-right</v-icon>
           </v-btn>

    
        


           <v-menu
            bottom
            left
          >
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                dark
                icon
                v-bind="attrs"
                v-on="on"
              >
                <v-icon class="color-main">mdi-share-variant</v-icon>
              </v-btn>
            </template>

 

            <ShareNetwork
                v-for="network in networks"
                :network="network.network"
                :key="network.network"
        
                style="text-decoration: none;"
                :url="sharing.url"
                :title="sharing.title"
                :description="sharing.description"
                :quote="sharing.quote"
                :hashtags="sharing.hashtags"
                :twitterUser="sharing.twitterUser"
            >
            <v-list>
              <v-list-item link>
               
                    <v-list-item-icon>
                        <v-icon>{{network.icon}}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>{{ network.name }}</v-list-item-title>
                    </v-list-item-content>

            </v-list-item>
            </v-list>

            </ShareNetwork>

  
          </v-menu>
 
         </v-container>


         
        
        <v-container>
            <v-row class="d-flex justify-center  pa-5 ">
           <h2>A powerful guidance for starting a new business | Meet with more business people here A powerful guidance for starting a new business | Meet with more business people here</h2>
         </v-row>
       </v-container>





<!-- search -->
<v-container>
<v-row aligns="center" ali class="d-flex justify-center  pa-5">

    <v-img
         class="rounded-lg"
      src="https://imgs.search.brave.com/nHI5FYRVTywO0xREG-sAwUb25l6Zp647bxSBE46TdV8/rs:fit:1200:1101:1/g:ce/aHR0cHM6Ly9lY2Nl/Y29uZmVyZW5jZXMu/b3JnL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDE3LzExL2J1c2lu/ZXNzLWNvbnN1bHRp/bmcyLmpwZw"
    ></v-img>

</v-row>
</v-container>


        
<v-container>
            <v-row class="d-flex justify-center  pa-5 ">
           <p style="font-size: 16px;" class="text-justify">
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
           </p>
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
                page:1,
                filterby:'New Creators',
                filter_item:['1','5','10','15'],
                filter_type:['Category 1','Category 2','Category 3','Category 4','Category5','Category 6','Category 7','Category 8','Category 9','Category 10','Category 11'],
                dialog: false,
                notifications: false,
                sound: true,
                widgets: false,
                category: [],
                brands: [],
                sharing: {
        url: 'https://news.vuejs.org/issues/180',
        title: 'Say hi to Vite! A brand new, extremely fast development setup for Vue.',
        description: 'This week, I???d like to introduce you to "Vite", which means "Fast". It???s a brand new development setup created by Evan You.',
        quote: 'The hot reload is so fast it\'s near instant. - Evan You',
        hashtags: 'vuejs,vite,javascript',
        twitterUser: 'youyuxi'
      },
                networks: [
        { network: 'email', name: 'Email', icon: 'mdi-email', color: '#333333' },
        { network: 'facebook', name: 'Facebook', icon: 'mdi-facebook', color: '#1877f2' },
        { network: 'messenger', name: 'Messenger', icon: 'mdi-facebook-messenger', color: '#0084ff' },
        { network: 'linkedin', name: 'LinkedIn', icon: 'mdi-linkedin', color: '#007bb5' },
        { network: 'telegram', name: 'Telegram', icon: 'mdi-send-circle', color: '#0088cc' },
        { network: 'viber', name: 'Viber', icon: 'mdi-phone-in-talk', color: '#59267c' },
        { network: 'whatsapp', name: 'Whatsapp', icon: 'mdi-whatsapp', color: '#25d366' },
        { network: 'twitter', name: 'Twitter', icon: 'mdi-twitter', color: '#1da1f2' },
   
      ],
                blogs:[
                    {
                        title:'Business Models: 8 Types of Business Models (Plus Examples) | The Blueprint',
                        image:'https://imgs.search.brave.com/e6o2-t4BlXK28CWCEmhQqr7DGPz-4jvN39X5sPLvoeQ/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9tLmZv/b2xjZG4uY29tL21l/ZGlhL3RoZS1ibHVl/cHJpbnQvaW1hZ2Vz/L0dldHR5SW1hZ2Vz/LTExNDc0Njk0MzEu/b3JpZ2luYWwuanBn'
                    },
                    {
                        title:'A powerful guidance for starting a new business | Meet with more business people here',
                        image:'https://imgs.search.brave.com/nHI5FYRVTywO0xREG-sAwUb25l6Zp647bxSBE46TdV8/rs:fit:1200:1101:1/g:ce/aHR0cHM6Ly9lY2Nl/Y29uZmVyZW5jZXMu/b3JnL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDE3LzExL2J1c2lu/ZXNzLWNvbnN1bHRp/bmcyLmpwZw'
                    },
                    {
                        title:'Shared Services and Business Analytics - ScottMadden jhajsh jhajshja jhajshaj jakshajsh sdsdsd mksdks kskdsd',
                        image:'https://imgs.search.brave.com/ioA0BMNYcdTTPnEF2JAbtqQsDf2-XIz8IUs7y2KB9OE/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93d3cu/c2NvdHRtYWRkZW4u/Y29tL2NvbnRlbnQv/dXBsb2Fkcy8yMDE5/LzA4L2xpbmtlZGlu/LUluLVN0cmVhbV9X/aWRlX19fUGVvcGxl/LU1lZXRpbmctQWRv/YmVTdG9ja182Njcy/ODYxMi5qcGVn'
                    },
                    {
                        title:'Business Models: 8 Types of Business Models (Plus Examples) | The Blueprint',
                        image:'https://imgs.search.brave.com/e6o2-t4BlXK28CWCEmhQqr7DGPz-4jvN39X5sPLvoeQ/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9tLmZv/b2xjZG4uY29tL21l/ZGlhL3RoZS1ibHVl/cHJpbnQvaW1hZ2Vz/L0dldHR5SW1hZ2Vz/LTExNDc0Njk0MzEu/b3JpZ2luYWwuanBn'
                    },
                    {
                        title:'A powerful guidance for starting a new business | Meet with more business people here',
                        image:'https://imgs.search.brave.com/nHI5FYRVTywO0xREG-sAwUb25l6Zp647bxSBE46TdV8/rs:fit:1200:1101:1/g:ce/aHR0cHM6Ly9lY2Nl/Y29uZmVyZW5jZXMu/b3JnL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDE3LzExL2J1c2lu/ZXNzLWNvbnN1bHRp/bmcyLmpwZw'
                    },
                    {
                        title:'Shared Services and Business Analytics - ScottMadden jhajsh jhajshja jhajshaj jakshajsh sdsdsd mksdks kskdsd',
                        image:'https://imgs.search.brave.com/ioA0BMNYcdTTPnEF2JAbtqQsDf2-XIz8IUs7y2KB9OE/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93d3cu/c2NvdHRtYWRkZW4u/Y29tL2NvbnRlbnQv/dXBsb2Fkcy8yMDE5/LzA4L2xpbmtlZGlu/LUluLVN0cmVhbV9X/aWRlX19fUGVvcGxl/LU1lZXRpbmctQWRv/YmVTdG9ja182Njcy/ODYxMi5qcGVn'
                    },
                    {
                        title:'Business Models: 8 Types of Business Models (Plus Examples) | The Blueprint',
                        image:'https://imgs.search.brave.com/e6o2-t4BlXK28CWCEmhQqr7DGPz-4jvN39X5sPLvoeQ/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9tLmZv/b2xjZG4uY29tL21l/ZGlhL3RoZS1ibHVl/cHJpbnQvaW1hZ2Vz/L0dldHR5SW1hZ2Vz/LTExNDc0Njk0MzEu/b3JpZ2luYWwuanBn'
                    },
                    {
                        title:'A powerful guidance for starting a new business | Meet with more business people here',
                        image:'https://imgs.search.brave.com/nHI5FYRVTywO0xREG-sAwUb25l6Zp647bxSBE46TdV8/rs:fit:1200:1101:1/g:ce/aHR0cHM6Ly9lY2Nl/Y29uZmVyZW5jZXMu/b3JnL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDE3LzExL2J1c2lu/ZXNzLWNvbnN1bHRp/bmcyLmpwZw'
                    },
                    {
                        title:'Shared Services and Business Analytics - ScottMadden jhajsh jhajshja jhajshaj jakshajsh sdsdsd mksdks kskdsd',
                        image:'https://imgs.search.brave.com/ioA0BMNYcdTTPnEF2JAbtqQsDf2-XIz8IUs7y2KB9OE/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93d3cu/c2NvdHRtYWRkZW4u/Y29tL2NvbnRlbnQv/dXBsb2Fkcy8yMDE5/LzA4L2xpbmtlZGlu/LUluLVN0cmVhbV9X/aWRlX19fUGVvcGxl/LU1lZXRpbmctQWRv/YmVTdG9ja182Njcy/ODYxMi5qcGVn'
                    },
                    {
                        title:'Business Models: 8 Types of Business Models (Plus Examples) | The Blueprint',
                        image:'https://imgs.search.brave.com/e6o2-t4BlXK28CWCEmhQqr7DGPz-4jvN39X5sPLvoeQ/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9tLmZv/b2xjZG4uY29tL21l/ZGlhL3RoZS1ibHVl/cHJpbnQvaW1hZ2Vz/L0dldHR5SW1hZ2Vz/LTExNDc0Njk0MzEu/b3JpZ2luYWwuanBn'
                    },
                    {
                        title:'A powerful guidance for starting a new business | Meet with more business people here',
                        image:'https://imgs.search.brave.com/nHI5FYRVTywO0xREG-sAwUb25l6Zp647bxSBE46TdV8/rs:fit:1200:1101:1/g:ce/aHR0cHM6Ly9lY2Nl/Y29uZmVyZW5jZXMu/b3JnL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDE3LzExL2J1c2lu/ZXNzLWNvbnN1bHRp/bmcyLmpwZw'
                    },
                    {
                        title:'Shared Services and Business Analytics - ScottMadden jhajsh jhajshja jhajshaj jakshajsh sdsdsd mksdks kskdsd',
                        image:'https://imgs.search.brave.com/ioA0BMNYcdTTPnEF2JAbtqQsDf2-XIz8IUs7y2KB9OE/rs:fit:1200:1080:1/g:ce/aHR0cHM6Ly93d3cu/c2NvdHRtYWRkZW4u/Y29tL2NvbnRlbnQv/dXBsb2Fkcy8yMDE5/LzA4L2xpbmtlZGlu/LUluLVN0cmVhbV9X/aWRlX19fUGVvcGxl/LU1lZXRpbmctQWRv/YmVTdG9ja182Njcy/ODYxMi5qcGVn'
                    },
                ],
           }
        },

        methods:{
          // add_filter(index){
          //   this.amenities.push(index);
          // }
        }
        ,
        mounted() {
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
.v-main{
    padding: 20px 0px 0px !important;
}
</style>