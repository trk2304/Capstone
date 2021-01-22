<template>
    <div class="dashboard">
        <!-- Not sure why the nav isn't showing here -->
        <Navbar></Navbar>

        
        
        <div class="container">
            <h1 class="display-4">Welcome to your User Dashboard</h1>

            <br>

            <h2>Add a new Listing</h2>

            <br>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Item Name..." ref="itemName" required>
            </div>

            <div class="form-group">
                <input type="number" class="form-control" step=".01" min="0" max="1000" placeholder="Item Price..." ref="itemPrice" required>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Username..." ref="seller">
            </div>

            <div class="form-group">
                <textarea ref="description" class="form-control" placeholder="Description of item..." required></textarea>
            </div>

            <button id="addListing" class="btn btn-primary" v-on:click="addListing">Add New Listing</button>
        </div>
    </div>
</template>

<style scope>

h1 {
    margin-bottom: 3rem;
}

.container {
    text-align: center;
    margin-top: 3rem;
}
</style>

<script>
import Navbar from '@/components/Navbar.vue'
export default {
    name: 'Dashboard',
    component: Navbar,
    methods: {
        addListing: function() {
            console.log(this.$refs.seller.value);
        }
    }
}
</script>