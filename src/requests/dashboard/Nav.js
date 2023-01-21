import axios from 'axios'

 
export default {

    async checkAuth(params,callback){
        return await axios.post("/app/dashboard/auth/checkauth",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async logOut(params,callback){
        return await axios.post("/app/dashboard/auth/logout",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },




}
 
