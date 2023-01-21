<template>
    <div>
        
      
      <navbar/>
        
        <!-- slider -->


   
  <v-row  align="center" md="10" class="my-10 d-flex justify-space-around hero-section">
    <v-col  md="3" align="center">
      
          <v-card
    class="mx-auto"
    max-width="400"
    style="background:none !important"
    elevation="0"
    
  >
   
    <v-card-text class="pb-0 text-h5 font-weight-bold text-mode">
      Ramyar Arsalan
    </v-card-text>

    <v-card-text class="pb-0 text-h5 font-weight-bold color-gold">
      Business
    </v-card-text>

    <v-card-text class="pb-0 text-h5 font-weight-bold text-mode">
      Based in Kurdistan
    </v-card-text>


  </v-card>

    </v-col> 

 <v-col md="4" align="center"> 
  <!-- <v-img
    tile
    max-width="400"
    src="../../assets/img/dev.svg"
  ></v-img> -->

    <v-carousel
      :continuous="false"
      :cycle="true"
      :show-arrows="false"
      hide-delimiter-background
      height="370"
      >

      <v-carousel-item><v-img  style="border-radius:20px !important;"  src="../../assets/img/slider1.jpg"></v-img></v-carousel-item>
      <v-carousel-item><v-img style="border-radius:20px !important" src="../../assets/img/slider2.jpg"></v-img></v-carousel-item>
      <v-carousel-item><v-img style="border-radius:20px !important" src="../../assets/img/slider3.jpg"></v-img></v-carousel-item>

    </v-carousel>

 </v-col> 
  </v-row>

      
    
 <v-container class="mt-10 mb-10">

 

<v-row class="d-flex justify-space-between px-4 mb-1">
    <h2 class="color_mode">Blog</h2>

    <router-link to="" class="color-gold"><v-icon class="color-gold">mdi-plus</v-icon> View All</router-link>

 </v-row>   



 <!-- card items   -->
<v-row class="d-flex justify-center flex-wrap">
<v-col 
  v-for="(item, index) in blogs" :key="index" 
  cols="12" sm="12" md="3" lg="4" xl="4">
  <router-link to="/brands" style="text-decoration: none;" class="color_mode">
  <v-card
  elevation="0"
  height="150"
      style="border-radius:15px;background:white" >
     


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
                class="line-clamp black--text"
                >
                {{ item.title }}
               
              </v-card-title>



                <!-- <v-card-actions>
                  <v-btn
                    class="ml-2 mt-3"
                    fab
                    icon
                    height="40px"
                    right
                    width="40px"
                  >
                    <v-icon>mdi-book</v-icon>
                  </v-btn>

                </v-card-actions> -->
              </div>

          
            </div>


     
     

  
      
  </v-card>
</router-link>
</v-col>
</v-row>
<!-- end card items -->




<div class="mt-15"></div>



    <!-- productcategories -->

    <v-row class="d-flex justify-space-between px-4 mb-1">
    <h2 class="color_mode">Experience</h2>
    </v-row> 


   <v-row>
        
        
    <v-slide-group
      v-model="model"
      class="pa-4"
      active-class="success"
      show-arrows
    >
      <v-slide-item
        v-for="item in experience"
        :key="item"

      >
        <v-card
          class="ma-4 bg_mode text-center px-8 py-4"
          style="border-radius:15px"
          height="230"
          width="220"
        >

        <v-img
        class="mx-auto mb-3"
          :src="item.logo"
          width="100"
          height="90"
        ></v-img>

        <!-- <div class="mt-10"></div> -->

      <center> 
         <p>
          {{ item.name }}
        </p>
      </center>   

      
      <v-card-actions>
        <v-btn class="mx-auto" color="primary">Open</v-btn>
      </v-card-actions>
         
        </v-card>
      </v-slide-item>
    </v-slide-group>


     </v-row>




<!-- about -->

<v-row class="d-flex justify-center mb-1 mt-15 ">
    <h2 class="color-gold">{{langkeyword('ABOUT')}}</h2>
 </v-row>   

<v-row dense>
    

        <v-col
          cols="12"
        >

       
            <div class="d-flex flex-wrap justify-space-between align-center" >

                <v-col cols="12" lg="3" md="3" class="text-center">

              
                <v-img class="mx-auto" src="../../assets/img/about.svg"></v-img>
       
            </v-col>

            
                <v-col cols="12" lg="9" md="9">
       
                <v-card-title class="rabar_font white--text" style="font-size:15px;background:#2C6C70;border-radius:15px;">
                    {{lang()==='ku' ? $store.state.setting.ku_about : $store.state.setting.en_about}}
            </v-card-title>             
        </v-col>

    
            </div>
      
        </v-col>
      </v-row>

<!-- end about -->



<!-- address -->

<v-row class="d-flex justify-center mb-3 mt-10 ">
    <h2 class="color-gold">{{langkeyword('ADDRESS')}}</h2>
 </v-row> 
 
 
  <v-row class="d-flex justify-center mb-10 mt-10 ">
    <v-img style="border-radius:15px" src="https://www.geog.leeds.ac.uk/courses/postgrad/web/lectures/googlemaps/intro/images/googlemaps.gif"></v-img>
  </v-row>

 <v-row class="mb-10">
   
 </v-row>
