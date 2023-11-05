import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/customer/pages/DashboardView.vue';
import Books from '../views/customer/books/Books.vue'
import Book from '../views/customer/books/BookDetails.vue'
import Login from '../views/auth/Login.vue'
import Signup from '../views/auth/Signup.vue'
import store from '../store/store'
import {IS_USER_AUTHENTICATE_GETTER} from '../store/storeConstants'
import { nextTick } from 'vue';

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard,
    meta:{auth:true}
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta:{auth:false}
  },
  {
    path: '/signup',
    name: 'signup',
    component: Signup,
    meta:{auth:false}
  },
  {
    path: '/books',
    name: 'books',
    component: Books,
    meta:{auth:true}
  },
  {
    path: '/book/:id',
    name: 'book',
    component: Book,
    meta:{auth:true}
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

router.beforeEach((to, from, next) => {
  if('auth' in to.meta && to.meta.auth && !store.getters[`auth/${IS_USER_AUTHENTICATE_GETTER}`]){
      next('/login');
  }else if('auth' in to.meta && !to.meta.auth && store.getters[`auth/${IS_USER_AUTHENTICATE_GETTER}`]){
      next('/');
  }else{
    next();
  }
});

export default router
