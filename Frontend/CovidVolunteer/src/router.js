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
          name: 'Authenticate',
          path: '/authenticate',
          component: () => import('@/views/components_public/PublicLoginOrRegister'),
        },
        {
          name: 'VolunteerDetails',
          path: '/volunteerDetails/:details',
          component: () => import('@/views/components_public/PublicOpportunityDetails'),
        },
      ],
    },
    {
      path: '/admin',
      component: () => import('@/views/components_admin/AdminIndex'),
      children: [
        // Dashboard
        {
          name: 'Home',
          path: '',
          component: () => import('@/views/components_admin/AdminHome'),
        },
        {
          name: 'Host Management',
          path: '/hostManagement',
          component: () => import('@/views/components_admin/AdminHostManagement'),
        },
        {
          name: 'Opportunity Management',
          path: '/opportunityManagement',
          component: () => import('@/views/components_admin/AdminOpportunityManagement'),
        },
        {
          name: 'Host Editor',
          path: '/hostedit/:hostid',
          component: () => import('@/views/components_admin/AdminHostEditor'),
        },
        {
          name: 'Opportunity Editor',
          path: '/opportunityedit/:opportunityid',
          component: () => import('@/views/components_admin/AdminOpportunityEditor'),
        },
      ],
    },
    {
      path: '/volunteers',
      component: () => import('@/views/components_volunteer/VolunteerIndex'),
      children: [
        // Dashboard
        {
          name: 'Home',
          path: '',
          component: () => import('@/views/components_volunteer/VolunteerHome'),
        },
        {
          name: 'Profile',
          path: '/profile',
          component: () => import('@/views/components_volunteer/VolunteerProfile'),
        },
        {
          name: 'Opportunities',
          path: '/opportunities',
          component: () => import('@/views/components_volunteer/VolunteerOpportunities'),
        },
        {
          name: 'VolunteerDetails',
          path: '/volunteerOpportunityDetails/:details',
          component: () => import('@/views/components_volunteer/VolunteerOpportunityDetails'),
        },
        {
          name: 'Calendar',
          path: '/calendar',
          component: () => import('@/views/components_volunteer/VolunteerCalendar'),
        },
      ],
    },
    {
      path: '/Hosts',
      component: () => import('@/views/components_host/HostIndex'),
      children: [
        // Dashboard
        {
          name: 'Home',
          path: '/hosthome',
          component: () => import('@/views/components_host/HostHome'),
        },
        {
          name: 'Opportunity',
          path: '/hostOpportunity',
          component: () => import('@/views/components_host/HostOpportunityManagement'),
        },
        {
          name: 'Opportunity Editor',
          path: '/hostOpportunityEditor',
          component: () => import('@/views/components_host/HostOpportunityEditor'),
        },
      ],
    },
  ],
})
