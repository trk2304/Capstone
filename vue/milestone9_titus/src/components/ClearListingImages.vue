<template>
  <v-btn
    color="primary"
    text
    @click="deleteImages()"
  >
    Delete all images
  </v-btn>
</template>

<script>
import axios from 'axios'
export default {
  name: 'ClearListingImages',
  props: ['listing'],
  data() {
    return {

    }
  },
  methods: {
    deleteImages: function() {
      axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/deleteListingImages.php?id=" + this.listing.listingID)
      .then(result => {
         console.log(result)
         alert('Images for this post have been removed.')
      })
      .catch(e => {
        console.log(e)
      })
    }
  }  
}

</script>

<style scoped>

</style>
