// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: '',
        name: 'Login',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Login.vue'),
      },
      {
        path: '/register',
        name: 'Register',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Register.vue'),
      },
      {
        path: 'dashboard',
        name: 'Dashboard',
        component: () => import(/* webpackChunkName: "home" */ '@/views/admin/Dashboard.vue'),
      },
      {
        path: 'home',
        name: 'Home',
        component: () => import(/* webpackChunkName: "home" */ '@/views/Home.vue'),
      },
      {
        path: 'equipments',
        name: 'Equipements',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Equipments.vue'),
      },
      {
        path: 'consumables',
        name: 'Consumables',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Consumables.vue'),
      },
      {
        path: 'cart',
        name: 'Cart',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Cart.vue'),
      },
      {
        path: 'permission',
        name: 'Permission',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Permission.vue'),
      },
      {
        path: 'profil',
        name: 'Profil',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Profil.vue'),
      },
      {
        path: 'setting',
        name: 'Setting',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Setting.vue'),
      },
      {
        path: 'demand',
        name: 'Demand',
        component: () => import(/* webpackChunkName: "home" */ '@/views/employe/Demand.vue'),
      },
      {
        path: 'dashboard/equipments',
        name: 'admin_equipments',
        component: () => import(/* webpackChunkName: "home" */ '@/views/admin/Equipments.vue'),
      },
      {
        path: 'dashboard/users',
        name: 'admin_users',
        component: () => import(/* webpackChunkName: "home" */ '@/views/admin/Users.vue'),
      },
      {
        path: 'dashboard/requests',
        name: 'admin_requests',
        component: () => import(/* webpackChunkName: "home" */ '@/views/admin/Requests.vue'),
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
