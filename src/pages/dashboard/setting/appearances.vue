<template lang="">
    <div >
        <navbar></navbar>


<v-row class="alert mt-4">
<v-col class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10 mx-auto text-center" v-if="error_msg!=null">
<v-alert
dense
  type="warning"
>{{error_msg}}</v-alert>
</v-col>

<v-col class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10 mx-auto text-center" v-if="success_msg!=null">
<v-alert
dense
  type="success"
>{{success_msg}}</v-alert>
</v-col>
</v-row>

<v-row class="setting pa-4" style="display:flex;justify-content:center" >
            <v-col lg="4"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-4">

                <v-card class="rounded-lg">

                    <v-list subheader three-line    >
                        <v-subheader class="theme-text" v-if="$vuetify.theme.dark">{{langkeyword('LIGHTMODE')}}</v-subheader>
                        <v-subheader class="theme-text" v-else>{{langkeyword('DARKMODE')}}</v-subheader>
                        <v-list-item>
                            <v-list-item-avatar>
                                <v-icon class="purple darken-4" dark>
                                    mdi-theme-light-dark
                                </v-icon>
                            </v-list-item-avatar>

                            <v-list-item-content>
                                <v-list-item-title></v-list-item-title>
                            </v-list-item-content>

                            <v-list-item-action>
                                <v-switch @click="darkmode()" v-model="switchBtn"></v-switch>
                            </v-list-item-action>
                        </v-list-item>

                    </v-list>

                </v-card>
            </v-col>

            <v-col lg="4"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-text-field
                    v-model="englishname"
                    :label="langkeyword('EN_NAME')"
                    required
                    ></v-text-field>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeEnglishName()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

                        <v-col lg="4"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-text-field
                    v-model="kurdishname"
                    :label="langkeyword('KU_NAME')"
                    required
                    ></v-text-field>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeKurdishName()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

            <v-col lg="4"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-text-field
                    v-model="arabicname"
                    :label="langkeyword('AR_NAME')"
                    required
                    ></v-text-field>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeArabicName()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

            <v-col lg="4"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    @submit.prevent="changeLogo"
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-file-input
                    v-model="favicon"
                    id="settingFavicon"
                    name="favicon"
                    required
                    accept="image/png, image/jpeg, image/bmp"
                    prepend-icon="mdi-camera"
                    :label="langkeyword('FAVICON')">
                    </v-file-input>

                    <v-btn
                    :disabled="favicon==null"
                    small
                    type="submit"
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeFavicon()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>


                        <v-col lg="4"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    @submit.prevent="changeLogo"
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-file-input
                    accept="image/png, image/jpeg, image/bmp, image/svg"
                    prepend-icon="mdi-camera"
                    v-model="logo"
                    id="settingLogo"
                    name="logo"
                    required
                    :label="langkeyword('LOGO')">
                    </v-file-input>

                    <v-btn
                    :disabled="logo==null"
                    small
                    type="submit"
                    color="deep-purple"
                    class="m-auto white--text"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

                        <v-col lg="4" cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-select
                    v-model="lang"
                    :items="languages"
                    item-text="name"
                    item-value="value"
:label="langkeyword('LANGUAGE') + '  |'+defaultLangName()">
</v-select>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeLang()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

            <v-col lg="4" cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-text-field
                        :label="langkeyword('EMAIL')"
                        v-model="email"
                        append-icon="mdi-email"
                    ></v-text-field>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeEmail()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>
            <v-col lg="4" cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-text-field
                        v-model="phone"
                        :label="langkeyword('PHONE')"
                        append-icon="mdi-phone"
                    ></v-text-field>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changePhone()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>
            
        </v-row>

        
        <v-row class="setting pa-4 mb-16" style="display:flex;justify-content:center" >
        <v-col lg="6"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-4">
             <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-textarea
                    clearable
                    v-model="englishabout"
                    clear-icon="mdi-close-circle"
                    :label="langkeyword('EN_ABOUT')"
                    ></v-textarea>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeAboutEnglish()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

             <v-col lg="6"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-4">
             <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-textarea
                    clearable
                    v-model="kurdishabout"
                    clear-icon="mdi-close-circle"
                    :label="langkeyword('KU_ABOUT')"
                    ></v-textarea>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeAboutKurdish()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>

             <v-col lg="6"  cols="11" class="col-11 col-sm-6 col-md-6 col-lg-4 col-xl-4">
             <v-card class="px-5 py-5 rounded-lg">
                <v-form
                    ref="form"
                    lazy-validation
                    class="text-center"
                >
                    <v-textarea
                    clearable
                    v-model="arabicabout"
                    clear-icon="mdi-close-circle"
                    :label="langkeyword('AR_ABOUT')"
                    ></v-textarea>

                    <v-btn
                    small
                    color="deep-purple"
                    class="m-auto white--text"
                    @click="changeAboutArabic()"
                    >
                    {{langkeyword('UPDATE')}}
                    </v-btn>

                </v-form>
                </v-card>
            </v-col>
        </v-row>
   

        <dashboardFooter/>
    </div>
