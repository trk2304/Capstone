<template>
    
    <div>
        <h1>These are my listings</h1>
        <ListingBlock/>
    </div>

</template>

<script>
import ListingBlock from './ListingBlock.vue'
export default {
    name: "MyListings",
    components: {
        ListingBlock
    }
}
</script>