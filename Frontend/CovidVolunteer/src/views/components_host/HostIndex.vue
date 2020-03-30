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
      DashboardCoreAppBar: () => import('@/views/components_admin/AllAppBar'),
      DashboardCoreDrawer: () => import('@/views/components_host/HostDrawer'),
      DashboardCoreView: () => import('@/views/dashboard/components/core/View'),
    },

    data: () => ({
      expandOnHover: false,
    }),
  }
</script>