</template>

<script>
    import appearancesRequests from '../../../requests/dashboard/settings/Appearances'
    import navbar from '../../../layouts/dashboard/nav.vue'
    import dashboardFooter from '../../../layouts/dashboard/dashboardFooter.vue'

    export default {
        props: ['items'],
        data() {
            return {
                languages:[
                        {name:this.langkeyword('ENGLISH'),value:'en'},
                        {name:this.langkeyword('KURDISH'),value:'ku'},
                        {name:this.langkeyword('ARABIC'),value:'ar'}
                ],
                email:this.$store.state.setting.email,
                phone:this.$store.state.setting.phone,
                kurdishname:this.$store.state.setting.ku_name,
                arabicname:this.$store.state.setting.ar_name,
                englishname:this.$store.state.setting.en_name,
                kurdishabout:this.$store.state.setting.ku_about,
                arabicabout:this.$store.state.setting.ar_about,
                englishabout:this.$store.state.setting.en_about,
                lang:this.$store.state.setting.lang,
                logo:null,
                favicon:null,
                saveColor:localStorage.getItem('bg'),
                switchBtn: false,
                fonts: ['Rabar', 'Rudaw', 'NRT'],
                selectFont: '',
                sfont:'',
                error_msg:null,
                success_msg:null,
                 sidecolor: this.$store.getters.sidebar_color,
                    textcolor: this.$store.getters.navbar_color,
                    swatches: [
                        "#343A40",
                        "#27293d",
                        "#413C69",
                        "#16C79A",
                        "#7579E7",  
                        "#52575D",
                        "#1B6CA8",
                        "#30475E",
                        "#4D80E4",
                        "#F35588",
                        "#865858",
                    ]
            }
        },
        components: {
            navbar,dashboardFooter
        },
        methods: {
          cleanMessages(){
    setTimeout(() => {
      this.success_msg=null
      this.error_msg=null
    }, 3000);
          },

changeKurdishName(){
appearancesRequests.changeKurdishName({changeNameKurdish:true,kurdishname:this.kurdishname},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
}, 
changeEnglishName(){
appearancesRequests.changeEnglishName({changeNameEnglish:true,englishname:this.englishname}
,(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})

},
changeArabicName(){
appearancesRequests.changeArabicName({changeNameArabic:true,arabicname:this.arabicname},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
},
changeLang(){
appearancesRequests.changeLang({changeLang:true,lang:this.lang},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
},
changeEmail(){
appearancesRequests.changeEmail({changeEmail:true,email:this.email},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
},
changePhone(){
appearancesRequests.changePhone({changePhone:true,phone:this.phone},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
},
changeAboutKurdish(){
appearancesRequests.changeAboutKurdish({changeAboutKurdish:true,kurdishabout:this.kurdishabout},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})

},
changeAboutArabic(){
appearancesRequests.changeAboutArabic({changeAboutArabic:true,arabicabout:this.arabicabout},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
},
changeAboutEnglish(){
appearancesRequests.changeAboutEnglish({changeAboutEnglish:true,englishabout:this.englishabout},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.setting =res.data.data
}
this.cleanMessages()
})
},
changeLogo(){
const filename = document.getElementById('settingLogo').files[0]
const logoParams = new FormData();
logoParams.append('changeLogo',true)
logoParams.append('logo',filename)
const config = {
headers: {
'content-type': `multipart/form-data; boundary=${logoParams._boundary}`,
}
}
appearancesRequests.changeLogo(logoParams,config,(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
document.getElementById('settingLogo').value = null
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.dashboardauth =res.data.data
this.logo=null
}
this.cleanMessages()
})
},
changeFavicon(){
const filename = document.getElementById('settingFavicon').files[0]
const faviconParams = new FormData();
faviconParams.append('changeFavicon',true)
faviconParams.append('favicon',filename)
const config = {
headers: {
'content-type': `multipart/form-data; boundary=${faviconParams._boundary}`,
}
}
appearancesRequests.changeFavicon(faviconParams,config,(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
document.getElementById('settingLogo').value = null
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.dashboardauth =res.data.data
this.favicon=null
}
this.cleanMessages()
})
},
defaultLangName(){
if(this.lang==='ku'){
return this.langkeyword('KURDISH')
}
else if(this.lang==='ar'){
return this.langkeyword('ARABIC')
}
else if(this.lang==='en'){
return this.langkeyword('ENGLISH')
}
},

    darkmode() {
                this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
                localStorage.setItem("dashboardTheme", this.$vuetify.theme.dark.toString());
            }
        },
        mounted() {
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
    
    
    }
</script>

<style>

.setting{
    margin-top: 50px !important;
}

.theme--dark .dashboard .v-list{
background: var(--another)  !important;
}

.vue-swatches__trigger{
    border: 1px solid white !important;
}


</style>



