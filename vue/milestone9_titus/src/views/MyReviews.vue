<template>
  <v-container>
    <h1>My Reviews</h1>
    
    <v-row>
      <Review 
              v-for="review in reviews"
              :key="review.reviewID" 
              :review="review"
              class="review"
      />
    </v-row>
    
    <!-- Need to be able to add, edit, and delete my own reviews -->
  </v-container>
</template>

<script>
import axios from 'axios'
import Review from '../components/Review.vue'
export default {
  name: 'MyReviews',
  components: {
    Review
  },
  data() {
    return { 
        reviews: [],
        average: ''
    }
  },
  created() {
    axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getUserReviews.php?id=" + this.$store.getters.getUser)
    .then(response => {
      this.reviews = response.data
    })
    .catch(e => {
      console.log(e)
    })
  }
}

</script>

<style scoped>
h1 {
  text-align: center;
  margin: auto;
}

.review {
  margin-top: 3rem;
}
</style>
