<template>
    <div>
        <!-- <navbar/> -->

        <v-container>
         <v-row class="mt-1">
           <v-btn to="/" flat icon color="primary" >
            <v-icon>mdi-arrow-left</v-icon>
           </v-btn>
         </v-row>
         </v-container>
        
        <v-container>
            <v-row class="d-flex justify-center mt-5">
           <h2>Blogs</h2>
         </v-row>
       </v-container>





<!-- search -->
<v-container>
<v-row aligns="center" ali class="d-flex justify-center mt-10 flex-wrap">

<v-col lg="4" md="4" cols="10">
    <v-text-field
            label="Search"
            filled
            rounded
            dense
            hide-details
            append-icon="mdi-magnify"
            
          ></v-text-field>
</v-col>
<!-- end search -->





</v-row>
</v-container>





<!-- items -->
<v-container class="mt-6 mb-10">


<!-- card items   -->
<v-row class="d-flex justify-center flex-wrap">
    <v-col 
  v-for="(item, index) in blogs" :key="index" 
  cols="10" md="5" lg="4" >
  <router-link to="/view-blog" style="text-decoration: none;" class="color_mode">
  <v-card
  elevation="0"
  height="150"
      style="border-radius:15px;" class="bg_mode" >
     


      <div class="d-flex flex-no-wrap justify-space-between">

        <v-avatar
                class="ma-3"
                size="125"
                tile
              >
                <v-img style="border-radius:10px" :src="item.image"></v-img>
          </v-avatar>

              <div>
                <v-card-title
                style="font-size:16px;"
                class="line-clamp "
                >
                {{ item.title }}
               
              </v-card-title>
              </div>  
            </div>
  </v-card>
</router-link>
</v-col>
</v-row>
<!-- end card items -->

 <v-row class="mb-16">
 </v-row>

<!-- pagination if you need -->


 <!-- <v-row class=" mb-10 d-flex justify-center">
    <v-pagination
      v-model="page"
      :length="4"
      circle
    ></v-pagination>
 </v-row>

 <v-row class="mb-16">
 </v-row> -->

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

</style>