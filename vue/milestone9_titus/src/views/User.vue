<template>
    <div>
        <v-container>
            <ProfileNav/>
                
                <div v-if="this.$route.path == '/user'">
                    <br><br>
                    <h1 class="display-4">User Dashboard</h1>
                </div>
            <v-row class="main">
                <v-col cols="lg-12 md-7 sm-5">
                    <router-view></router-view>
                </v-col>
            </v-row>
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
.main {
    width: 80%;
    padding: 2rem;
}

@media only screen and (max-width: 1200px) {
    .main {
        width: 72%;
    }
}

</style>
