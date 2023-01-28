<template>
    <div>
        
      
      <navbar/>
        
        <!-- slider -->


<v-container style="transform: translate(0px, -100px);"> 
  <v-row  align="center" md="10" class=" d-flex justify-space-around hero-section">
    <v-col  md="7" lg="7">
      
          <v-card


    style="background:none !important"
    elevation="0"
    
  >
   
    <v-card-text class="pb-0 text-h4 font-weight-bold text-mode" style="font-family: rabar !important">
      {{langkeyword('RAMYAR_NAME')}}
    </v-card-text>

    <v-card-text class="pb-0 text-h4 font-weight-bold color-gold"  style="font-family: rabar !important">
      Business
    </v-card-text>

    <v-card-text class="pb-0 text-h4 font-weight-bold text-mode"  style="font-family: rabar !important">
      {{langkeyword('BASED_IN')}}
    </v-card-text>

    <v-card-text class="pb-0 text-h6 font-weight-bold text-mode"  style="font-family: rabar !important">
      <v-icon>mdi-map-marker</v-icon> <span> {{langkeyword('IRAQ')}}</span>
    </v-card-text>


  </v-card>

    </v-col> 

 <v-col md="5" lg="5" align="center"> 
  <!-- <v-img
    tile
    max-width="400"
    src="../../assets/img/dev.svg"
  ></v-img> -->

    <v-carousel
      :continuous="true"
      :cycle="true"
      :show-arrows="false"
      hide-delimiter-background
      height="370"
      >

      <v-carousel-item><v-img  style="border-radius:20px !important;"  src="../../assets/img/slider1.jpg"></v-img></v-carousel-item>
      <!-- <v-carousel-item><v-img  style="object-fit:fill; border-radius:20px !important" src="../../assets/img/slider2.jpg"></v-img></v-carousel-item> -->
      <v-carousel-item><v-img style="border-radius:20px !important" src="../../assets/img/slider3.jpg"></v-img></v-carousel-item>

    </v-carousel>

 </v-col> 
  </v-row>
</v-container>
      
    
 <v-container class="mt-10 mb-10">

 

<v-row class="d-flex justify-space-between px-4 mb-1">
    <h2 class="color_mode"> {{langkeyword('BLOG')}}</h2>

    <router-link style="text-decoration: none;" to="/blogs" class="color-gold"> {{langkeyword('VIEW_ALL')}}</router-link>

 </v-row>   



 <!-- card items   -->
