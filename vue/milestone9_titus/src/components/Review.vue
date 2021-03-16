<template>

<v-card class="mx-auto"
    width="500px"
>
    <v-card-title>
      {{this.review.title}}
    </v-card-title>
    <v-card-subtitle>
      Posted by {{this.review.userID}} on {{this.review.uploadDate}}
    </v-card-subtitle>


    <v-card-actions>
      <v-btn
        @click="show = !show"
        color="primary"
      >
        {{ show ? 'Minimize' : 'Read Description' }}
      </v-btn>
      
      <v-spacer></v-spacer>
      <EditReview :review="this.review" v-if="this.review.userID == this.$store.getters.getUser" />
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text>
          {{this.review.description}}
          <br><br>
          <b>Rating: {{this.review.rating}} Star</b>
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
</template>

<script>

// You'll need to import components for editinand deleting reviews.
import EditReview from './EditReview'
export default {
  name: 'Review',
  props: ['review'],
  components: {
    EditReview     
  },
  data() {
    return {
      show: false,
    }
  },
  created() {
    let t = this.review.uploadDate.split(/[- :]/)
    let d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]))
    console.log(d.toString())
    let split = d.toString().split(" ")
    this.review.uploadDate = split[0] + " " + split[1] + " " + split[2] + " " + split[3]
  }
}
</script>

<style scoped>

</style>
