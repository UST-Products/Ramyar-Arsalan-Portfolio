import axios from 'axios'

 
export default {

    async authReset(params,callback){
        return await axios.post("/app/dashboard/auth/resetpassword",params)
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
 
