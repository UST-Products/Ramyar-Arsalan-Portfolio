<template>
    <div>
            <v-row class="d-flex justify-center mt-16">
                  <h2>{{langkeyword('ABOUT')}}</h2>
            </v-row>

            <v-row class="d-flex justify-center mt-16">
                  <p class="mt-2">{{lang()==='ku' ? $store.state.setting.ku_about : $store.state.setting.en_about}}</p>
            </v-row>

        <appFooter/>
    </div>
</template>

<script>
import appFooter from "../../layouts/client/footer.vue";
    export default {
        components:{appFooter},
        data(){
            return {

            }
        },
        mounted(){
        
        }
    }
</script>

<style lang="scss" scoped>

</style>