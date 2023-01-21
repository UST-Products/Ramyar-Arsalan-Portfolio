import axios from 'axios'

 
export default {

    async getAll(params,callback){
        return await axios.post("/app/dashboard/users/getall",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async add(params,callback){
        return await axios.post("/app/dashboard/users/add",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async edit(params,callback){
        return await axios.post("/app/dashboard/users/edit",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



    async changePassword(params,callback){
        return await axios.post("/app/dashboard/users/changepassword",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async delete(params,callback){
        return await axios.post("/app/dashboard/users/delete",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



}
 
