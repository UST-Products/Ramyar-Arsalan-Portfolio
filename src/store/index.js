import Vue from 'vue'
import Vuex from 'vuex'
import AppRequests from '../requests/App'
Vue.use(Vuex)


export default new Vuex.Store({
  state: {
    actlang:null,
    serverurl:null,
    dashboardauth:{},
    dashboardhome:{},
    setting:{},
    users:[],
    metas:[],
    contacts:[],
    socials:[],
    direction:'',
  },
  getters: {
    getusers(state){
      return state.users
    },
    getmetas(state){
      return state.metas
    },
    gecontacts(state){
      return state.contacts
    },
    getdashboardauth(state){
      return state.dashboardauth
    },
    getlang(state){
      return state.lang
    },
    getdrirection(state){
      return state.drirection
    },
    getsetting(state){
      return state.setting
    },
    getdashboardhome(state){
      return state.dashboardhome
    },
    getsocials(state){
      return state.socials
    },


  },
  mutations: {
    fetchData(state){
      AppRequests.getAll({isLoadApp:true},(res)=>{ 
        state.setting = res.data.fetchsetting
        state.socials = res.data.getsocials
        state.metas = res.data.getmetas
        state.contacts = res.data.getcontacts
        state.users = res.data.getusers
      })
       AppRequests.countAll({isLoadApp:true},(res)=>{ 
        state.dashboardhome = res.data
       })
    }
  },
  actions: {

  },
  modules: {
  }
})
