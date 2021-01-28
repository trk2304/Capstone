<template>
    <div>
        <v-container fluid>
            <ProfileNav/>
            
        </v-container>
    </div>
</template>

<script>
import ProfileNav from "../components/ProfileNav.vue"

export default {
    name: 'User',
    components: {
        ProfileNav
    }
}
</script>

<style scoped>

</style>