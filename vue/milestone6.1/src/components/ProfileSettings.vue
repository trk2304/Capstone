<template>
    <div>
        <h1>Profile Settings</h1>

        <br><br>
        <h2 class="sectionHeader">Add a new Listing w/ The Form Below</h2>
        <AddListing/>
        <br><br>
        <EditProfile/>
    </div>
</template>

<script>
import AddListing from './AddListing.vue'
import EditProfile from './EditProfile.vue'
export default {
    name: 'ProfileSettings',
    components: {
        AddListing,
        EditProfile
    }
}
</script>

<style scoped>
.sectionHeader {
    text-align: center;
    margin-bottom: 10px;
}
</style>