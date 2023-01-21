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
            :items="metas"
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
                <v-toolbar-title><v-icon>mdi-card-search</v-icon> {{langkeyword('METATAGS')}}</v-toolbar-title>
          <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="700px" persistent>
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
                    </v-card-title>
                    <v-card-text class="radius-15">
                      <v-container>
                        <v-form>
                          <v-text-field
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="metasObject.ku_keywords"
                            :label="langkeyword('KU_KEYWORDS')"
                          >
                          </v-text-field>
                          <v-text-field
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="metasObject.ar_keywords"
                            :label="langkeyword('AR_KEYWORDS')"
                          >
                          </v-text-field>
                          <v-text-field
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="metasObject.en_keywords"
                            :label="langkeyword('EN_KEYWORDS')"
                          >
                          </v-text-field>

                          <v-textarea
                            clearable
                            clear-icon="mdi-close-circle"
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="metasObject.ku_content"
                            :label="langkeyword('KU_CONTENT')"
                          >
                          </v-textarea>
                          <v-textarea
                            clearable
                            clear-icon="mdi-close-circle"
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="metasObject.ar_content"
                            :label="langkeyword('AR_CONTENT')"
                          >
                          </v-textarea>
                          <v-textarea
                            clearable
                            clear-icon="mdi-close-circle"
                            class="rabar-font"
                            append-icon="mdi-format-title"
                            v-model="metasObject.en_content"
                            :label="langkeyword('EN_CONTENT')"
                          >
                          </v-textarea>

                        </v-form>
                      </v-container>
                    </v-card-text>
                    <v-card-actions>
                      <v-btn color="green darken-1" v-if="isAdd()===true" dark @click="saveMetas">
                        <v-icon dark> mdi-plus-circle</v-icon>
                        {{langkeyword('SAVE')}}
                      </v-btn>
                      <v-btn 
                       color="orange darken-1" v-if="isEdit()===true" 
                       dark @click="updateMetas(metasObject.id)"
                       >
                       <v-icon dark> mdi-pencil-circle</v-icon>
                        {{langkeyword('UPDATE')}}
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
                        @click="deleteMetas(metasObject.id)"
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
import MetasRequests from '../../../requests/dashboard/settings/Metas'
import navbar from '../../../layouts/dashboard/nav.vue'
import dashboardFooter from '../../../layouts/dashboard/dashboardFooter.vue'
export default {
    components: {
        navbar,dashboardFooter
    },
    data: () => ({
        dialog:false,
        dialogDelete: false,
        snackbar:true,
        metas: [],
        search:'',
        loading: Vue.prototype.getters().getmetas==null || Vue.prototype.getters().getmetas=='' || Vue.prototype.getters().getmetas==undefined ? true : false,
        error_msg:null,
        success_msg:null,
        headers: [
          { text: '#', value: "id",align: 'center'},
          { text: Vue.prototype.langkeyword('KU_KEYWORDS'), value: "ku_keywords",align: 'center'},
          { text: Vue.prototype.langkeyword('AR_KEYWORDS'), value: "ar_keywords",align: 'center'},
          { text: Vue.prototype.langkeyword('EN_KEYWORDS'), value: "en_keywords",align: 'center'},
          {text: Vue.prototype.langkeyword('ACTIONS'),value: 'edit',sortable: false,align: 'center'},
        ],
        CURRENTFORM:'add',
        metasObject: {
            user:Vue.prototype.dashboardAuthId(),
            ku_keywords: '',
            ar_keywords: '',
            en_keywords: '',
            ku_content: '',
            ar_content: '',
            en_content: '',
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
cleanMessages(){
this.metasObject ={user:Vue.prototype.dashboardAuthId()}
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
this.metasObject = Object.assign({}, item)
this.dialog = true
}, 
lockDialog(item) {
this.CURRENTFORM = 'lock'
this.metasObject = Object.assign({}, item)
this.dialog = true
},
deleteDialog(item) {
this.CURRENTFORM =  'delete'
this.metasObject = Object.assign({}, item)
this.dialogDelete = true
},
closeMainDialog() {
this.dialog = false
this.$nextTick(() => {
this.metasObject = Object.assign({}, this.defaultItem)
this.CURRENTFORM = 'add'
})
},
closeDeleteDialog() {
this.dialogDelete = false
this.$nextTick(() => {
this.metasObject = Object.assign({}, this.defaultItem)
this.CURRENTFORM = 'add'
})
},
readData() {
this.metas = this.$store.getters.getmetas
},
saveMetas() {
this.validate(
[this.metasObject.ku_keywords,this.metasObject.ar_keywords,this.metasObject.en_keywords,
this.metasObject.ku_content,this.metasObject.ar_content,this.metasObject.en_content],
()=>{
MetasRequests.add({
addMetas:true,
ku_keywords:this.metasObject.ku_keywords,
ar_keywords:this.metasObject.ar_keywords,
en_keywords:this.metasObject.en_keywords,
ku_content:this.metasObject.ku_content,
ar_content:this.metasObject.ar_content,
en_content:this.metasObject.en_content,
user:Vue.prototype.dashboardAuthId()
},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.metas = res.data.data
this.metas = res.data.data
}
this.cleanMessages()
})
}
)
this.closeMainDialog()
},
updateMetas(metaId) {
this.validate(
[this.metasObject.ku_keywords,this.metasObject.ar_keywords,this.metasObject.en_keywords,
this.metasObject.ku_content,this.metasObject.ar_content,this.metasObject.en_content],
()=>{
MetasRequests.edit({
editMetas:true,
meta_id:metaId,
ku_keywords:this.metasObject.ku_keywords,
ar_keywords:this.metasObject.ar_keywords,
en_keywords:this.metasObject.en_keywords,
ku_content:this.metasObject.ku_content,
ar_content:this.metasObject.ar_content,
en_content:this.metasObject.en_content
},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.metas = res.data.data
this.metas = res.data.data
}
this.cleanMessages()
})
}
)
this.closeMainDialog()
},
deleteMetas(metaId) {
MetasRequests.delete({deleteMetas:true,meta_id:metaId},(res)=>{
if (res.data.status===false){
this.error_msg = this.langkeyword(res.data.msg)
}
else if (res.data.status===true) {
this.error_msg = null
this.success_msg = this.langkeyword(res.data.msg)
this.$store.state.metas = res.data.data
this.metas = res.data.data 
}
})
this.cleanMessages()
this.closeDeleteDialog()
},
},
}
</script>
