<template>
    <div>
        <v-container>
            <v-row justify="center">
                <v-col cols="12">
                    <h2>Change your Bio Here:</h2>

                    <v-form id="editBio" @submit.prevent="submitForm()">
                        <v-textarea
                            v-model.trim="bio"
                            placeholder="Place your new Bio here and click 'Submit' to commit changes."
                            :rules="['Required']"
                        ></v-textarea>
                            <v-btn
                                type="submit"
                                rounded
                                color="primary"
                                form="editBio"
                                :rules="['Required']"
                            >
                            Submit Changes
                            </v-btn>
                    </v-form>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "EditProfile",
    data() {
        return {
            bio: ''
        }
    },
    methods: {
        // The userID will need to be dynamic. Should depend on dynamic link at some point.
        submitForm: function() {

            if(this.bio != '') {
              axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/editBio.php?userID=" + this.$store.getters.getUser, {
                  bio: this.bio,
                  userID: this.$store.getters.getUser
              })
              .then(response => {
                  console.log(response.data)
                  alert('Bio successfully updated!')
              })
              .catch(function(error) {
                  console.log(error)
              })
            } else {
              alert('This field must not be empty');
            }
        }
    }
}
</script>

<style scoped>

</style>