<!-- end address -->

</v-container>


<!-- end product -->

        <appFooter/>
    </div>
</template>

<script>
import navbar from "../../layouts/client/nav.vue";
import appFooter from "../../layouts/client/footer.vue";
// import slider from "../../components/client/slider.vue";
    export default {
        components:{appFooter,navbar},

        data() {
            return {
            cards: [
                { title: 'Pre-fab homes', src: 'https://images.pexels.com/photos/4072041/pexels-photo-4072041.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', flex: 12 },
                { title: 'Favorite road trips', src: 'https://cdn.vuetifyjs.com/images/cards/road.jpg', flex: 6 },
                { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
                { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
                { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
                { title: 'Best airlines', src: 'https://cdn.vuetifyjs.com/images/cards/plane.jpg', flex: 6 },
            ],
                page:1,
                filterby:'Latest',
                filter_item:['Latest','Oldest','Lowest Price','Highest Price','Digital Products','Custom Content'],
             product_setting:[
                  { text: 'View Product', icon: 'mdi-page-next-outline' },
                  { text: 'Edit Product', icon: 'mdi-pencil-outline' },
                  { text: 'Copy link', icon: 'mdi-content-copy' },

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
                ],


                experience:[
                    {
                        name:'SEOClerks',
                        logo:'https://imgs.search.brave.com/hZWaHvSYn9R6z9cWps3_-cqP29jDFZUd4YPwq6rmQ8U/rs:fit:734:634:1/g:ce/aHR0cHM6Ly93d3cu/c2VvY2xlcmsuY29t/L3BpY3MvNjQzMjE5/LTFJZGtUZzE1NDM1/MjA3MDgucG5n'
                    },
                    {
                        name:' Brigantine Oyster',
                        logo:'https://imgs.search.brave.com/4lUI0Kp3BGNOmJHX_IR8gWbY23LuJEKpS8Bv375M5p0/rs:fit:512:512:1/g:ce/aHR0cHM6Ly9pMS53/cC5jb20vYnJpZ2Fu/dGluZW95c3RlcmNv/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAxOC8wOS9jcm9w/cGVkLWJfbG9nby5w/bmc_c3NsPTE'
                    },
                    {
                        name:' Tesla Rester',
                        logo:'https://imgs.search.brave.com/HOz_FhtCyv3QXOfs0TGEbjuZO1u-iBXHN05ftoGDfss/rs:fit:1028:1024:1/g:ce/aHR0cHM6Ly93aWtp/LmltYWwub3JnL3Np/dGVzL2RlZmF1bHQv/ZmlsZXMvdXNlcnMv/dXNlcjYxOC9nYWxs/ZXJ5L3Rlc2xhX2xv/Z29fcG5nMTAxNTgy/ODAyMzkzLnBuZw'
                    },
                    {
                        name:'SEOClerks',
                        logo:'https://imgs.search.brave.com/hZWaHvSYn9R6z9cWps3_-cqP29jDFZUd4YPwq6rmQ8U/rs:fit:734:634:1/g:ce/aHR0cHM6Ly93d3cu/c2VvY2xlcmsuY29t/L3BpY3MvNjQzMjE5/LTFJZGtUZzE1NDM1/MjA3MDgucG5n'
                    },
                    {
                        name:' Brigantine Oyster',
                        logo:'https://imgs.search.brave.com/4lUI0Kp3BGNOmJHX_IR8gWbY23LuJEKpS8Bv375M5p0/rs:fit:512:512:1/g:ce/aHR0cHM6Ly9pMS53/cC5jb20vYnJpZ2Fu/dGluZW95c3RlcmNv/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAxOC8wOS9jcm9w/cGVkLWJfbG9nby5w/bmc_c3NsPTE'
                    },
                    {
                        name:' Tesla Rester',
                        logo:'https://imgs.search.brave.com/HOz_FhtCyv3QXOfs0TGEbjuZO1u-iBXHN05ftoGDfss/rs:fit:1028:1024:1/g:ce/aHR0cHM6Ly93aWtp/LmltYWwub3JnL3Np/dGVzL2RlZmF1bHQv/ZmlsZXMvdXNlcnMv/dXNlcjYxOC9nYWxs/ZXJ5L3Rlc2xhX2xv/Z29fcG5nMTAxNTgy/ODAyMzkzLnBuZw'
                    },
                   
                ],
                slides: [
                    '../../assets/img/slider1.jpg',
                    '../../assets/img/slider2.jpg',
                    '../../assets/img/slider3.jpg',
                ],

          
            }
        },
        computed:{
            productcategories() {
            return this.$store.getters.getproductcategories
           },
           brands() {
            return this.$store.getters.getbrands
           },
           products() {
            return this.$store.getters.getproducts
           }
        
        },
        mounted() {
            
        }
    }
</script>

<style lang="scss" scoped>

</style>