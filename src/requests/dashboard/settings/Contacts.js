import axios from 'axios'

 
export default {

    async getAll(params,callback){
        return await axios.post("/app/dashboard/settings/contacts/getall",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async delete(params,callback){
        return await axios.post("/app/dashboard/settings/contacts/delete",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



}
 
