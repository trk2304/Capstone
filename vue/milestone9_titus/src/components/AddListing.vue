<template>
    <div>
        <v-container>
            <v-form ref="form" @submit.prevent="submitForm()" id="add-listing">
                <v-row justify="center">
                    <v-col cols="6">
                        <v-text-field
                            v-model.trim="productName"
                            label="Product Name"
                            outlined
                            clearable
                            :rules="['Required']"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model.trim="productPrice"
                            label="Price"
                            outlined
                            type="number"
                            mask="##.##"
                            clearable
                            :rules="['Required']"
                        ></v-text-field>
                    </v-col>
                </v-row>

                <v-row justify="center">
                    <v-col cols="12">   
                        <v-textarea
                            clearable
                            auto-grow
                            placeholder="Product Description"
                            v-model.trim="productDescription"
                            :rules="['Required']"
                        ></v-textarea>
                    </v-col>
                </v-row>

                <v-row justify="center">
                  <v-col cols="12" class="d-flex align-items:center">
                    <v-radio-group
                      v-model="category"
                      row
                      mandatory
                    >
                      <v-radio
                        label="Tech"
                        value="tech"
                        name="category"
                      >
                      </v-radio>
                       <v-radio
                        label="Books"
                        value="books"
                        name="category"
                      >
                      </v-radio>
                      <v-radio
                        label="Sports"
                        value="sports"
                        name="category"
                      >
                      </v-radio>
                      <v-radio
                        label="Clothing"
                        value="clothing"
                        name="category"
                      >
                      </v-radio>
                      <v-radio
                        label="Gaming"
                        value="gaming"
                        name="category"
                      >
                      </v-radio>
                       <v-radio
                        label="Miscellaneous"
                        value="misc"
                        name="category"
                      >
                      </v-radio>
                    </v-radio-group>
                  </v-col>
                </v-row>

                <v-row justify="center">
                    <v-col cols="1">
                        <v-btn
                            rounded
                            color="primary"
                            dark
                            type="submit"
                            form="add-listing"
                        >
                        Submit
                        </v-btn>
                    </v-col>
                </v-row>

            </v-form>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'AddListing',
    data() {
        return {
                productName: '',
                productPrice: '',
                productDescription: '',
                category: ''
        }
    },
    methods: {
        submitForm: function() {
           if(this.productName != '' && this.productPrice != '' && this.productDescription != '') {
            
             //Negative number check
             if(this.productPrice < 0) {
               this.productPrice = Math.abs(this.productPrice)
             }
             axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/addUserListing.php/", {
                  productName: this.productName,
                  productPrice: this.productPrice,
                  productDescription: this.productDescription,
                  userID: this.$store.getters.getUser,
                  category: this.category
              }).then(response => {
                  console.log(response);
                  alert('Listing successfully added!')
              })

              this.productName = ''
              this.productPrice = ''
              this.productDescription = ''
              window.location.reload()
            } else {
              alert('Ensure all fields are filled out.')
            }
        }
    }
}
</script>

<style scoped>

</style>
