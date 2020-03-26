import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'hash',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      component: () => import('@/views/components_public/PublicIndex'),
      children: [
        // Dashboard
        {
          name: 'Home',
          path: '',
          component: () => import('@/views/components_public/PublicHome'),
        },
        {
          name: 'Volunteer',
          path: '/volunteer',
          component: () => import('@/views/components_public/PublicVolunteer'),
        },
        {
          name: 'Host',
          path: '/host',
          component: () => import('@/views/components_public/PublicHost'),
        },
        {
          name: 'User',
          path: '/profile',
          component: () => import('@/views/components_public/PublicProfile'),
        },
        {
          name: 'Authenticate',
          path: '/authenticate',
          component: () => import('@/views/components_public/PublicLoginOrRegister'),
        },
      ],
    },
  ],
})
