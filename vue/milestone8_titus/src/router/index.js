import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/user',
    name: 'User',
    component: () => import('../views/User.vue'),
    children: [
      {
        path: 'overview',
        component: () => import('../components/Overview.vue')
      },
      {
        path: 'myListings',
        component: () => import('../components/MyListings.vue')
      },
      {
        path: 'myMessages',
        component: () => import('../components/MyMessages.vue')
      },
      {
        path: 'mySettings',
        component: () => import('../components/ProfileSettings.vue')
      }
    ]
  },
  {
    path: '/listings',
    name: 'Listings',
    component: () => import('../views/Listings.vue')
  },
  {
    path: '/listingView/:id',
    name: 'ListingView',
    component: () => import('../views/ListingView.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})



export default router
