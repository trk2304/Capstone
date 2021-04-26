<template>
  <v-container>
    <br><br>
    <h1 class="display-1" style="text-align:center;">Add A Listing to MidTrade!</h1>
    <br>
    <AddListing/>
  </v-container>
</template>

<script>
import AddListing from '../components/AddListing.vue'
export default {
  name: 'AddListingView',
  components: {
    AddListing
  }
}
</script>

<style scoped>

</style>
