<template>
    <v-container>
        <br>
        <h1 class="display-3">{{listing[0].productName}} - ${{listing[0].price}}</h1>
        <br>
        <h1 class="display-1">Seller: <a :href="'/viewUser/' + listing[0].userID">{{listing[0].userID}}</a></h1>
        
        <br>
        <h3>Here's my Email: <a :href="'mailto:'+listing[0].userID +'@usna.edu'">Message me now!</a></h3>
        <br>

        <!-- Image of the Item Goes Here -->

          <h3>Photos of {{this.listing[0].productName}}:</h3>
          <div v-if="this.images.length > 0">
              <v-container class="d-flex justify-space-around">
                <v-img max-width="500px" max-height="500px" contain v-for="image in images" :src="image.path" alt="Broken file" :key="image.imageID"></v-img>
              </v-container>
          </div>
        <br>
        <h2>Description:</h2>
        <p class="body-1">{{listing[0].description}}</p>
    </v-container>
</template>

<script>
import axios from 'axios'
export default {
    name: "ListingView",
    data() {
        return {
            listing: {},
            images: []
        }
    },
    created() {
        // Gathers the info related to the listing.
        axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getListingById.php/", {
            id: this.$route.params.id
        })
        .then(response => {
            this.listing = response.data
            let idForImages = this.listing[0].listingID
            console.log(idForImages)

            
            // Gathers images related to the listing.
            axios.get("https://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getImageById.php?id=" + idForImages)
            .then(result => {
              this.images = result.data
              console.log(this.images)
              
              // Need to set up paths for image URLs
              for(let i = 0; i < this.images.length; i++) {
                this.images[i].path = require('../images/' + this.images[i].path)
                console.log(this.images[i].path);
              }
            })
            .catch(e => {
              console.log(e)
            })
        })
        .catch(e => {
            console.log(e)
        })
    }
}
</script>

<style scoped>
img {
  max-width: 100%;
  height: auto;
  object-fit: contain;
}
</style>
