<template>
  <div>
    <navbar></navbar>
    <v-container class="mt-4 mb-4">

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

 
      <v-row class="d-flex text--purple justify-center">
        <v-col cols="11">
          <v-data-table
            :headers="headers"
            :items="users"
            :loading="$store.state.users==null || $store.state.users=='' || $store.state.users==undefined ? true : false"
            :search="search"
            sort-by="name"
            class="elevation-1 rabar-font radius-15"
            :footer-props="{
            showFirstLastPage: true,
            prevIcon: 'mdi-arrow-left',
            nextIcon: 'mdi-arrow-right',
           'items-per-page-text':langkeyword('PERPAGE'), 
           'items-per-page-options':perPages()
          }"
          :items-per-page="10"
          >
            <template v-slot:top>
              <v-toolbar flat>
                <v-toolbar-title><v-icon>mdi-account-group</v-icon> {{langkeyword('USERS')}}</v-toolbar-title>
          <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px" persistent>
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                      color="success"
                      style="color: whitefloat:right"
                      class="mb-2 radius-5 rabar-font"
                      v-bind="attrs"
                      v-on="on"
                    >
                          <v-icon>
                          mdi-plus-circle
                          </v-icon>
                      {{langkeyword('ADD')}}
                    </v-btn>
                  </template>
                  <v-card class="radius-15 bg-mode">
                    <v-card-title>
<span class="rabar-font" v-if="isAdd()===true"><v-icon> mdi-plus-circle</v-icon> {{langkeyword("ADD")}}</span>
<span class="rabar-font" v-if="isEdit()===true"><v-icon> mdi-pencil-circle</v-icon> {{langkeyword("UPDATE")}}</span>
<span class="rabar-font" v-if="isLock()===true"><v-icon> mdi-lock</v-icon> {{langkeyword('CHANGE')}}</span>
                    </v-card-title>
                    <v-card-text class="radius-15">
                      <v-container>
                        <v-form>
                          <v-text-field v-if="isAdd()===true || isEdit()===true"
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="usersObject.name"
                            :label="langkeyword('NAME')"
                          >
                          </v-text-field>
                          <v-text-field v-if="isAdd()===true || isEdit()===true"
                            class="rabar-font"
                            append-icon="mdi-email"
                            v-model="usersObject.email"
                            :label="langkeyword('EMAIL')"
                          >
                          </v-text-field>
                          <v-text-field v-if="isEdit()===false && isLock()===false"
                            class="rabar-font"
                            append-icon="mdi-lock"
                            v-model="usersObject.password"
                            :label="langkeyword('PASSWORD')"
                          >
                          </v-text-field>
                          <v-text-field v-if="isLock()===true"
                            class="rabar-font"
                            append-icon="mdi-lock"
                            v-model="usersObject.newpassword"
                            :label="langkeyword('NEWPASSWORD')"
                          >
                          </v-text-field>
                          <v-select v-if="isAdd()===true || isEdit()===true"
                            append-icon="mdi-shield-crown"
                            v-model="usersObject.role"
                            :items="roles"
                            item-text="name"
                            item-value="value"
                            :label="langkeyword('ROLE')"
                            dense
                          ></v-select>
                        </v-form>
                      </v-container>
                    </v-card-text>
                    <v-card-actions>
                      <v-btn color="green darken-1" v-if="isAdd()===true" dark @click="saveUsers">
                        <v-icon dark> mdi-plus-circle</v-icon>
                        {{langkeyword('SAVE')}}
                      </v-btn>
                      <v-btn 
                       color="orange darken-1" v-if="isEdit()===true" 
                       dark @click="updateUsers(usersObject.id)"
                       >
                       <v-icon dark> mdi-pencil-circle</v-icon>
                        {{langkeyword('UPDATE')}}
                      </v-btn>
                      <v-btn 
                       color="orange darken-1" v-if="isLock()===true" 
                       dark @click="updateUsersPassword(usersObject.id)"
                       >
                       <v-icon dark> mdi-pencil-circle</v-icon>
                        {{langkeyword('CHANGE')}}
                      </v-btn>
                      <v-spacer></v-spacer>
                      <v-btn color="red darken-1" dark @click="closeMainDialog">
                        <v-icon dark>mdi-close-circle</v-icon>
                        {{langkeyword('CLOSE')}}
                      </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
                <v-dialog persistent v-model="dialogDelete" max-width="500px">
                  <v-card>
                    <v-card-title>
                      <v-icon>mdi-delete-circle</v-icon>
                      {{langkeyword("DELETE")}}
                    </v-card-title>
                    <v-card-text>
                    {{langkeyword("ARE_YOU_SURE_YOU_WANT_TO_DELETE")}}
                    </v-card-text>
                    <v-card-actions>
                      <v-btn
                        color="red lighten-2"
                        dark
                        @click="deleteUsers(usersObject.id)"
                      >
                        <v-icon>mdi-delete-circle</v-icon>
                        {{langkeyword("DELETE")}}
                      </v-btn>
                      <v-spacer></v-spacer>
                      <v-btn justify="end" color="red darken-2" dark @click="closeDeleteDialog">
                        <v-icon> mdi-close-circle</v-icon>
                        {{langkeyword("CLOSE")}}
                      </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>

                  <v-spacer></v-spacer>
                  
                <v-row>
                  <v-col cols="12" md="10">
                    <v-text-field
                    
                      class="rabar-font"
                      v-model="search"
                      append-icon="mdi-magnify"
                      :label="langkeyword('SEARCH')"
                      hide-details
                    ></v-text-field>
                  </v-col>
                </v-row>

              </v-toolbar>
            </template>
             <template v-slot:item.edit="{item}"> 
              <v-icon small class="mr-2 orange white--text px-2 py-2 rounded" @click="editDialog(item)">
                mdi-pencil-circle
              </v-icon>
              <v-icon small class="mr-2 red white--text px-2 py-2 rounded" @click="deleteDialog(item)"> 
                mdi-delete-circle 
              </v-icon>
              <v-icon small class="mr-2 blue white--text px-2 py-2 rounded" @click="lockDialog(item)"> 
                mdi-lock 
              </v-icon>
            </template>
          </v-data-table>
        </v-col>
      </v-row>
    </v-container>
    <br /><br /><br />
    <dashboardFooter />
  </div>
