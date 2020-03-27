<template>
  <v-app>
    <dashboard-core-app-bar />

    <dashboard-core-drawer />

    <dashboard-core-view />
  </v-app>
</template>

<script>
  export default {
    name: 'Index',

    components: {
      DashboardCoreAppBar: () => import('@/views/components_volunteer/VolunteerAppBar'),
      DashboardCoreDrawer: () => import('@/views/components_volunteer/VolunteerDrawer'),
      DashboardCoreView: () => import('@/views/dashboard/components/core/View'),
    },

    data: () => ({
      expandOnHover: false,
    }),
  }
</script>
