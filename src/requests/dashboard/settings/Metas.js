import axios from 'axios'

 
export default {

    async getAll(params,callback){
        return await axios.post("/app/dashboard/settings/metas/getall",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async add(params,callback){
        return await axios.post("/app/dashboard/settings/metas/add",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },


    async edit(params,callback){
        return await axios.post("/app/dashboard/settings/metas/edit",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async delete(params,callback){
        return await axios.post("/app/dashboard/settings/metas/delete",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



}
 
