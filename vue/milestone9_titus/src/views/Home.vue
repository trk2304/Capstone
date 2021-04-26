<template>
  <div class="home">
    <!-- Create a container that holds the background image -->
    <!-- Must also include welcome page text -->
    <!-- Photo Credits
          Photo by Conner Baker on Unsplash -->

      <div class="hero-image">
        <v-container id="image-container">
          <h1 class="display-3 hero-text">Welcome To MidTrade</h1>
          <p class="lead">The trading hub for Midshipmen</p>
        </v-container>
      </div>

      <br>

      <div class="about_section">
        <v-container>
          <v-row>
            <v-col cols="12">
              <h1 class="display-2 sectionHeader">About MidTrade</h1>
            </v-col>
          </v-row>

          <br><br>   
 
          <v-row>
            <v-col cols="6" class="d-flex flex-column align-center columnText">
    
          <h2>What is MidTrade?</h2>
          <br>
          <p>MidTrade is a platform designed to allow Midshipmen from the Naval Academy to buy and sell their used items between each other. Rather than worry about having to make a trip to the MidStore, Uniform Store, or retailer off the yard, Mids can save money and reuse items by exchanging with one another!</p>

          <p>In 2017, MidTrade was a website hosted by a larger entity called 'My College Town', but shortly after gaining traction, the site vanished. Inspired by the previous iteration and enthralled with making the lives of Midshipmen more and more convenient, our team decided to bring MidTrade back to life, with the hope of hosting it permanently on the Intranet.</p>

            </v-col>

            <v-col cols="6">
              <img src="https://www.armytimes.com/resizer/jmJaKdIodb-oJ6xOxeu_CWYtQPw=/1200x0/filters:quality(100)/cloudfront-us-east-1.images.arcpublishing.com/mco/K5S6YHRRSBEJHLKMVCOQ6EIJQE.jpg" class="columnImage" alt="Plebe Summer">
            </v-col>
          </v-row>

          <br><br><br><br>

          <v-row>
            <v-col cols="12">
              <h1 class="display-2 sectionHeader">Contact the Developers</h1>
              <br>
            </v-col>
          </v-row>
      
          <v-row>
            <v-col cols="3">
              <v-card class="mx-auto" height="100%">
                <v-img src="https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2021/M213438.jpg"></v-img>
                <v-card-title>Titus Kilpatrick</v-card-title>

                <v-card-subtitle>Email: <a target="_blank" href="https://mail.google.com/mail/u/0/?fs=1&to=m213438@usna.edu&tf=cm"> m213438@usna.edu</a></v-card-subtitle>

                <v-card-text>Titus Kilpatrick is from Greensboro, North Carolina, and service selected submarines. He studied Information Technology at the Naval Academy, and is a member of 8th Company. His hobbies include studying web development technologies, practicing Judo, and pc gaming.</v-card-text>
              </v-card>
            </v-col>

            <v-col cols="3">

              <v-card class="mx-auto" height="100%">
                <v-img src="https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2021/M210738.jpg"></v-img>
                <v-card-title>Chloe Bryan</v-card-title>

                <v-card-subtitle>Email: <a target="_blank" href="https://mail.google.com/mail/u/0/?fs=1&to=m210738@usna.edu&tf=cm">m210738@usna.edu</a></v-card-subtitle>

                <v-card-text>Chloe Bryan is from Fuquay-Varina, NC, and service selected NFO. She studied Computer Science here at USNA and is a proud member of 28th company, and 2nd company (ret).  Her hobbies include running marathons, canoeing, outdoor activities, and gardening.  Her favorite part about midTrade is selling sports equipment.</v-card-text>
              </v-card>
            </v-col>

            <v-col cols="3">
              <v-card class="mx-auto" height="100%">
                <v-img src="https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2021/M215934.jpg"></v-img>
                <v-card-title>Tom Savarese</v-card-title>

                <v-card-subtitle>Email: <a target="_blank" href="https://mail.google.com/mail/u/0/?fs=1&to=m215934@usna.edu&tf=cm">m215934@usna.edu</a></v-card-subtitle>

                <v-card-text>
                Tom Savarese is a young computer scientist from Shelton, CT. Prior to attending USNA he was a Navy Nuclear Electronics Technician. After graduation he will be attending Nuclear Power School in Charleston, SC to become a submarine officer.
                </v-card-text>
              </v-card>

            </v-col>

            <v-col cols="3">

              <v-card class="mx-auto" height="100%">
                <v-img src="https://usna.blackboard.com/bbcswebdav/orgs/DEPTCSERV/Midn%20Photos/2021/M212262.jpg"></v-img>
                <v-card-title>Ed Gomez</v-card-title>

                <v-card-subtitle>Email: <a target="_blank" href="https://mail.google.com/mail/u/0/?fs=1&to=m212262@usna.edu&tf=cm">m212262@usna.edu</a></v-card-subtitle>

                <v-card-text>
                  Ed Gomez comes from the distant land of San Clemente, CA and he service selected Submarines. This Computer Science major enjoys playing guitar and long walks on the beach while listening to Careless Whisper.  
                </v-card-text>
              </v-card>

            </v-col>
          </v-row>

        </v-container>
      </div> 
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  name: 'Home',
  data() {
    return {
      listings: []
    }
  },
  created() {
    
    //This line checks to see if a user is even logged in. If not, they get booted to the login page.
    if(this.$store.getters.getUser == undefined && this.$route.query.user == null && this.$route.query.token == null) {
        window.location.href = "http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/lib_auth_usna.php"         }

    axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getHomeListings.php")
    .then(result => {
      this.listings = result.data
    })
    .catch(e => {
      console.log(e)
    })

    //Set the user and token in the store since this is the first stop after login.
    if(this.$store.getters.getUser == null) {
      this.$store.commit('setUser', this.$route.query.user)
      this.$store.commit('setToken', this.$route.query.token)
      this.$store.commit('setFirstName', this.$route.query.firstName)
      this.$store.commit('setLastName', this.$route.query.lastName)
    }

  }
}
</script>

<style scoped>
/* Hero Image CSS borrowed from w3schools. */
.hero-image {
  
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/blueangels_hero.jpg");

  height: 50vh;

  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

p.lead {
  text-align: center;
  position: absolute;
  top: 60%;
  left: 44%;
  color: white;
}

.sectionHeader {
  text-align: center;
}

.columnImage {
  max-width: 100%;
  max-height: 100%;
}

.columnText {
  padding-top: 10%;
  padding-bottom: 10%;
}

.devImage {
  border-radius: 25px;
}
</style>
