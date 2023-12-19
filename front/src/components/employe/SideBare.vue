<template  >
  <v-navigation-drawer style="border-radius: 20px;height: 750px;"  class="mx-4 "  color="#FFFFFF" >
    <div  >
        <v-img src="/logo1.jpg" height="190px" width="233px"  ></v-img>
      </div>

    <v-list>
    
      <v-list-item
        v-for="(item, i) in links"
        :key="i"
        :value="item"
        active-class="border"
        
        :to="item.link"
        
        router
        
        
      >
        <template v-slot:prepend>
          <v-icon :icon="item.icon" color="#5C5C5C"></v-icon>
        </template>

        <v-list-item-title v-text="item.text" color="#5C5C5C"></v-list-item-title>
      </v-list-item>
    </v-list>
    <div
      style="position: relative;" 
    >
      <v-img src="/Group74.png" contain height="190px" width="239px"></v-img>
      <div 
        style="position: absolute;top: 12px;left: 105px;"
        >
        <v-btn density="compact" color="#004AAD"  size="large" icon="mdi mdi-plus"></v-btn>
       
      </div>
      <div
       style="position: absolute;top: 150px;left: 45px;background-color:#D9F4FF ;"
      >
        <v-btn  color="#004AAD"  size="small">Customer service</v-btn>
      </div>
      
    </div>
  </v-navigation-drawer>
</template>

<script setup>
import { ref } from "vue";
const links = [
{ text: "Home", icon: "mdi mdi-home-outline",link:"/equipments" },
  { text: "Equipments", icon: "mdi mdi-laptop",link:"/equipments" },
  { text: "Cart", icon: "mdi mdi-cart",link:"/cart" },
  { text: "Demand", icon: "mdi mdi-form-select",link:"/demand" },
  { text: "Permission", icon: "mdi mdi-briefcase",link:"/permission" },
  { text: "Profile", icon: "mdi mdi-account-box-multiple",link:"/profil" },
  { text: "Logout", icon: "mdi mdi-logout",link:"/" },
];

/*



const hoveredIndex = ref(null);



const setHovered = (index, isHovered) => {
  hoveredIndex.value = isHovered ? index : null;

};  */
</script>

<script>
export default {
  data: () => ({
    cards: ["Today", "Yesterday"],
    drawer: null,
  }),
};
</script>
<style >
/*
.hovered {
  background-color:#5e0a2b; 
}*/
</style>

