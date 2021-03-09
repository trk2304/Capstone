<template>
    <v-container>
        <br>
        <h1 class="display-3">{{listing[0].productName}} - ${{listing[0].price}}</h1>
        <br>
        <h1 class="display-1">Seller: User {{listing[0].userID}}</h1>
        <br>

        <!-- Image of the Item Goes Here -->
        <div class="image-box">**This is where the image would go...**</div>

        <br>
        <h3>Description:</h3>
        <p class="lead">{{listing[0].description}}</p>
    </v-container>
</template>

<script>
import axios from 'axios'
export default {
    name: "ListingView",
    data() {
        return {
            listing: {}
        }
    },
    created() {
        axios.post("http://localhost/milestone8_titus/src/db/getListingById.php/", {
            id: this.$route.params.id
        })
        .then(response => {
            this.listing = response.data
            console.log(this.listing)
        })
        .catch(e => {
            console.log(e)
        })
    }
}
</script>

<style scoped>

</style>
