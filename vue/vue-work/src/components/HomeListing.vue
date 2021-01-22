<template>
    <div vue-if="listings.length">
        <div v-for="listing in listings" v-bind:key="listing">
            <div class="card">
                <div class="card-body">
                    <h4>{{listing.itemName}} | Price:{{listing.itemPrice}}</h4>

                    
                    <p class="card-text"><b>Description:</b> {{listing.description}}</p>
                    <p class="text-muted">Posted by {{listing.seller}} on {{listing.datePosted}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
import firebase from 'firebase'
export default {
    name: 'HomeListing',
    data() {
        return {
            listings: []
        }
    },
    methods: {
        
        getListings: function() {

            const vueinstance = this;

            let db = firebase.firestore();
            let listingArray = [];
            db.collection('listings').get().then(function(querySnapshot) {
                querySnapshot.forEach(function(doc) {
                    let listing = doc.data();
                    listingArray.push(listing);
                });
                console.log(typeof(listings));
                console.log(listingArray);
                vueinstance.listings = listingArray;
            });
        }
    },
    beforeMount() {
        this.getListings()
    }
}
</script>