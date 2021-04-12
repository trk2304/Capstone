<template>
    <v-container>
 
      <br> 
      <h1 class="display-1">Explore Listings on MidTrade Now</h1>

      <div>
        <FilterListing @applyFilter="setFilter"/>
      </div>

      <v-row>
          <Listing     
            v-for="listing in listings"
            :listing="listing"
            :key="listing.listingID"
            class="listing"
          />
      </v-row>

    </v-container>
</template>

<script>
import axios from 'axios'
import FilterListing from '../components/FilterListing.vue'
import Listing from '../components/Listing.vue'
export default {
  name: 'Listings',
  components: {
    FilterListing,
    Listing
  },
  data() {
    return {
      category: '',
      listings: ''
    }
  },
  methods: {
    setFilter: function(value) {
      if(value == '') {
        alert("You can only apply a filter once you have chosen one.")
      } else if (value == 'all') {
        axios.get('http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getAllListings.php')
        .then(result => {
           this.listings = result.data
        })
        .catch(e => {
          console.log(e)
        })
      } else {
         this.category = value
          axios.get("http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getListingByCategory.php?category=" + this.category)
          .then(result => {
            if(result.data == "No rows")
              alert("Sorry, there currently aren't any items in this category.")
            else { 
              this.listings = result.data
              this.$forceUpdate()
            }
          })
          .catch(e => {
            console.log(e)
          })
      }
    }
  },
  created() {

    // Authentication Check
    if(this.$store.getters.getUser == null || this.$store.getters.getUser == undefined) {
        window.location.href = "http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/lib_auth_usna.php"         }

    axios.get('http://midn.cs.usna.edu/MidTrade/Capstone/vue/milestone9_titus/src/db/getAllListings.php')
    .then(result => {
       this.listings = result.data
       console.log(this.listings)
    })
    .catch(e => {
      console.log(e)
    })
  }
}
</script>

<style scoped>
.listing {
  margin-top: 2rem;
  margin-bottom: 2rem;
}
</style>

