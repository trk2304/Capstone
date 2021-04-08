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
    path: '/user/:id',
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
        path: 'mySettings',
        component: () => import('../components/ProfileSettings.vue')
      },
      {
        path: 'myReviews',
        component: () =>import('../views/MyReviews.vue')
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
  },
  {
    path: '/viewUser/:id',
    name: 'UserReview',
    component: () => import('../views/UserReview.vue')
  },
  {
    path: '/Login',
    name: 'Login',
    component: () => import('../components/Login.vue')

  }
]


const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})


export default router
