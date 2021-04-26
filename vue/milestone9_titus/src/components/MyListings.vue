<template>
    
    <div>
        <h1>My Listings</h1>
        <ListingBlock/>
        
    </div>

</template>

<script>
import ListingBlock from './ListingBlock.vue'
export default {
    name: "MyListings",
    components: {
        ListingBlock
    },
    created() {
      console.log(this.$store.getters.getUser);
    }
}
</script>

<style scoped>
h1, h2 {
  text-align: center;
  margin: auto;
}

p {
  text-align: center;
  margin: auto;
}
</style>
