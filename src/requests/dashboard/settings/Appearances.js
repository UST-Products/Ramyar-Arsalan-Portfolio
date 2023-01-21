import axios from 'axios'

 
export default {

    async changeKurdishName(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changenamekurdish",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changeArabicName(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changenamearabic",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changeEnglishName(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changenameenglish",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async changeLang(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changelang",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changeEmail(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changeemail",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changePhone(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changephone",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



    async changeAboutKurdish(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changeaboutkurdish",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changeAboutEnglish(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changeaboutenglish",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },
    
    async changeAboutArabic(params,callback){
        return await axios.post("/app/dashboard/settings/appearances/changeaboutarabic",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



    async changeLogo(params,config,callback){
        return await axios.post("/app/dashboard/settings/appearances/changelogo",params,config)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async changeFavicon(params,config,callback){
        return await axios.post("/app/dashboard/settings/appearances/changefavicon",params,config)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

}
 
