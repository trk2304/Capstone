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
                productDescription: ''
        }
    },
    methods: {
        submitForm: function() {
           axios.post("http://localhost/milestone6.1/src/db/addUserListing.php/", {
                productName: this.productName,
                productPrice: this.productPrice,
                productDescription: this.productDescription
            }).then(response => {
                console.log(response);
                alert('Listing successfully added!')
            })
            
        }
    }
}
</script>

<style scoped>

</style>