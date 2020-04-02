import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
function guardMyRouteAdmin (to, from, next) {
    if (localStorage.getItem('userId') !== '-Infinity' && localStorage.getItem('role') === 'admin') {
    next()
  } else {
    next({
      path: '/authenticate',
    })
  }
}
function guardMyRouteHost (to, from, next) {
    if (localStorage.getItem('userId') !== '-Infinity' && localStorage.getItem('role') === 'host') {
    next()
  } else {
    next({
      path: '/authenticate',
    })
  }
}
function guardMyRouteVolunteer (to, from, next) {
    if (localStorage.getItem('userId') !== '-Infinity' && localStorage.getItem('role') === 'volunteer') {
    next()
  } else {
    next({
      path: '/authenticate',
    })
  }
}
const router = new Router({
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
          component: () =>
            import('@/views/components_public/PublicLoginOrRegister'),
        },
        {
          name: 'OpportunityDetails',
          path: '/opportunityDetails/:details',
          component: () =>
            import('@/views/components_public/PublicOpportunityDetails'),
        },
      ],
    },
    {
      path: '/admin',
      component: () => import('@/views/components_admin/AdminIndex'),
      beforeEnter: guardMyRouteAdmin,
     children: [
        // Dashboard
        {
          name: 'Home',
          path: '',
          component: () => import('@/views/components_admin/AdminHome'),
          beforeEnter: guardMyRouteAdmin,
        },
        {
          name: 'Host Management',
          path: '/hostManagement',
          component: () =>
            import('@/views/components_admin/AdminHostManagement'),
          beforeEnter: guardMyRouteAdmin,
        },
        {
          name: 'Host Editor',
          path: '/hostedit/:hostid',
          component: () => import('@/views/components_admin/AdminHostEditor'),
          beforeEnter: guardMyRouteAdmin,
        },
      ],
    },
    {
      path: '/volunteers',
      component: () => import('@/views/components_volunteer/VolunteerIndex'),
      beforeEnter: guardMyRouteVolunteer,
      children: [
        // Dashboard
        {
          name: 'Home',
          path: '',
          component: () => import('@/views/components_volunteer/VolunteerHome'),
          beforeEnter: guardMyRouteVolunteer,
        },
        {
          name: 'Profile',
          path: '/profile',
          component: () =>
            import('@/views/components_volunteer/VolunteerProfile'),
          beforeEnter: guardMyRouteVolunteer,
        },
        {
          name: 'Opportunities',
          path: '/opportunities',
          component: () =>
            import('@/views/components_volunteer/VolunteerOpportunities'),
          beforeEnter: guardMyRouteVolunteer,
        },
        {
          name: 'VolunteerDetails',
          path: '/volunteerOpportunityDetails/:details',
          component: () =>
            import('@/views/components_volunteer/VolunteerOpportunityDetails'),
          beforeEnter: guardMyRouteVolunteer,
        },
        {
          name: 'Calendar',
          path: '/calendar',
          component: () =>
            import('@/views/components_volunteer/VolunteerCalendar'),
          beforeEnter: guardMyRouteVolunteer,
        },
      ],
    },
    {
      // Host
      path: '/Hosts',
      component: () => import('@/views/components_host/HostIndex'),
      beforeEnter: guardMyRouteHost,
      children: [
        // Dashboard
        {
          name: 'Home',
          path: '/hosthome',
          component: () => import('@/views/components_host/HostHome'),
          beforeEnter: guardMyRouteHost,
        },
        {
          name: 'Opportunity',
          path: '/hostOpportunityManagement',
          component: () =>
            import('@/views/components_host/HostOpportunityManagement'),
          beforeEnter: guardMyRouteHost,
        },
        {
          name: 'Opportunity Editor',
          path: '/hostOpportunityEditor/:opportunityId',
          component: () =>
            import('@/views/components_host/HostOpportunityEditor'),
          beforeEnter: guardMyRouteHost,
        },
        {
          name: 'Create Opportunity',
          path: '/hostOpportunityCreate',
          component: () =>
            import('@/views/components_host/HostOpportunityCreate'),
          beforeEnter: guardMyRouteHost,
        },
        {
          name: 'Applicant Management',
          path: '/opportunityApplicant/:opportunityid',
          component: () => import('@/views/components_host/HostOpportunityApplicant'),
          beforeEnter: guardMyroute,
        },
      ],
    },
  ],
})
export default router
