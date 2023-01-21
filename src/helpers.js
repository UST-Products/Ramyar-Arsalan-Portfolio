import langdata from './language.json'
import store from './store'

 
const MyHelpers = {
install(Vue) {


Vue.prototype.lang = () => {
  return store.state.actlang
},


Vue.prototype.getters = () => {
  return store.getters
},

Vue.prototype.state = () => {
  return store.getters
},


Vue.prototype.dashboardAuthId = () => {
  return localStorage.getItem('dashboardauthId')
},
  
Vue.prototype.dashboardAuthToken = () => {
  return localStorage.getItem('dashboardauthToken')
},
  

Vue.prototype.clientAuthId = () => {
  return localStorage.getItem('clientauthId')
},
  
Vue.prototype.clientAuthToken = () => {
  return localStorage.getItem('clientauthToken')
},
  

Vue.prototype.langkeyword = (index) => {
  const actlang = store.state.actlang
  const langobject =  langdata[actlang]
  return langobject.data[index]
}

Vue.prototype.directionLang = () => {
  const actlang = store.state.actlang
  const langobject =  langdata[actlang]
  return langobject
}
 
Vue.prototype.langoptions = (index) => {
  const actlang = store.state.actlang
  const langobject =  langdata[actlang]
  return langobject[index]
}


Vue.prototype.appName = () => {
  if(store.state.actlang==='ku'){
    return store.state.setting.ku_name
  }
  else if(store.state.actlang==='ar'){
    return store.state.setting.ar_name
  }
  else if(store.state.actlang==='en'){
    return store.state.setting.en_name
  }
}

Vue.prototype.uploadPath = (path)=>{
return store.state.serverurl+'/api/server/uploads'+path
}


Vue.prototype.perPages = ()=>{
  return [
    {text:Vue.prototype.langkeyword('5'),value:5},{text:Vue.prototype.langkeyword('10'),value:10},{text:Vue.prototype.langkeyword('15'),value:15},
    {text:Vue.prototype.langkeyword('20'),value:20},{text:Vue.prototype.langkeyword('50'),value:50},{text:Vue.prototype.langkeyword('ALL'),value:-1}
    ]
  }
  



},
}

export default MyHelpers