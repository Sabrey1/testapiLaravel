// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/Home.vue';
import ProductList from '@/Product/ProductList.vue';
import NotFound from '@/NotFound.vue'; // import 404 component
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/product-list',
    name: 'ProductList',
    component: ProductList
  },
  { path: '/:pathMatch(.*)*', 
    name: 'NotFound', 
    component: NotFound } 
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

export default router;
