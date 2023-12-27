<template>
    <v-app
          :style="{  background: '#F5F5F5' }"
        >
          <SideBar/>
          <v-main>
      <v-container class="px-1 mt-n2" >
        <v-row>
          <v-col >
             
          </v-col>
          <v-col>
             
                  <NavBar />
            
             
          </v-col>
      </v-row>
  
     </v-container>

    
      <v-container class="px-6 mt-n2" fluid>
        <v-row class="ml-6 mt-3">
          <v-col cols="12" sm="3">
            <v-card
              class="rounded-xs"
              height="90"
              width="270"
            >
              <div class="d-flex flex-no-wrap ">
                <v-avatar class="ml-5 mt-2" size="70px" color="#ffc7c2">
                    <v-icon icon="mdi mdi-account-multiple" size="x-large" color="#f24822" ></v-icon>
                </v-avatar>
                <div>
                  <v-card-text class="text-h5 mt-0">
                    USERS
                  </v-card-text>

                  <v-card-subtitle>48</v-card-subtitle>
                </div>
               <!--<v-img src="av.png" class="mr-4 mt-5" absolute></v-img>--> 
              </div>
            </v-card>
          </v-col>
          <v-col cols="12" sm="3">
            <v-card
            class="rounded-xs"
              height="90"
              width="270"
            >
              <div class="d-flex flex-no-wrap ">
                <v-avatar class="ml-5 mt-2" size="70px" color="#fff1c2">
                    <v-icon icon="mdi mdi-cart" size="x-large" color="#eba611"></v-icon>
                </v-avatar>
                <div>
                  <v-card-text class="text-h5 mt-0"> ORDERS </v-card-text>

                  <v-card-subtitle>620</v-card-subtitle>
                </div>
               <!--<v-img src="av.png" class="mr-4 mt-5" absolute></v-img>--> 
              </div>
            </v-card>
          </v-col>
          <v-col cols="12" sm="3">
            <v-card
            class="rounded-xs"
              height="90"
              width="270"
            >
              <div class="d-flex flex-no-wrap ">
                <v-avatar class="ml-5 mt-2" size="70px" color="#d9b8ff">
                    <v-icon icon="mdi mdi-laptop" size="x-large" color="#9747ff"></v-icon>
                </v-avatar>
                <div>
                  <v-card-text class="text-h5 mt-0">
                    EQUIPMENT
                  </v-card-text>

                  <v-card-subtitle>850</v-card-subtitle>
                </div>
                <!--<v-img src="map.png" class="mr-4 mt-5" absolute></v-img>-->
              </div>
            </v-card>
          </v-col>
          <v-col cols="12" sm="3">
            <v-card
            class="rounded-xs"
              height="90"
              width="270"
            >
              <div class="d-flex flex-no-wrap">
                <v-avatar class="ml-5 mt-2" size="65px" color="#aff4c6">
                    <v-icon icon="mdi mdi-chart-box" size="x-large" color="#009951"></v-icon>
                </v-avatar>
                <div>
                  <v-card-text class="text-h5 mt-0">
                    STOCK VALUE
                  </v-card-text>

                  <v-card-subtitle>850TND</v-card-subtitle>
                </div>
               <!-- <v-img src="map.png" class="mr-4 mt-5" absolute></v-img>-->
              </div>
            </v-card>
          </v-col>

          <v-col cols="12" sm="4" class="mt-n4">
            <v-card class="mx-auto" height="350px">
              <v-card-item title="Doughnut">
                <Doughnut />
              </v-card-item>

              <v-card-text class="py-0"> </v-card-text>
            </v-card>
          </v-col>
          <v-col cols="12" sm="8" class="mt-n4">
            <v-card class="mx-auto" height="350px">
              <v-card-item title="Bubble">
                <Bubble />
              </v-card-item>
            </v-card>
          </v-col>
          <v-col cols="12" sm="8" class="mt-n4">
            <v-card class="mx-auto">
              <v-card-item title="Last Trips">
                <template v-slot:subtitle> Overview of latest month </template>
              </v-card-item>

              <v-card-text class="py-0 mt-n4">
                <v-row align="center" no-gutters>
                  <v-col class="" cols="12">
                    <v-list lines="two">
                      <v-list-item
                        v-for="folder in folders"
                        :key="folder.title"
                        :title="folder.title"
                        :subtitle="folder.subtitle"
                      >
                        <template v-slot:prepend>
                          <v-avatar color="">
                            <v-img :src="folder.img" alt="John"></v-img>
                          </v-avatar>
                        </template>

                        <template v-slot:append>
                          <v-btn
                            size="large"
                            color="#B49239"
                            icon="mdi mdi-airplane-off"
                          ></v-btn>
                        </template>
                      </v-list-item>
                    </v-list>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
          </v-col>
          <v-col cols="12" sm="4" class="mt-n4">
            <v-card height="155px" class="">
              <v-card-item title="Bar Chart">
                <Bar class="mt-n4" />
              </v-card-item>

              <v-card-text class="py-0"> </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
   



     </v-main>

          
        </v-app>
  </template>
  
  <script setup>
  import NavBar from "@/components/employe/NavBar.vue";
  import SideBar from "@/components/admin/SideBar.vue";
  
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
      SideBar,
      NavBar,
  
    },
  };
  </script>
  
  <style scoped></style>
  