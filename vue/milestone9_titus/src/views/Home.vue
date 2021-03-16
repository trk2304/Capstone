<template>
  <div class="home">
    <!-- Create a container that holds the background image -->
    <!-- Must also include welcome page text -->
    <!-- Photo Credits
          Photo by Conner Baker on Unsplash -->

      <div class="hero-image">
        <v-container id="image-container">
          <h1 class="display-3 hero-text">Welcome To MidTrade</h1>
          <p class="lead">The trading hub for Midshipmen</p>
        </v-container>
      </div>

      <br>

      <div class="recentListings">
        <v-container>
            <h1 class="display-2 sectionHeader">Most Recent Listings</h1>
            <br><br>
            <div class="block">
                  <v-container class="listingBlocks">
                      <v-row class="d-flex justify-space-around" v-if="!(this.listings === undefined) && this.listings.length != 0 && this.listings != 'No rows'">
                        <v-card 
                            v-for="listing in listings"
                            :key="listing.listingID"
                            width="350"
                            class="listingCard"
                        >
                        
                              <v-card-title class="listingTitle">{{ listing.productName }} - ${{listing.price}}</v-card-title>

                          <v-card-subtitle class="pb-10 listingDescription">
                              {{ listing.description }}
                          </v-card-subtitle>
                          <v-spacer></v-spacer>
                          <v-card-actions class="card-actions">
                              <v-btn
                                  color="primary"
                                  text
                                  :to="'/listingView/' + listing.listingID"
                              >
                                  View Listing
                              </v-btn>
                          </v-card-actions>
                        </v-card>
                      </v-row>

                <div v-else>
                    <h3>There are no listings.</h3>
                </div>

                <br>
                </v-container>
          </div>
        </v-container>
      </div>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  name: 'Home',
  data() {
    return {
      listings: []
    }
  },
  created() {
    axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getAllListings.php")
    .then(result => {
      this.listings = result.data
    })
    .catch(e => {
      console.log(e)
    })

    //Set the user and token in the store since this is the first stop after login.
    if(this.$store.getters.getUser == null) {
      this.$store.commit('setUser', this.$route.query.user)
      this.$store.commit('setToken', this.$route.query.token)
    }

  }
}
</script>

<style scoped>

.hero-image {
  /* Use "linear-gradient" to add a darken background effect to the image (photographer.jpg). This will make the text easier to read */
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/blueangels_hero.jpg");

  /* Set a specific height */
  height: 50vh;

  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

p {
  text-align: center;
  position: absolute;
  top: 60%;
  left: 44%;
  color: white;
}

.sectionHeader {
  text-align: center;
}

.listingTitle {
    color: black;
}

.listingBlocks {
    margin-top: 3rem;
}

.listingCard {
    margin: 1.0rem;
}

.listingDescription {
  color: black !important;
}

.card-actions {
  position: absolute;
  bottom: 0;
}

/** 
  NEED TO LOOK INTO CUTTING OFF THE OVERFLOW TEXT IF A DESCRIPTION IS TOO LONG.
 */
</style>
