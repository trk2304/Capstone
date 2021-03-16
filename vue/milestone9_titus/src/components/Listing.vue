<template>
    <v-card
      class="mx-auto d-flex flex-column"
      max-width="400"
    >
      <v-img
        class="white--text align-end"
        width="400px"
        max-height="300px"
        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
      >
        <v-card-title>{{this.listing.productName}}</v-card-title>
      </v-img>

      <v-card-subtitle class="pb-0">
        {{this.listing.price}}  |  {{this.listing.category}}  |  Sold By: {{this.listing.userID}}
      </v-card-subtitle>

      <br>
      <v-card-text class="text--primary">
        <div>{{this.listing.description}}</div>
      </v-card-text>

      <v-spacer></v-spacer>

      <v-card-actions>
        <v-btn
          color="primary"
          text
          :to="'/listingView/' + this.listing.listingID"
        >
          View Listing
        </v-btn>

        <v-btn
          v-if="this.listing.userID != this.$store.getters.getUser"
          color="primary"
          text
          :to="'/viewUser/' + this.listing.userID"
        >
          View User
        </v-btn>
      </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: 'Listing',
  props: ['listing']
}
</script>

<style scoped>

</style>
