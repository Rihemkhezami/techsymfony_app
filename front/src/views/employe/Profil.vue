<template>
  <v-app
        :style="{  background: '#F5F5F5' }"
      >
        <SideBare/>
        <v-main>
    <v-container class="px-1 mt-n2" >
      <v-row>
        <v-col >
            <div 
            style="background-color: #FFFFFF;
               width: 190px;height: 35px;font-size:25px;text-align: center;
               border-radius: 10px;
               font-weight: bold;" class="ml-4">
                Profil
            </div>
        </v-col>
        <v-col>
           
                <NavBar />
          
           
        </v-col>
    </v-row>

   </v-container>

   
<v-form @submit.prevent="submit" style="width: 600px;" class="mx-auto mt-6">
  <v-container >
    <v-row>
      <v-col
        cols="12"
        sm="6"
      >
      <v-text-field
          variant="outlined"
          v-model="firstname.value.value"
          label="First name"
          prepend-inner-icon="mdi mdi-account"
          :error-messages="firstname.errorMessage.value"
        ></v-text-field>
      </v-col>

      <v-col
        cols="12"
        sm="6"
      >
      <v-text-field
          variant="outlined"
          label="Last name"
          prepend-inner-icon="mdi mdi-account"
          v-model="lastname.value.value"
          :error-messages="lastname.errorMessage.value"
        ></v-text-field>
      </v-col>
      <v-col
        cols="12"
        sm="6"
      >
      <v-text-field
          variant="outlined"
          label="Email"
          prepend-inner-icon="mdi mdi-email"
          v-model="email.value.value"
          :error-messages="email.errorMessage.value"
        ></v-text-field>
      </v-col>
      <v-col
        cols="12"
        sm="6"
      >
      <v-text-field
          variant="outlined"
          label="Phone"
          prepend-inner-icon="mdi mdi-phone"
          v-model="phone.value.value"
          :error-messages="phone.errorMessage.value"
        ></v-text-field>
      </v-col>
      <v-col
        cols="12"
        sm="6"
      >
      <v-select
          variant="outlined"
          label="Department"
          :items="['Computer Issues', 'Communication Issues', 'Human Resources and Management Issues', 'Operational Issues<', 'Financial Issues', 'Compliance Issues','other']"
          v-model="select.value.value"
          :error-messages="select.errorMessage.value"
          >
      </v-select>
     
      </v-col>

      
     
      

      <v-col
        cols="12"
        sm="12"
      >
      
      </v-col>
   
      <v-btn
            class="text-none text-subtitle-1 mx-auto"
            color="#0082E0"
            size="large"
            variant="flat"
            rounded="lg"
            width="150px"
            density="compact"
            type="submit"
          >
            Update
          </v-btn>
          <v-btn @click="handleReset"
            class="text-none text-subtitle-1 mx-auto"
            color="#0082E0"
            size="large"
            variant="flat"
            rounded="lg"
            width="150px"
            density="compact"
            
          >
            Cancel
          </v-btn>
    </v-row>
    </v-container>
    </v-form>





    </v-main>
        
      </v-app>
</template>

<script setup>
import NavBar from "@/components/employe/NavBar.vue";
import SideBare from "@/components/employe/SideBare.vue";
import { ref } from 'vue'
import { useField, useForm } from 'vee-validate'

const { handleSubmit, handleReset } = useForm({
  validationSchema: {
    firstname (value) {
      if (value?.length >= 2) return true

      return 'First name needs to be at least 2 characters.'
    },
    lastname (value) {
      if (value?.length >= 2) return true

      return 'Last name needs to be at least 2 characters.'
    },
    phone (value) {
        if (value?.length > 9 && /[0-9-]+/.test(value)) return true

        return 'Phone number needs to be at least 9 digits.'
      },
      email (value) {
        if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true

        return 'Must be a valid e-mail.'
      },
    select (value) {
      if (value) return true

      return 'Select an item.'
    },
    
  },
})
const firstname = useField('firstname');
const lastname = useField('lastname');
const phone = useField('phone');
const email = useField('email');
const select = useField('select');



const submit = handleSubmit(values => {
  alert(JSON.stringify(values, null, 2))
})

</script>
<script>



export default {
 
 
  components: {
    SideBare,
    NavBar,

  },
};
</script>
<style scoped></style>
