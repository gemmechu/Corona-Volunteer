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
          name: 'Opportuniry',
          path: '/Opportuniry',
          component: () => import('@/views/components_public/PublicOpportunity'),
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
          name: 'OpportunityDetails',
          path: '/opportunityDetails/:details',
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
          name: 'Host Editor',
          path: '/hostedit/:hostid',
          component: () => import('@/views/components_admin/AdminHostEditor'),
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
      // Host
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
          path: '/hostOpportunityManagement',
          component: () => import('@/views/components_host/HostOpportunityManagement'),
        },
        {
          name: 'Opportunity Editor',
          path: '/hostOpportunityEditor/:opportunityId',
          component: () => import('@/views/components_host/HostOpportunityEditor'),
        },
        {
          name: 'Create Opportunity',
          path: '/hostOpportunityCreate',
          component: () => import('@/views/components_host/HostOpportunityCreate'),
        },
      ],
    },
  ],
})
