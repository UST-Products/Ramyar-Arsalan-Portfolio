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
            :items="contacts"
            :loading="loading"
            :search="search"
            sort-by="name"
            class="elevation-1 rabar-font radius-15"             :footer-props="{
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
                <v-toolbar-title><v-icon>mdi-contacts</v-icon> {{langkeyword('CONTACTS')}}</v-toolbar-title>
          <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
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
                        @click="deleteContacts(contactsObject.id)"
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


                <v-dialog persistent v-model="dialogDetail" max-width="500px">
                  <v-card>
                    <v-card-title>
                      <v-icon>mdi-main</v-icon>
                      {{langkeyword("DETAIL")}}
                    </v-card-title>
                    <v-card-text>
                    {{contactsObject.msg}}
                    </v-card-text>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn justify="end" color="red darken-2" dark @click="closeDetailDialog">
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
<v-btn class="mr-2 blue white--text px-2 py-2 rounded" @click="detailDialog(item)">
              <v-icon> 
                mdi-eye 
              </v-icon>
</v-btn>
<v-btn class="mr-2 red white--text px-2 py-2 rounded" @click="deleteDialog(item)">
              <v-icon> 
                mdi-delete-circle 
              </v-icon>
</v-btn>
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
import ContactsRequests from '../../../requests/dashboard/settings/Contacts'
import navbar from '../../../layouts/dashboard/nav.vue'
import dashboardFooter from '../../../layouts/dashboard/dashboardFooter.vue'
export default {
    components: {
        navbar,dashboardFooter
    },
    data: () => ({
        dialog:false,
        dialogDetail:false,
        dialogDelete: false,
        snackbar:true,
        contacts: [],
        search:'',
        loading:Vue.prototype.getters().gecontacts==null || Vue.prototype.getters().gecontacts=='' || Vue.prototype.getters().gecontacts==undefined ? true : false,
        error_msg:null,
        success_msg:null,
        headers: [
          { text: '#', value: "id",align: 'center'},
          { text: Vue.prototype.langkeyword('EMAIL'), value: "email",align: 'center'},
          { text: Vue.prototype.langkeyword('SUBJECT'), value: "subject",align: 'center'},
          {text: Vue.prototype.langkeyword('ACTIONS'),value: 'edit',sortable: false,align: 'center'},
        ],
        CURRENTFORM:'delete',
        contactsObject:{}
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
cleanMessages(){
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
deleteDialog(item) {
this.CURRENTFORM =  'delete'
this.contactsObject = Object.assign({}, item)
this.dialogDelete = true
},
closeDeleteDialog() {
this.dialogDelete = false
this.$nextTick(() => {
})
},
detailDialog(item) {
this.CURRENTFORM =  'detail'
this.contactsObject = Object.assign({}, item)
this.dialogDetail = true
},
closeDetailDialog() {
this.dialogDetail = false
this.$nextTick(() => {
})
},
readData() {
this.contacts = this.$store.getters.gecontacts
},
deleteContacts(contactId) {
ContactsRequests.delete({deleteContacts:true,contact_id:contactId},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.contacts = res.data.data
this.contacts = res.data.data 
}
})
this.cleanMessages()
this.closeDeleteDialog()
this.closeDetailDialog()
},
},
}
</script>






