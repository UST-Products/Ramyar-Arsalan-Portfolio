<template lang="">
    <div class="body">

        <v-container grid-list-xs>


            <center>
                <v-layout column class="form-reset">
                    <v-flex>
                        <v-col cols="12" lg="4" sm="6" class="card-layout radius-10 py-8 px-8" elevation="20">
                            <div class="text-center ">
                                <center>
                                    <span class="orange--text rabar-font" color="primary">{{error_auth}}</span>
                                    <v-img contain max-height="204" max-width="100" src="../../../assets/reset.svg">
                                    </v-img>
                                </center>
                            </div>

                            <v-form @submit.prevent="reset()">

                                <v-text-field type="number" append-icon="mdi-numeric" :label="langkeyword('CODE')" dark
                                    required   class="code mb-4 rabar-font my-6 " v-model="code"
                                    :disabled="disabled" :error-messages="error" ref="code">
                                </v-text-field>

                                 <v-text-field dark class="mb-14 rabar-font" v-model="newpass"
                                    :append-icon="show ? 'mdi-eye-off-outline' : 'mdi-eye-outline'" :label="langkeyword('NEWPASSWORD')"
                                    name="newpass" :type="show ? 'input' : 'password'" hide-details="auto"
                                    @click:append="show = !show" :error-messages="passErr" ref="pass" />


                            </v-form>


                            <div class="d-flex justify-space-between ">


                                <v-btn small class="  radius-10 py-5 text-none rabar-font" dark color="indigo green"
                                    @click="reset()">
                                   {{langkeyword('UPDATE')}}

                                </v-btn>

                                <v-btn class="text-forget rabar-font letter-spacing-0" style="margin-left: -16px;"
                                    color="green" text @click="$router.push('/dashboard/auth/forget')">
                                   {{langkeyword('IS_CODE_NOT_SENT')}}
                                </v-btn>

                            </div>
                        </v-col>
                    </v-flex>
                </v-layout>

            </center>



        </v-container>

    </div>
</template>
<script>
import resetRequests from '../../../requests/dashboard/auth/Reset'
    export default {
        data() {
            return {
                show: false,
                error: null,
                passErr: null,
                disabled: false,
                code: '',
                token: this.$route.query.token,
                newpass: '',
                error_auth: null
            }
        },
        methods: {
    ifAuthorized(){
    resetRequests.ifAuthorized({
    isAuthCheck:true,
    user_id:this.dashboardAuthId(),
    token:this.dashboardAuthToken(),
  },(res)=>{
    if (res.data.status===true){
this.$router.push('/dashboard/home')
    }
  })
      },
    reset() {
resetRequests.authReset({
    isReset:true,
    code:this.code,
    newpass:this.newpass,
    token:this.token,
  },(res)=>{
    if (res.data.status===false){
this.error_auth = this.langkeyword(res.data.msg)
    }
    else if (res.data.status===true) {
    this.$router.push('/dashboard/auth/login')
    }
  })

            },
        },
           mounted(){
               this.ifAuthorized()
           }
    
    }
</script>
<style>
    @font-face {
        font-family: "rabar";
        src: local("rabar"),
            url(/assets/fonts/Rabar_039.ttf) format("truetype");
    }

    .body {
        height: 100vh;
        background: #1e1e2f;
    }

    .card-layout {
        background: #27293d !important;
    }

    .dark-blue {
        background: #1e1e2f !important;
    }

    .text-style {
        font-family: "rabar" !important;
        color: aliceblue !important;
    }

    .rabar-font {
        font-family: "rabar" !important;
    }

    /* input  number */
    .code input[type='number'] {
    -moz-appearance:textfield;
}
.code input::-webkit-outer-spin-button,
.code input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

    .v-label {
        font-size: 14px !important;
    }

    .form-reset {
        padding: 115px 0px;
    }

    .radius-10 {
        border-radius: 10px !important;
    }

    .radius-15 {
        border-radius: 15px !important;
    }

    .radius-circle {
        border-radius: 45% !important;
        padding: 25px 8px !important;

    }

    .text-forget {
        font-size: 10px !important;
    }

    @media only screen and (max-width: 600px) {
        .form-reset {
            padding: 123px 0px !important;
        }
    }
</style>