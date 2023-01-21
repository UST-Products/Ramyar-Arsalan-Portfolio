<template>
    <div>
        <v-container>
            
<v-row class="d-flex justify-center mb-7 mt-10 ">
    <h2 class="color-gold">Login Now !</h2>
 </v-row>   

<v-row dense>
    

        <v-col
          cols="12"
        >

       
            <div class="d-flex flex-wrap justify-space-between align-center bg_mode pa-13 rounded-lg" >

                <v-col cols="11" lg="3" md="3" class="text-center">

              
                <v-img width="320" class="mx-auto" src="../../assets/img/doctor_login.svg"></v-img>
       
            </v-col>

            
                <v-col cols="12" lg="5" md="6">
                    
                    <v-row align="center" ali class="d-flex justify-center mt-10">

                        <Center>
                            <v-alert
                                dense
                                text
                                type="success"
                                >
                                I'm a dense alert with the <strong>text</strong> prop and a <strong>type</strong> of success
                                </v-alert>
                            <v-alert
                                dense
                                text
                                type="error"
                                >
                                I'm a dense alert with the <strong>text</strong> prop and a <strong>type</strong> of error
                                </v-alert>
                        </Center>

                        <v-text-field
                                label="Email"
                                filled
                                rounded
                                dense
                                append-icon="mdi-email"
                                icon
                            ></v-text-field>
                    </v-row>
                    <v-row align="center" ali class="d-flex justify-center mt-10">

                        <v-text-field
                                label="Password"
                                filled
                                rounded
                                dense
                                append-icon="mdi-lock"
                                icon
                            ></v-text-field>
                    </v-row>


                    <v-row align="center" ali class="d-flex justify-center mt-10">

                        <v-btn color="primary">Login</v-btn>
                        
                    </v-row>
                         
                </v-col>
  
    
            </div>
      
        </v-col>
      </v-row>

        </v-container>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>