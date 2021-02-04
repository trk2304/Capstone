<template :key="renderKey">
    <div class="block">
        <v-container class="listingBlocks">
            <v-row class="d-flex justify-space-around">
                <v-card 
                    v-for="listing in listings"
                    :key="listing.listingID"
                    width="350"
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
                        {{ listing.price }}
                    </v-card-subtitle>

                    <v-card-text class="text--primary">
                        <p>{{ listing.description }}</p>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                            color="primary"
                            text
                            to="/listingView"
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
                    </v-card-actions>
                </v-card>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "ListingBlock",
    data() {
        return {
            listings: [],
            errors: [],
            renderKey: 0
        }
    },
    mounted() {
        // You should be able to modify the URL based on what the current route is.
        axios.get("http://localhost/milestone6.1/src/db/getUserListings.php/")
        .then(response => {
            this.listings = response.data
            console.log(response.data)
        })
        .catch(function (error) {
            this.errors.push(error)
        })
    },
    methods: {
        deleteListing: function(id) {
            console.log("Delete this thing with the following ID: " + id)

            axios.post('http://localhost/milestone6.1/src/db/deleteUserListing.php', {
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
        profile: function() {
            if(this.$route.fullPath == "/user/myListings") {
                return true
            } else {
                return false
            }
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