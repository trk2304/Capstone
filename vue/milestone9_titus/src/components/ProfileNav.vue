<template>

    <div>
      <!-- This code is borrowed from the Vuetify documentation and modified to our needs -->
      <v-navigation-drawer
        absolute
        permanent
        right
      >
        <template v-slot:prepend>
          <v-list-item two-line>
            <v-list-item-avatar color="indigo" size="48">
              <!-- Image that will get pulled from db -->
              
               <span id="icon" class="white--text headline">M</span>
            </v-list-item-avatar>

            <v-list-item-content>
              <v-list-item-title>{{user[0].userID}}</v-list-item-title>
              <v-list-item-subtitle>User</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </template>

        <v-divider></v-divider>

        <v-list nav>
          <v-list-item
              v-for="item in navs"
              :key="item.id"
              class="nav-item"
              :to="item.route"
          >
              {{item.navTitle}}
          </v-list-item>

          <v-list-item
            class="nav-item"
            v-on:click="logout">
            Logout 
          </v-list-item>
        </v-list>

      </v-navigation-drawer>

      
    </div>
    
</template>

<script>
import axios from 'axios'
export default {
    name: 'ProfileNav',
    data: () => {
      return {
          navs: [
              { 
                id: 1,
                navTitle: "Profile Overview",
                isActive: true,
                route: 'overview'
              },
              { 
                id: 2,
                navTitle: "My Listings",
                isActive: false,
                route: 'myListings'
              },
              {
                id: 3,
                navTitle: "My Reviews",
                isActive: false,
                route: 'myReviews'
              },
              {
                id: 4,
                navTitle: "Profile Settings",
                isActive: false,
                route: 'mySettings'
              }
          ],
          user: ''
      }
    },
    created() {
      // Attempting to get the username to display in the Profile Nav.
        axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getUser.php?userID=" + this.$store.getters.getUser)
        .then(response => {
          this.user = response.data
        })
        .catch(e => {
          console.log(e)
        })
    },

    methods: {
      logout: function() {
        this.$store.commit('logout')
        window.location.href="http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/lib_auth_usna.php"
      }
    }
    
}
</script>

<style scoped>
   .nav-item:hover {
       background: #FFCDD2;
    }

    #icon {
      text-align: center;
      margin: auto;
    }
</style>
