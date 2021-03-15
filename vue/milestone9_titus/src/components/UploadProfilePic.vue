<template>
    <div>
        <v-container>
            <v-row justify="center">
                <v-col cols="12">
                    <v-form id="uploadProfilePic" @submit.prevent="validateForm()">
                        <h2>Change Profile Picture:</h2>
                        <v-file-input
                            v-model="fileInput"
                            label="Click to Access File Browser:"
                            counter
                            clearable
                            :rules="['Required']"
                        ></v-file-input>
                        <br>
                        <v-btn
                            type="submit"
                            color="primary"
                            rounded
                            form="uploadProfilePic"

                        >
                            Upload This Picture
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
    name: "UploadProfilePic",
    data() {
        return {
            fileInput: '',
            validTypes: ["image/jpg", "image/jpeg", "image/png"]
        }
    },
    methods: {
        validateForm: function() {            
            if(this.validTypes.includes(this.fileInput.type)) {
                console.log("This is a valid file")
                console.log(this.fileInput)

                // Create formData object
                const fd = new FormData();
                fd.append('image', this.fileInput, this.fileInput.name)
                fd.append('userID', this.$store.getters.getUser)
                axios.post("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/handleProfileImage.php", fd)
                .then(result => {
                    if(result.data === "Could not upload image.") {
                        alert(result.data)
                    } else {
                        alert("Image uplaoded successfully!")
                    }
                })
                .catch(error => {
                    console.log(error)
                })

            } else {
                alert("The file you attempted to upload is an invalid type. Please clear the field and try uploading a PNG, JPG/JPEG.")
            }
        }
    }
}
</script>

<style scoped>

</style>
