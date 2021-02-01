<template>
    <div>
        <v-text-field
            v-model="message"
        ></v-text-field>

        <p>{{this.message}}</p>

        <v-btn @click="showText()">
            Display
        </v-btn>
    </div>
</template>

<script>
export default {
    name: "Test",
    data() {
        return {
            message: ''
        }
    },

    methods: {
        showText: function() {
            console.log(this.message)
        }
    }
}
</script>