import axios from 'axios'

 
export default {

    async authLogin(params,callback){
        return await axios.post("/app/dashboard/auth/login",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async ifAuthorized(params,callback){
        return await axios.post("/app/dashboard/auth/checkAuth",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },




}
 
