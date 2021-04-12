<template>

<div class="content">

<v-container>

    <div class="d-flex justify-center">
      <v-avatar
      size="150"
      class="mb-6"
      >
        <img v-if="this.imageExists" :src="this.imageLink" alt="Profile pic link is broken."/>
        
        <span v-else>M</span>
        
      </v-avatar>
    </div>
    <div class="welcome">
      <h1 class="display-1">Overview of {{this.reviewedUser[0].userID}}</h1>
      <br>
      <h3>About {{this.reviewedUser[0].userID}}:</h3>
      <p>{{this.reviewedUser[0].bio}}</p>
    </div>
    <br><br>

    <div class="reviews">
    <h2 class="reviewsHeader">Reviews about {{this.reviewedUser[0].userID}}</h2>
    <br>
    <br>
    <v-row v-if="this.anyReviews == true">
      <Review v-for="review in reviews" :key="review.reviewID" :review="review" />
    </v-row>

    <v-row v-else>
      <p id="noReviews">No reviews about {{this.reviewedUser[0].userID}} yet.</p>
    </v-row>

    </div>
  
    <br><br>

    <br><br><br><br>
    <div class="addReview">
      <AddReview v-if="this.$store.getters.getUser != this.reviewedUser[0].userID"/>
    </div>

</v-container>



</div>

</template>

<script>
import axios from 'axios'
import Review from '../components/Review.vue'
import AddReview from '../components/AddReview.vue'
export default {
  name: 'UserReview',
  components: {
    AddReview,
    Review
  },
  data() {
    return {
      reviewedUser: [],
      imageExists: null,
      imageLink: null,
      reviews: [],
      anyReviews: true
    }
  },

  created() {

    // Authentication check
    if(this.$store.getters.getUser == null || this.$store.getters.getUser == undefined) {
        window.location.href = "http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/lib_auth_usna.php"         }

    axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getUser.php?userID=" + this.$route.params.id)
    .then(response => {
      this.reviewedUser = response.data
      if(this.reviewedUser[0].profilePic === undefined || this.reviewedUser[0].profilePic === null) {
        this.imageExists = false
      } else {
        this.imageExists = true
        this.imageLink = require("../images/" + this.reviewedUser[0].profilePic)
      }

      // Get the rest of the reviews ABOUT this user
      axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getReviewsOfThisUser.php?id=" + this.reviewedUser[0].userID)
      .then(result => {
        if(result.data != "No rows")
          this.reviews = result.data
        else
          this.anyReviews = false
          
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

.content {
  margin-top: 2rem;
}

.welcome {
  text-align: center;
}

#noReviews {
  text-align: center;
  margin: auto;
}

.reviewsHeader {
  text-align: center;
  margin: auto;
}

</style>
