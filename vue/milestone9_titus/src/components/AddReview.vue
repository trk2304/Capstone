<template>
  <v-container>
    <v-row>
      <v-col cols="12">
        <h3>Had a Transaction with XXX? Let others know how it when!</h3>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="12">
        <v-form>
          <v-text-field
            label="Title"
            :rules="['Required']"
            v-model.trim="title"
            clearable
            outlined
          ></v-text-field>

          <v-textarea
            label="Review Body"
            :rules="['Required']"
            v-model.trim="description"
            clearable
            outlined
            auto-grow
            placeholder="I give this guy 5 stars!..."
          >
          </v-textarea>

          <v-radio-group
            v-model="rating"
            row
            mandatory
            label="Rating"
          >
            <v-radio
              label="1"
              value="1"
              name="rating"
            ></v-radio>
            <v-radio
              label="2"
              value="2"
              name="rating"
            ></v-radio>
            <v-radio
              label="3"
              value="3"
              name="rating"
            ></v-radio>
            <v-radio
              label="4"
              value="4"
              name="rating"
            ></v-radio>
            <v-radio
              label="5"
              value="5"
              name="rating"
            ></v-radio>
          </v-radio-group>

          <v-btn
            @click="addReview()"
            color="primary"
          >
            Submit Review
          </v-btn>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios'
export default {
  name: 'AddReview',
  data() {
    return {
      title: '',
      description: '',
      rating: ''
    }
  },
  methods: {
    addReview: function() {
      if(this.title == '' || this.description == '' ) {
        alert("You can't submit an empty review. Fill out all fields!")
      } else {
        axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/addReview.php", {
          userID: this.$store.getters.getUser,
          title: this.title,
          description: this.description,
          rating: parseInt(this.rating),
          reviewedUserID: this.$route.params.id
        })
        .then(response => {
          console.log(response.data)
        })
        .catch(e => {
          console.log(e)
        })
      }
    }
  }
}
</script>

<style scoped>
h3 {
  text-align: center;
  margin: auto;
}
</style>
