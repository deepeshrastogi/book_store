import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../views/customer/pages/DashboardView.vue';
import Books from '../views/customer/books/Books.vue'
import Book from '../views/customer/books/BookDetails.vue'

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard
  },
  {
    path: '/books',
    name: 'books',
    component: Books,
  },
  {
    path: '/book/:id',
    name: 'book',
    component: Book,
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
