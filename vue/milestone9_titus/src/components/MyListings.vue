<template>
    
    <div>
        <h1>These are my listings</h1>
        <ListingBlock/>
        
        <br><br><br>
        <h2>Add A New Listing</h2>
        <AddListing/>
    </div>

</template>

<script>
import AddListing from './AddListing.vue'
import ListingBlock from './ListingBlock.vue'
export default {
    name: "MyListings",
    components: {
        ListingBlock,
        AddListing
    },
    created() {
      console.log(this.$store.getters.getUser);
    }
}
</script>

<style scoped>
h2 {
  text-align: center;
  margin: auto;
}
</style>
