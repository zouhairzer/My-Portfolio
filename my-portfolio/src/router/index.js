import { createRouter, createWebHistory } from 'vue-router'
import login from '../components/Auth/Login.vue' 
import register from '../components/Auth/Register.vue' 
import infos from '../components/Admin/Informations.vue'
import add_info from '../components/Admin/add-info.vue'
import update_info from '../components/Admin/update-info.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Login',
      component: login
    },
    {
      path: '/register',
      name: 'Register',
      component: register
    },
    {
      path: '/info',
      name: 'Informations',
      component: infos
    },
    {
      path:'/add_info',
      name:'add-info',
      component: add_info
    },
    {
      path: '/update_info/:id',
      name: 'update-info',
      component: update_info
    }
  ]
})

export default router
