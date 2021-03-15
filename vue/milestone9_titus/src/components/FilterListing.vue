<template>

<v-container>

  <v-row>
    <v-radio-group
      v-model="category"
      row
    >
      <v-radio
        label="Tech"
        value="tech"
        name="category"
      ></v-radio>
      <v-radio
        label="Books"
        value="books"
        name="category"
      ></v-radio>
      <v-radio
        label="Sports"
        value="sports"
        name="category"
       ></v-radio> 
       <v-radio
          label="Clothing"
          value="clothing"
          name="category"
        ></v-radio>
        <v-radio
          label="Gaming"
          value="gaming"
          name="category"
        ></v-radio>
        <v-radio
          label="Misc"
          value="misc"
          name="category"
        ></v-radio>
        <v-radio
          label="All"
          value="all"
          name="category"
        ></v-radio>
       <v-btn
        color="primary"
        @click="passFilter()"
       >Apply Filter</v-btn>
    </v-radio-group>

   
  </v-row>

</v-container>


</template>

<script>

export default {
  name: 'FilterListing',
  data() {
    return {
      category: ''
    }
  },
  methods: {
    passFilter: function() {
      console.log(this.category)
      this.$emit('applyFilter', this.category)
    }
  }
}
</script>

<style scoped>

</style>
