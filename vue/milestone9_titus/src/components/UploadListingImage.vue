<template>
  <v-dialog max-width="600px">
    <template v-slot:activator="{on, attrs}">
    <v-btn color="primary" text v-bind="attrs" v-on="on">Upload Image</v-btn>
    </template>
    <v-card>
      <v-card-title>
        <h2>Upload Image For: {{this.listing.productName}}</h2> 
      </v-card-title>

      <v-card-text>
          <v-form>
            <v-container>
              <p>You can upload an image of the product you're selling here. You may only upload one image at a time</p> 
            
              <v-row>
                <v-col cols="12">
                  <v-form>
                    <v-file-input
                      v-model="fileInput"
                      label="Click Here to Browse Files"
                      counter
                      :rules="['Required']"
                    ></v-file-input>
                  </v-form>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
      </v-card-text>
 
      <v-card-actions>
        <v-btn
          color="primary"
          @click="checkAndSubmit()"  
        >
          Upload Image
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog> 
</template>

<script>
import axios from 'axios';
export default {
  name: 'UploadListingImage',
  props: ['listing'],
  data() {
    return {
      data: this.listing,
      fileInput: '',
      validTypes: ["image/jpg", "image/jpeg", "image/png"]
    }
  },
  methods: {
    checkAndSubmit: function() {
      if(this.validTypes.includes(this.fileInput.type)) {
        console.log("Successful upload")
      } else {
        alert('You attempted to upload an image file with an invalid type. Clear the field and try uploading a PNG, JPG, or JPEG')
      }

      // Now check the number of images related to this listing.
      axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getImageCountByListing.php?id=" + this.listing.listingID)
      .then(result => {
         let imagesInDB = result.data.payload[0].count
         
         if(imagesInDB == 3) {
           alert('You may not have more than 3 images associated with this listing at a time') 
         } else {

           // If I made it this far, then I'm good to insert a new image.
           const fd = new FormData();
           fd.append('image', this.fileInput, this.fileInput.name)
           fd.append('listingID', this.listing.listingID)
           axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/handleListingImage.php", fd)
           .then(result => {
             if(result == "Could not upload image")
                alert(result)
             else
                alert("Image successfully uploaded")
             })
           .catch(e => {
             console.log(e)
            })
         }
      })
      .catch(e => {
        console.log(e)
      }) 

     
    } 
  }
}
</script>

<style scoped>

</style>