<v-row class="d-flex justify-center flex-wrap">
<v-col 
  v-for="(item, index) in blogs" :key="index" 
  cols="10" md="5" lg="4">
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




 <v-row id="exp">
   <v-col cols="" md=""></v-col>
 </v-row>




    <v-row class="d-flex justify-space-between px-4 mb-1 mt-16">
    <h2 class="color_mode"> {{langkeyword('EXPERIENCE')}}</h2>
    </v-row> 


   <v-row>
        
        
    <v-slide-group
      v-model="model"
      active-class="success"
    
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
        <v-btn to="/open-company" class="mx-auto rounded-lg black--text text-capitalize" block color="#EDA800" > {{langkeyword('OPEN')}}</v-btn>
      </v-card-actions>
         
        </v-card>
      </v-slide-item>
    </v-slide-group>


     </v-row>



     <v-row id="about">
   <v-col cols="" md=""></v-col>
 </v-row>

     <v-row class="d-flex justify-space-between px-4 mb-1 mt-16">
    <h2 class="color_mode"> {{langkeyword('ABOUTME')}}</h2>
    </v-row> 

    <v-row class="d-flex justify-space-between  mb-1 ">
      <v-col cols="12" lg="6" md="6">
           <v-row class="d-flex flex-wrap">
     
              <v-col cols="6" lg="6" md="6">
                <v-img
                class="mx-auto mb-3 rounded-lg"
                height="300"
                  src="../../assets/img/about1.jpg"
                ></v-img>
                <v-img
                class="mx-auto mb-3 rounded-lg"
                  height="260"
                  src="../../assets/img/about2.jpg"
                ></v-img>
                
              </v-col>

              <v-col cols="6" lg="6" md="6">

                <v-img
                class="mx-auto mb-3 rounded-lg"
                  src="../../assets/img/about4.jpg"
                ></v-img>


                <v-img
                class="mx-auto mb-3 rounded-lg"
                height="325"
                  src="../../assets/img/about3.jpg"
                ></v-img>


              </v-col>

  
     
         
     


  
           </v-row>
      </v-col>

      <v-col cols="12" lg="6" md="6">
        <v-expansion-panels accordion v-model="panel" class=" ">
              <v-expansion-panel class="bg_mode" >
                <v-expansion-panel-header style="font-size:20px"> {{langkeyword('GENERALLY')}}</v-expansion-panel-header>
                <v-expansion-panel-content style="font-size:16px">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel class="bg_mode">
                <v-expansion-panel-header style="font-size:20px"> {{langkeyword('PERSONALLITY')}}</v-expansion-panel-header>
                <v-expansion-panel-content style="font-size:16px">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel class="bg_mode">
                <v-expansion-panel-header style="font-size:20px"> {{langkeyword('PRODUCTS')}}</v-expansion-panel-header>
                <v-expansion-panel-content style="font-size:16px">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel class="bg_mode">
                <v-expansion-panel-header style="font-size:20px"> {{langkeyword('THE_CUSTOMERS')}}</v-expansion-panel-header>
                <v-expansion-panel-content style="font-size:16px">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </v-expansion-panel-content>
              </v-expansion-panel>


        </v-expansion-panels>
      </v-col>

    </v-row> 



     <v-row class="mt-16 pa-3">
       <v-card width="100%" class="bg_mode rounded-lg">
          <v-card-title class="text-h6 text-center d-flex justify-center" style="font-family:rabar !important">
            {{langkeyword('OWNER_SHIP')}}
          </v-card-title>
          <v-divider></v-divider>
          <v-card-actions class="background-navbar d-flex justify-center pa-3">
             <v-row class="d-flex justify-center">

                <v-list style="background:transparent !important">
                  <v-list-item>
                    <v-list-item-avatar>
                      <v-img
                        src="https://imgs.search.brave.com/rYoPelsfyW9ev18-EKOHksgjr0RenPMAg99FivrMLKs/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9jZG4u/ZnJlZWJpZXN1cHBs/eS5jb20vbG9nb3Mv/bGFyZ2UvMngvbW9u/ZXJvLWxvZ28tcG5n/LXRyYW5zcGFyZW50/LnBuZw"
                      ></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title >Company Name</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>

                <v-list style="background:transparent !important">
                  <v-list-item>
                    <v-list-item-avatar>
                      <v-img
                        src="https://imgs.search.brave.com/rYoPelsfyW9ev18-EKOHksgjr0RenPMAg99FivrMLKs/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly9jZG4u/ZnJlZWJpZXN1cHBs/eS5jb20vbG9nb3Mv/bGFyZ2UvMngvbW9u/ZXJvLWxvZ28tcG5n/LXRyYW5zcGFyZW50/LnBuZw"
                      ></v-img>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title >Company Name</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>

             </v-row>
          </v-card-actions>
       </v-card>
     </v-row>


     <v-row id="contact">
   <v-col cols="" md=""></v-col>
 </v-row>


     <!-- contact -->

     <v-row class="d-flex justify-space-between px-4 mb-1 mt-16">
    <h2 class="color_mode"> {{langkeyword('CONTACT')}}</h2>
    </v-row> 


   <v-row class="d-flex justify-center">
    <v-col cols="12" md="5" lg="5">

        
     <v-row class="d-flex justify-space-between px-4 ">
      <v-list style="background:transparent !important">
                  <v-list-item>
                    <v-list-item-avatar>
                      <v-icon
                          
                          class="bg_mode"
                        >
                          mdi-email
                        </v-icon>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title >Example@Example.com</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
    </v-row> 


    <v-row class="d-flex justify-space-between px-4">
      <v-list style="background:transparent !important">
                  <v-list-item>
                    <v-list-item-avatar>
                      <v-icon
                          class="bg_mode"
                        >
                         mdi-phone
                        </v-icon>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title >+964 (0) 0770 111 22 33</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
    </v-row> 


    </v-col>


<v-col cols="11" lg="7" md="7" class="bg_mode pa-8 rounded-lg">


   <v-row >
     <v-col
       cols="12"
       sm="6" 
       
     >


       <v-text-field
       outlined
         :label="this.langkeyword('NAME_CONTACT')"
         required
       ></v-text-field>
     </v-col>
     <v-col
       cols="12"
       sm="6"
     >
       <v-text-field
       outlined
       :label="this.langkeyword('EMAIL_CONTACT')"
         required
       ></v-text-field>
     </v-col>
  

     <v-col cols="12">
       <v-textarea
       outlined
       >
         <template v-slot:label>
           <div>
             {{  langkeyword('BODY_CONTACT')}}
           </div>
         </template>
       </v-textarea>
     </v-col>


  


       <v-col cols="12">
           <v-btn block color="primary">
            {{  langkeyword('SEND')}}
               <v-icon class="mx-1">mdi mdi-send</v-icon>
               
           </v-btn>
       </v-col>


   </v-row>

   </v-col>

   </v-row>  





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
                panel:0,
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
                aboutme_images: [
                    '../../assets/img/about1.jpg',
                    '../../assets/img/about2.jpg',
                    '../../assets/img/about3.jpg',
                    '../../assets/img/about4.jpg',
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