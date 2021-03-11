<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <div class="d-flex align-center">
        <span class="mr-2">MidTrade</span>
      </div>

      <v-spacer></v-spacer>

      <router-link to="/" class="navLink">Home</router-link>
      <router-link to="/user/:id/overview" class="navLink">Profile</router-link>
      <router-link to="/listings" class="navLink">Listings</router-link>
    </v-app-bar>

    <v-main>
      <router-view :key="$route.fullPath"></router-view>
    </v-main>

  </v-app>
</template>

<script>

export default {
  name: 'App'
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
