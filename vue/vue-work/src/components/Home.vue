<template>
    <div class="home">
        <Navbar></Navbar>
        <div class="jumbotron">
            <h1 class="display-4">The MidTrade Home Page</h1>
            <p class="lead">
                The hub for every Midshipman's trading needs.
            </p>
            <hr class="my-4" />
            <p>
                You can access your user dashboard by clicking the button below!
            </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">My Dashboard</a>

        </div>

        <br>

        <HomeListing></HomeListing>
    </div>
</template>

<script>
import Navbar from './Navbar.vue'
import HomeListing from './HomeListing.vue'
export default {
    name: 'Home',
    props: {
        msg: String
    },
    components: Navbar, HomeListing
}
</script>