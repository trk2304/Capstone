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

    <div class="reviews">

    </div>

    <div class="addReview">
      <AddReview v-if="this.$store.getters.getUser != this.reviewedUser[0].userID"/>
    </div>

</v-container>



</div>

</template>

<script>
import axios from 'axios'
import AddReview from '../components/AddReview.vue'
export default {
  name: 'UserReview',
  components: {
    AddReview
  },
  data() {
    return {
      reviewedUser: [],
      imageExists: null,
      imageLink: null
    }
  },

  created() {
    axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getUser.php?userID=" + this.$route.params.id)
    .then(response => {
      this.reviewedUser = response.data
      if(this.reviewedUser[0].profilePic === undefined || this.reviewedUser[0].profilePic === null) {
        this.imageExists = false
      } else {
        this.imageExists = true
        this.imageLink = require("../images/" + this.reviewedUser[0].profilePic)
      }
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

</style>
