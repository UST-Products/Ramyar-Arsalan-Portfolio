<template>
    <div>
        <navbar />

        <v-container class="my-8">

            <div>

                <v-row class="d-flex justify-center mb-4">
                    <v-col cols="" md="">
<v-img width="140" height="140" class="mx-auto radius-circle" 
:src="uploadPath('/dashboard/users/'+this.$store.state.dashboardauth.avatar)">
</v-img>
                    </v-col>
                </v-row>

                <v-row class="my-2">
                    <v-col cols="" md="" class="d-flex justify-center">
                        <v-icon>mdi-account</v-icon>
                        <h3 class="mx-3">{{ this.$store.state.dashboardauth.name}}</h3>
                    </v-col>
                </v-row>

                <v-row>
                    <v-col cols="" md="" class="d-flex justify-center">
                        <v-icon>mdi-email</v-icon>
                        <h4 class="mx-3">{{this.$store.state.dashboardauth.email}}</h4>
                    </v-col>
                </v-row>

                <v-row class="my-8 rabar-font">
                    <v-col cols="12" md="" class="d-flex justify-center flex-wrap">
                        <div class="mx-16">
                            <p>{{langkeyword('ROLE')}} : 
{{
this.$store.state.dashboardauth.role==='developer' ? langkeyword('DEVELOPER') : '' || 
this.$store.state.dashboardauth.role==='admin' ? langkeyword('ADMIN') : '' || 
this.$store.state.dashboardauth.role==='moderator' ? langkeyword('MODERATOR') : '' || 
this.$store.state.dashboardauth.role==='writer' ? langkeyword('WRITER') : ''
}} </p>
                        </div>

                    </v-col>
                </v-row>




<v-row class="alert">
<v-col class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10 m-auto text-center mx-auto" v-if="error_msg!=null">
<v-alert
dense
  type="warning"
>{{error_msg}}</v-alert>
</v-col>

<v-col class="col-11 col-sm-11 col-md-10 col-lg-10 col-xl-10 m-auto text-center mx-auto" v-if="success_msg!=null">
<v-alert
dense
  type="success"
>{{success_msg}}</v-alert>
</v-col>
</v-row>


 <v-row style="display:flex;justify-content:center">
   

<v-col class="col-11 col-sm-10 col-md-6 col-lg-4 col-xl-6 m-auto text-center">
<v-card class="px-5 py-5 rounded-lg">
  <v-form
    ref="form"
    lazy-validation
    class="text-center"
  >
    <v-text-field
      v-model="name"
      :label="langkeyword('NAME')"
      required
    ></v-text-field>

    <v-btn
    small
      color="deep-purple"
      class="m-auto white--text"
      @click="changeName()"
    >
      {{langkeyword('CHANGE_NAME')}}
    </v-btn>

  </v-form>
</v-card>
</v-col>


<v-col class="col-11 col-sm-10 col-md-6 col-lg-4 col-xl-6 m-auto text-center">
<v-card class="px-5 py-5 rounded-lg">
  <v-form
    ref="form"
    lazy-validation
    class="text-center"
  >
    <v-text-field
      v-model="email"
      :label="langkeyword('EMAIL')"
      required
    ></v-text-field>

    <v-btn
    small
      color="deep-purple"
      class="m-auto white--text"
      @click="changeEmail()"
    >
      {{langkeyword('CHANGE_EMAIL')}}
    </v-btn>

  </v-form>
</v-card>
</v-col>


<v-col class="col-11 col-sm-10 col-md-6 col-lg-4 col-xl-6 m-auto text-center">
<v-card class="px-5 py-5 rounded-lg">
  <v-form
   @submit.prevent="changeAvatar"
    ref="form"
    lazy-validation
    class="text-center"
  >
    <v-file-input
      v-model="avatar"
      id="profileAvatar"
      name="avatar"
      :label="langkeyword('AVATAR')"
      required
      prepend-icon="mdi-camera"
    ></v-file-input>

    <v-btn
    :disabled="avatar==null"
    small
    type="submit"
      color="deep-purple"
      class="m-auto white--text"
    >
       {{langkeyword('CHANGE_AVATAR')}}
    </v-btn>

  </v-form>
</v-card>
</v-col>



<v-col class="col-11 col-sm-10 col-md-6 col-lg-6 col-xl-6 m-auto text-center">
<v-card class="px-5 py-5 rounded-lg">
  <v-form
    ref="form"
    lazy-validation
    class="text-center"
  >
    <v-text-field
      v-model="oldpassword"
      :label="langkeyword('OLDPASSWORD')"
      required
    ></v-text-field>

    <v-text-field
      v-model="newpassword"
      :label="langkeyword('NEWPASSWORD')"
      required
    ></v-text-field>
    <v-btn
    small
      color="deep-purple"
      class="m-auto white--text"
      @click="changePassword()"
    >
      {{langkeyword('CHANGE_PASSWORD')}}
    </v-btn>

  </v-form>
