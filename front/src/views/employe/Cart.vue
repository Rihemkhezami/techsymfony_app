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
                  Cart
              </div>
          </v-col>
          <v-col>
             
                  <NavBar />
            
             
          </v-col>
      </v-row>
  
     </v-container>
     <v-container>
    
        <v-card   class="mx-auto mt-4" width="720"  style="display: flex;">
        <v-img src="/logo1.jpg" height="90px" width="90px"  ></v-img>
        <v-card-text style="text-align: center;padding-top: 40PX;font-weight: bold;font-size: medium;">
          clavier DELL
        </v-card-text>
        <v-card-text class="d-flex ml-14 mt-n2" style="padding-top: 45PX;">
                  <v-icon class="mr-2" size="28px" small @click="increaseQuantity">mdi mdi-plus-circle-outline</v-icon>
                  <p style="font-size: 20px;padding-top: 4px;" >{{ quantity }}</p>
                  <v-icon class="ml-1" size="28px" small @click="decreaseQuantity">mdi mdi-minus-circle-outline</v-icon>
        </v-card-text>
        <v-icon @click="" size="35px" color="red" style="padding-top: 45PX;margin-right: 30px;">mdi mdi-delete</v-icon>
        
      </v-card>

     
     
      
        <v-card   class="mx-auto mt-4" width="720"  style="display: flex;">
        <v-img src="/logo1.jpg" height="90px" width="90px"  ></v-img>
        <v-card-text style="text-align: center;padding-top: 40PX;font-weight: bold;font-size: medium;">
          clavier DELL
        </v-card-text>
        <v-card-text class="d-flex ml-14 mt-n2" style="padding-top: 45PX;">
                  <v-icon class="mr-2" size="28px" small @click="increaseQuantity">mdi mdi-plus-circle-outline</v-icon>
                  <p style="font-size: 20px;padding-top: 4px;" >{{ quantity }}</p>
                  <v-icon class="ml-1" size="28px" small @click="decreaseQuantity">mdi mdi-minus-circle-outline</v-icon>
        </v-card-text>
        <v-icon size="35px" @click="" color="red" style="padding-top: 45PX;margin-right: 30px;">mdi mdi-delete</v-icon>
      </v-card>

      <div class="mt-5 " style="text-align: center;">
        <v-btn
              class="text-none text-subtitle-1 mx-auto"
              color="#0082E0"
              size="x-large"
              variant="flat"
              rounded="lg"
              width="150px"
              density="compact"
            >
            Confirm order 
            </v-btn>

            <v-btn
              class="text-none text-subtitle-1 mx-auto ml-4"
              color="#0082E0"
              size="x-large"
              variant="flat"
              rounded="lg"
              width="150px"
              density="compact"
            >
            Cancel order
            </v-btn>


      </div>

    
      

      

     

     

     
     </v-container>
  
  
  

  
      </v-main>
          
        </v-app>
  </template>
  
  <script setup>
  import NavBar from "@/components/employe/NavBar.vue";
  import SideBare from "@/components/employe/SideBare.vue";
  
  </script>
  <script>
  
 
  
  export default {

    data() {
      return {
        quantity: 1 // Quantité initiale
      };
    },
    methods: {
      increaseQuantity() {
        this.quantity++;
      },
      decreaseQuantity() {
        if (this.quantity > 1) {
          this.quantity--;
        }
      }
    },
   
   
    components: {
      SideBare,
      NavBar,
  
    },
  };
  </script>
  
  <style scoped></style>
  