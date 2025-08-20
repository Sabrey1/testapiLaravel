// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/Home.vue';
import ProductList from '@/Product/ProductList.vue';
import Login from '@/Auth/Login.vue';
import Register from '@/Auth/Register.vue';
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
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register',
    name: 'Register',
    component: Register
  },
  { path: '/:pathMatch(.*)*', 
    name: 'NotFound', 
    component: NotFound } 
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

router.beforeEach((to, from, next) => {
  const username = localStorage.getItem("username") || "";
  const password = localStorage.getItem("password") || "";

  // Pages that don’t require login
  const publicPages = ["/login", "/register"];

  if (!publicPages.includes(to.path) && (username === "" || password === "")) {
    next("/login");
  } else {
    next();
  }
});


export default router;
