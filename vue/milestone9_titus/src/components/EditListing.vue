<template>
  <v-dialog 
    persistent
    v-model="dialog"
    max-width="800px">
    <template v-slot:activator="{on, attrs}">
    <v-btn color="primary" text v-bind="attrs" v-on="on">Edit Listing</v-btn>
    </template>
    <v-card>
      <v-card-title>
        <h2>Edit Listing: {{this.data.productName}}</h2> 
      </v-card-title>

      <v-card-text>
          <v-form>
          <v-container>
            <p>This listing's current details are currently pre-filled. You can individually select which portions you want to change, then finalize your changes. Don't change things that you don't need to!</p>
            <v-row>
              
              <v-col cols="9">
                <v-text-field
                  label="Product Name"
                  v-model.trim="listing.productName"
                  required
                  clearable
                >
                  
                </v-text-field>
              </v-col>
                
               <v-col cols="3">
                <v-text-field
                  label="Price"
                  v-model.trim="listing.price"
                  required
                  type="number"
                  clearable
                >
                </v-text-field>
              </v-col>
            </v-row>

            <v-row>
              <v-col cols="12">
                <v-textarea
                  label="Product Description"
                  v-model.trim="listing.description"
                  required
                  clearable
                >
                   
                </v-textarea>
              </v-col>
            </v-row>

            <v-row>
            
              <v-col cols="12" class="d-flex align-items:center">
                    <v-radio-group
                      label="Catgegory:"
                      v-model="listing.category"
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
    
      
          </v-container>
          </v-form>
      </v-card-text>
 
      <v-card-actions>
        <v-btn
          color="primary"
          text
          @click="checkAndSubmit()"  
        >
          Save Changes
        </v-btn>
  

        <v-btn
          color="primary"
          text
          @click="dialog=false"
        >
          Close
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog> 
</template>

<script>
import axios from 'axios';
export default {
  name: 'EditListing',
  props: ['listing'],
  data() {
    return {
      data: this.listing,
      productName: '',
      productPrice: '',
      productDescription:'',
      dialog: false
    }
  },

  methods: {
    checkAndSubmit: function() {
      if(this.listing.productName == null || this.listing.price == null || this.listing.description == null) {
        alert('Ensure all fields are filled out!') 
      } else {
         if(this.listing.price < 0) {
            this.listing.price = Math.abs(this.listing.price)
          }
          axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/editUserListing.php", {
            name: this.listing.productName,
            price: this.listing.price,
            description: this.listing.description,
            id: this.listing.listingID,
            category: this.listing.category
          })
          .then(response => {
            console.log(response)
            alert("Changes saved!");
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
