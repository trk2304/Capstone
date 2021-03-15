<template :key="renderKey">
    <div class="block">
        <v-container class="listingBlocks">
            <v-row class="d-flex justify-space-around" v-if="!(this.listings === undefined) && this.listings.length != 0 && this.listings != 'No rows'">
                <v-card 
                    v-for="listing in listings"
                    :key="listing.listingID"
                    width="760px"
                    class="listingCard"
                >
                    <v-img
                        class="white--text align-end"
                        height="200px"
                        src="https://via.placeholder.com/150"
                    >
                        <v-card-title class="listingTitle">{{ listing.productName }}</v-card-title>
                    </v-img>

                    <v-card-subtitle class="pb-10">
                        ${{ listing.price }}
                    </v-card-subtitle>

                    <v-card-text class="text--primary">
                        <p>{{ listing.description }}</p>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                            color="primary"
                            text
                            :to="'/listingView/' + listing.listingID"
                        >
                            View Listing
                        </v-btn>

                        <v-btn 
                            v-if="profile()"
                            color="primary"
                            text
                            @click="deleteListing(listing.listingID)"
                        >
                            Delete Listing
                        </v-btn>

                        <span v-if="profile()">
                          <EditListing :listing="listing"/>
                        </span> 

                        <span v-if="profile()">
                          <UploadListingImage :listing="listing"/>
                        </span>
    
                        <span v-if="profile()">
                          <ClearListingImages :listing="listing"/>
                        </span> 
                    </v-card-actions>
                </v-card>
            </v-row>
            <div v-else>
                <h3>You currently have no listings!</h3>
            </div>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios'
import EditListing from './EditListing'
import UploadListingImage from './UploadListingImage.vue'
import ClearListingImages from './ClearListingImages.vue'
export default {
    name: "ListingBlock",
    components: {
      EditListing,
      UploadListingImage,
      ClearListingImages
    },
    data() {
        return {
            listings: [],
            errors: [],
            renderKey: 0
        }
    },
    mounted() {
        // You should be able to modify the URL based on what the current route is.
        axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getUserListings.php?userID=" + this.$store.getters.getUser)
        .then(response => {
            this.listings = response.data
            console.log(this.$store.getters.getUser);
        })
        .catch(function (error) {
            this.errors.push(error)
        })
    },
    methods: {
        deleteListing: function(id) {
            console.log("Delete this thing with the following ID: " + id)

            axios.post('http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/deleteUserListing.php', {
                listingID: id
            })
            .then(function(response) {
                console.log(response)
            })
            .catch(function(error) {
                console.log(error)
            })

            alert('Listing Successfully Deleted')
            
            // A temporoary fix. Try to find a way to re-render component asynchronously.
            window.location.reload()
        },
        // Only access this function if the route is in the profile. Keeps others from deleting this user's posts.
        profile: function() {
            if(this.$route.fullPath.includes(this.$store.getters.getUser)) {
                return true
            } else {
                return false
            }
        },

        editListing: function() {

        }

    }

}
</script>

<style scoped>

.listingTitle {
    color: black;
}

.listingBlocks {
    margin-top: 3rem;
}

.listingCard {
    margin: 1.0rem;
}
</style>
