<template>
    <div class="auth">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h1 class="display-4">Welcome to MidTrade!</h1>
                
                    <hr><br>

                    <h4>Click the button below to log in with Google!</h4>

                    <div class="form-group">
                        <button v-on:click="userLogin" class="btn btn-primary">Sign In With Google</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.auth {
    margin-top: 11rem;
    text-align: center;
}

h1 {
    margin-bottom: 1rem;
}

h2 {
    margin-bottom: 2rem;
}
</style>

<script>

import firebase from 'firebase'

export default {
    name: 'Login',
    methods: {
        userLogin() {
            let vueinstance = this;
            let provider = new firebase.auth.GoogleAuthProvider();
            firebase.auth()
            .signInWithPopup(provider)
            .then(function(result) {
                var token = result.credential.accessToken
                var user = result.user;
                console.log(token + " " + user)
                
                // Need to figure out how to redirect to unique user profile.
                alert('User Google Account Recognized');
                vueinstance.$router.replace('/dashboard');
            })
            .catch(function(error) {
                var errorCode = error.code;
                var message = error.message;
                var email = error.email;
                var credential = error.credential;

                console.log(errorCode + " " + message + " " + email + " " + credential)
            }) 
        } 


    }
}
</script>