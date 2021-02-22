<template>
    
    <div class="wrapper mt-12">

        <v-container>
            
            <div class="d-flex justify-center">
                <v-avatar
                    size="150"
                    class="mb-6"
                >
                    <img v-if=" this.user[0] " :src="this.imageLink" alt="Profile Picture Link is broken" :key="this.imageLink">

                    <img v-else src="https://via.placeholder.com/150" alt="Placeholder Profile Picture" :key="this.imageLink">
                </v-avatar>
            </div>
            <div class="welcome">
                <h1 class="display-1">Welcome to my Profile</h1>
                <br>
                <h3>About Me:</h3>
                <p>{{ user[0].bio }}</p>
            </div>

        </v-container>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Overview",
    data() {
        return {
            user: '',
            imageLink:''
        }
    },
    beforeMount() {
        axios.get("http://localhost/milestone7/src/db/getUser.php/")
        .then(response => {
            this.user = response.data
            if(this.user[0].profilePic === undefined || this.user[0].profilePic === null || this.user[0].profilePic == "") {
                this.imageLink = "https://via.placeholder.com/150"
            } else {
                this.imageLink = require("../images/" + this.user[0].profilePic)
            }
        })
        .catch(function(error) {
            console.log(error)
        })
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