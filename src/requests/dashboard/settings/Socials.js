import axios from 'axios'

 
export default {

    async getAll(params,callback){
        return await axios.post("/app/dashboard/settings/socials/getall",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async add(params,callback){
        return await axios.post("/app/dashboard/settings/socials/add",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async edit(params,callback){
        return await axios.post("/app/dashboard/settings/socials/edit",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async delete(params,callback){
        return await axios.post("/app/dashboard/settings/socials/delete",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



}
 