</v-card>
</v-col>

</v-row>

            </div>
        </v-container>


    </div>
</template>


<script>
    import navbar from '../../layouts/dashboard/nav.vue'
    import profileRequests from '../../requests/dashboard/Profile'
    export default {
        data() {
            return {
                imgpath : '../../../api/server/uploads/users/624a509c1de136.44071212.png',
                imgChange:null,
                edit_dialog: false,
                error_msg:null,
                avatar:null,
                success_msg:null,
                show: false,
                oldpassword:null,
                newpassword:null,
                user_id:localStorage.getItem('dashboardauthId'),
                name:this.$store.state.dashboardauth.name,
                email:this.$store.state.dashboardauth.email,
                defaultButtonText: 'وێنە بگۆڕە',
                selectedFile: null,
                isSelecting: false,
                icon: 'mdi-cloud-upload',
                url: ''
            }
        },
        components: {
            navbar
        },
        computed: {
            buttonText() {
                return this.selectedFile ? this.selectedFile.name : this.defaultButtonText
            },
            
        },

        methods: {
          cleanMessages(){
    setTimeout(() => {
      this.success_msg=null
      this.error_msg=null
    }, 3000);
          },
            changeEmail(){
if(this.email!=null){
    profileRequests.changeEmail({
    changeEmail:true,
    user_id:this.user_id,
    newemail:this.email,
  },(res)=>{
    if (res.data.status===false){
     this.error_msg = this.langkeyword(res.data.msg)
    }
    else if (res.data.status===true) {
    this.error_msg = null
    this.success_msg = this.langkeyword(res.data.msg)
    this.$store.state.dashboardauth =res.data.data
    }
  })
}
else {
this.error_msg = this.langkeyword('DATA_REQUIRED')
}
this.cleanMessages()
            },
            changeName(){
if(this.name){
    profileRequests.changeName({
    changeName:true,
    user_id:this.user_id,
    newname:this.name,
  },(res)=>{
    if (res.data.status===false){
     this.error_msg = this.langkeyword(res.data.msg)
    }
    else if (res.data.status===true) {
    this.error_msg = null
    this.success_msg = this.langkeyword(res.data.msg)
    this.$store.state.dashboardauth =res.data.data
    }
  })
}
else {
this.error_msg = this.langkeyword('DATA_REQUIRED')
}
this.cleanMessages()
},
            changePassword(){
if(this.oldpassword!=null && this.newpassword!=null){
    profileRequests.changePassword({
    changePassword:true,
    user_id:this.user_id,
    oldpassword:this.oldpassword, 
    newpassword:this.newpassword,
  },(res)=>{
    if (res.data.status===false){
     this.error_msg = this.langkeyword(res.data.msg)
    }
    else if (res.data.status===true) {
    this.oldpassword = null
    this.newpassword = null
    this.error_msg = null
    this.success_msg = this.langkeyword(res.data.msg)
    this.$store.state.dashboardauth =res.data.data
    localStorage.removeItem('dashboardauth-username');
    localStorage.removeItem('dashboardauth-password');
    }
  })
}
else {
this.error_msg = this.langkeyword('DATA_REQUIRED')
}
this.cleanMessages()
            },

            changeAvatar(){
const filename = document.getElementById('profileAvatar').files[0];
const avatarParams = new FormData();
avatarParams.append('changeAvatar',true)
avatarParams.append('user_id',this.user_id)
avatarParams.append('avatar',filename)
const config = {
  headers: {
        'content-type': `multipart/form-data; boundary=${avatarParams._boundary}`,
        }
}
profileRequests.changeAvatar(avatarParams,config,(res)=>{
if (res.data.status===false){
 this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
document.getElementById('profileAvatar').value = null
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.dashboardauth =res.data.data
}
this.cleanMessages()
 })
            },
            onButtonClick() {
                this.isSelecting = true
                window.addEventListener('focus', () => {
                    this.isSelecting = false
                }, {
                    once: true
                })

                this.$refs.uploader.click()
            },
            onFileChanged(e) {

                this.selectedFile = e.target.files[0]
                // let file = e.target.files[0]
                // this.imgChange.src = URL.createObjectURL(file);

                // do something
            },
            update_profile(){
                // code in here
                this.edit_dialog=false
            }
        }
    }
</script>
<style>
    .image-file::file-selector-button {
        background: black !important;
        padding: 20px;
        visibility: hidden;
        border: none !important;
        content-visibility: hidden;
    }
</style>