import axios from 'axios'

 
export default {

    async changeName(params,callback){
        return await axios.post("/app/dashboard/profile/changename",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changeEmail(params,callback){
        return await axios.post("/app/dashboard/profile/changeemail",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async changePassword(params,callback){
        return await axios.post("/app/dashboard/profile/changepassword",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async changeAvatar(params,config,callback){
        return await axios.post("/app/dashboard/profile/changeavatar",params,config)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },




}
 
