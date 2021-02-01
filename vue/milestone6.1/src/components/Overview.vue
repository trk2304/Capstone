<template>
    
    <div class="wrapper mt-12">

        <v-container>
            
            <div class="d-flex justify-center">
                <v-avatar
                    size="150"
                    class="mb-6"
                >
                    <img src="http://via.placeholder.com/300" alt="Profile Picture">
                </v-avatar>
            </div>

            <div class="welcome">
                <h1 class="display-1">Welcome to my Profile</h1>
                <br>
                <h3 @click="test()">About Me:</h3>
                <p>{{ user[0].bio }}</p>
            </div>

        </v-container>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Overview",
    // Add component for bio.
    data() {
        return {
            user: ''
        }
    },
    mounted() {
        axios.get("http://localhost/milestone6.1/src/db/getUser.php/")
        .then(response => {
            this.user = response.data
        })
        .catch(function(error) {
            console.log(error)
        })
    },
    methods: {
        test: function() {
            console.log(this.user)
        }
    }
}
</script>

<style scoped>
    .welcome {
        text-align: center;
    }

    /* .wrapper {
        margin-bottom: 
    } */
</style>