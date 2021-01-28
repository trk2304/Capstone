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
            <v-list-item-avatar>
              <!-- Image that will get pulled from db -->
              <img src="http://via.placeholder.com/300">
            </v-list-item-avatar>

            <v-list-item-content>
              <v-list-item-title>Custom Username</v-list-item-title>
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
        </v-list>

      </v-navigation-drawer>

      <router-view></router-view>
    </div>
    
</template>

<script>
export default {
    name: 'ProfileNav',
    data: () => {
      return {
          navs: [
              { 
                id: 1,
                navTitle: "Profile Overview",
                isActive: true,
                route: '/user/overview'
              },
              { 
                id: 2,
                navTitle: "Your Listings",
                isActive: false,
                route: '/user/myListings'
              },
              { 
                id: 3,
                navTitle: "Your Messages", 
                isActive: false,
                route: '/user/myMessages'
              }
          ]
      }
    }
}
</script>

<style scoped>
   .nav-item:hover {
       background: #FFCDD2;
    }
</style>