<template>

  <v-app>
    <v-main>


      


      <v-sheet width="600" height="510" class="mx-auto mt-10" >
        <h1>Login</h1>
        <p>admin:admin@admin.com/password:admin</p>
        <p>user:user@user.com/password:user</p>
      <v-form class="mt-5">
        <v-text-field  
           variant="outlined"
            label="email"
            v-model="email"
        >
          
        </v-text-field>

        <v-text-field  
           variant="outlined"
            label="password"
            v-model="password"
        >
          
        </v-text-field>

        <v-btn   @click="login" >login</v-btn>
        <v-btn @click="clearForm" >clear</v-btn>
      </v-form>
    </v-sheet>
    </v-main>
  </v-app>

</template>

<script >
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login() {
      if (this.email === "admin@admin.com" && this.password==="admin") {
        // Redirect to dashboard page
        this.$router.push({ name: "Dashboard" });
      } else if (this.email === "user@user.com" && this.password==="user"){
        // Redirect to equipments page
        this.$router.push({ name: "Equipements" });
      }
    },
    clearForm() {
      // Clear the form fields
      this.email = "";
      this.password = "";
    },
  },
};
</script>