</template>

<script>
import Vue from "vue"
import UsersRequests from '../../requests/dashboard/Users'
import navbar from '../../layouts/dashboard/nav.vue'
import dashboardFooter from '../../layouts/dashboard/dashboardFooter.vue'
export default {
    components: {
        navbar,dashboardFooter
    },
    data: () => ({
        dialog:false,
        dialogDelete: false,
        snackbar:true,
        users: [],
        roles:[
        {name:Vue.prototype.langkeyword('DEVELOPER'),value:'developer'},
        {name:Vue.prototype.langkeyword('ADMIN'),value:'admin'},
        {name:Vue.prototype.langkeyword('MODERATOR'),value:'moderator'},
        {name:Vue.prototype.langkeyword('WRITER'),value:'writer'}
        ],
        search:'',
        loading: true,
        error_msg:null,
        success_msg:null,
        headers: [
          { text: '#', value: "id",align: 'center'},
          { text: Vue.prototype.langkeyword('NAME'), value: "name",align: 'center'},
          { text: Vue.prototype.langkeyword('EMAIL'), value: "email",align: 'center'},
          { text: Vue.prototype.langkeyword('ROLE'), value: "role",align: 'center'},
          {text: Vue.prototype.langkeyword('ACTIONS'),value: 'edit',sortable: false,align: 'center'},
        ],
        CURRENTFORM:'add',
        usersObject: {
            name: '',
            email: '',
            password: '',
            role: ''
        },
    }),
    watch: {
        options: {
           handler() {
          this.readData()
        },
       }
    },
    mounted() {
       this.readData()
    },
    methods: {
isAdd(){
if(this.CURRENTFORM==='add'){
return true
}
else {
return false
}
},
isEdit(){
if(this.CURRENTFORM==='edit'){
return true
}
else {
return false
}
},
isLock(){
if(this.CURRENTFORM==='lock'){
return true
}
else {
return false
}
},
cleanMessages(){
this.usersObject ={}
setTimeout(() => {
this.success_msg=null
this.error_msg=null
}, 3000)
},
validate(params,callback){
this.error_msg=null
params.forEach(param=>{
if(param=='' || param==undefined || param==null){
this.error_msg = this.langkeyword('DATA_REQUIRED')
}
})
if(this.error_msg==null){
return callback()
}
this.cleanMessages()
},
editDialog(item) {
this.CURRENTFORM = 'edit'
this.usersObject = Object.assign({}, item)
this.dialog = true
},
lockDialog(item) {
this.CURRENTFORM = 'lock'
this.usersObject = Object.assign({}, item)
this.dialog = true
},
deleteDialog(item) {
this.CURRENTFORM =  'delete'
this.usersObject = Object.assign({}, item)
this.dialogDelete = true
},
closeMainDialog() {
this.dialog = false
this.$nextTick(() => {
this.usersObject = Object.assign({}, this.defaultItem)
this.CURRENTFORM = 'add'
})
},
closeDeleteDialog() {
this.dialogDelete = false
this.$nextTick(() => {
this.usersObject = Object.assign({}, this.defaultItem)
this.CURRENTFORM = 'add'
})
},
readData() {
this.users = this.$store.getters.getusers
},
saveUsers() {
this.validate(
[this.usersObject.name,this.usersObject.email,this.usersObject.role,this.usersObject.password],
()=>{
UsersRequests.add({
addUsers:true,
name:this.usersObject.name,
email:this.usersObject.email,
role:this.usersObject.role,
pass:this.usersObject.password
},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.users = res.data.data
this.users = res.data.data
}
this.cleanMessages()
})
}
)
this.closeMainDialog()
},
updateUsers(userId) {
this.validate(
[this.usersObject.name,this.usersObject.email,this.usersObject.role],
()=>{
UsersRequests.edit({
editUsers:true,
user_id:userId,
name:this.usersObject.name,
email:this.usersObject.email,
role:this.usersObject.role,
},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.users = res.data.data
this.users = res.data.data
}
this.cleanMessages()
})
}
)
this.closeMainDialog()
},
updateUsersPassword(userId) {
this.validate(
[this.usersObject.newpassword],
()=>{
UsersRequests.changePassword({
changePassword:true,
user_id:userId,
newpassword:this.usersObject.newpassword,
},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.users = res.data.data
this.users = res.data.data
}
this.cleanMessages()
})
}
)
this.closeMainDialog()
},
deleteUsers(userId) {
if(userId==localStorage.getItem('dashboardauthId')){
this.error_msg = this.langkeyword('INVALID_REQUEST')
}
else {
UsersRequests.delete({deleteUsers:true,user_id:userId},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.users = res.data.data
this.users = res.data.data 
}
})
}
this.cleanMessages()
this.closeDeleteDialog()
},
},
}
</script>
