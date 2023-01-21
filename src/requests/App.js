import axios from 'axios'

 
export default {

    async firstFetch(params,callback){
        return await axios.post("/app/init",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },



    async getAll(params,callback){
        return await axios.post("/app/init",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    async countAll(params,callback){
        return await axios.post("/app/init",params)
        .then(res=>{
            callback(res)
        })
        .catch(err=>{
            console.log('response error '+err)
        })
    },

    




}
 
