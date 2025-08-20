// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/Home.vue';
import ProductList from '@/Product/ProductList.vue';
import CustomerList from '@/Customer/CustomerList.vue';
import CustomerDetail from '@/Customer/CustomerDetail.vue';
import Invoice from '@/Invoice/Invoice.vue';
import InvoiceDetail from '@/Invoice/InvoiceDetail.vue';
import Menu from '@/Menu/Menu.vue';
import MenuType from '@/Menu/MenuType.vue';
import Login from '@/Auth/Login.vue';
import Register from '@/Auth/Register.vue';
import NotFound from '@/NotFound.vue';

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
    path: '/customer-list',
    name: 'CustomerList',
    component: CustomerList
  },
  {
    path: '/customer-detail',
    name: 'CustomerDetail',
    component: CustomerDetail
  },
  {
    path: '/invoice',
    name: 'Invoice',
    component: Invoice
  },
  {
    path: '/invoice-detail',
    name: 'InvoiceDetail',
    component: InvoiceDetail
  },
  {
    path: '/menu',
    name: 'Menu',
    component: Menu
  },
  {
    path: '/menu-type',
    name: 'MenuType',
    component: MenuType
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
