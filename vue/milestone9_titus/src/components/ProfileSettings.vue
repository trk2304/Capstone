<template>
    <div>
        <h1>Profile Settings</h1>

        <br><br>
        <EditProfile/>
        <br><br>
        <UploadProfilePic/>
    </div>
</template>

<script>
import EditProfile from './EditProfile.vue'
import UploadProfilePic from './UploadProfilePic.vue'
export default {
    name: 'ProfileSettings',
    components: {
        EditProfile,
        UploadProfilePic
    }
}
</script>

<style scoped>
.sectionHeader {
    text-align: center;
    margin-bottom: 10px;
}
</style>
