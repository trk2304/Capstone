<template>


    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Edit Review
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Edit Review of: {{review.reviewedUserID}}</span>
        </v-card-title>

        <v-form>
          <v-container>
          <v-row>
            <v-col cols="12">
              <v-text-field
                label="Title"
                v-model.trim="review.title"
                :rules="['Required']"
              ></v-text-field>
            </v-col>
          </v-row>

          <v-row>
            <v-col cols="12">
              <v-textarea
                label="Review"
                v-model.trim="review.description"
                :rules="['Required']"
              ></v-textarea>
            </v-col>
          </v-row>

          <v-radio-group
            v-model="review.rating"
            mandatory
            row
            label="Rating:" 
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
          </v-container>
        </v-form>
       
         
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialog = false"
          >
            Close
          </v-btn>
          
          <v-btn
            color="primary"
            text
            @click="editListing()"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
 
</template>

<script>
import axios from 'axios'
export default {
  name: 'EditReview',
  data() {
    return {
      dialog: false,
    }
  },
  props: ['review'],
  methods: {
    editListing: function() {
      if(this.review.title == '' || this.review.description == '')
        alert("Cannot submit form with empty fields.")
      else {
        axios.post("https://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/editReview.php", {
            reviewID: this.review.reviewID,
            title: this.review.title,
            description: this.review.description,
            rating: this.review.rating
        })
        .then(response => {
           console.log(response)
           this.dialog = false
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

</style>
