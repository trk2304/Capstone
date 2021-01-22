import Vue from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'jquery'
import 'jquery/dist/jquery.min.js'
import 'popper.js'
import 'popper.js/dist/popper.min.js'
import firebase from 'firebase'

// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyB2fHb1VO2F7AtNTUrA1B1Vkbvf7zpj5lI",
  authDomain: "midtrade-29962.firebaseapp.com",
  databaseURL: "https://midtrade-29962.firebaseio.com",
  projectId: "midtrade-29962",
  storageBucket: "midtrade-29962.appspot.com",
  messagingSenderId: "237952603407",
  appId: "1:237952603407:web:431aec22be1d066c6fda7a",
  measurementId: "G-NWC38TX0X0"
};

firebase.initializeApp(firebaseConfig);

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
