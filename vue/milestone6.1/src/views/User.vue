<template>
    <div>
        <v-container>
            <ProfileNav/>
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
    width: 85%;
    padding: 2rem;
}

@media only screen and (max-width: 1200px) {
    .main {
        width: 72%;
    }
}

</style>