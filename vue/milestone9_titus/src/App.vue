<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <div class="d-flex align-center">
       <router-link to="/" class="navLink" style="margin-left:20px !important;">MidTrade</router-link>
      </div>

      <v-spacer></v-spacer>

      <router-link to="/" class="navLink">Home</router-link>
      <router-link :to="'/user/' + this.$store.getters.getUser + '/overview'" class="navLink">Profile</router-link>
      <router-link to="/listings" class="navLink">Listings</router-link>
      <router-link to="/post" class="navLink">Post a Listing</router-link>
    </v-app-bar>

    <v-main>
      <router-view :key="$route.fullPath"></router-view>
    </v-main>

  </v-app>
</template>

<script>

export default {
  name: 'App',
  data() {
    return {
      user: this.$store.getters.getUser
    }
  }
};
</script>

<style scoped>
  .navLink {
    color: white;
    margin-left: 30px;
    margin-right: 30px;
    text-decoration: none;
  }
</style>
