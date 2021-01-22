<template>
  <div class="home">
    <Navbar></Navbar>
    <Home></Home>
    <HomeListing></HomeListing>
  </div>
</template>

<script>
// @ is an alias to /src
import Home from '../components/Home.vue'
import Navbar from '../components/Navbar.vue'
import HomeListing from '../components/HomeListing.vue'
export default {
  name: 'Homepage',
  components: {
    Home, Navbar, HomeListing
  }
}
</script>
