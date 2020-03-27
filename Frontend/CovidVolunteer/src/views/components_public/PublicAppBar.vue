<template>
  <v-app-bar
    id="app-bar"
    absolute
    app
    color="transparent"
    flat
    height="75"
  >
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          class="hidden-md-and-up mr-3"
          elevation="1"
          fab
          small
          v-on="on"
        >
          <v-icon v-if="value">
            mdi-view-quilt
          </v-icon>

          <v-icon v-else>
            mdi-dots-vertical
          </v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-item
          v-for="link in links"
          :key="link.text"
          router
          :to="link.route"
        >
          <v-list-item-title>{{ link.text }} </v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>

    <v-btn
      class="mx-2"
      min-width="0"
      text
      to="/"
    >
      Home
    </v-btn>
    <v-btn
      class="mx-2"
      min-width="0"
      text
      to="/volunteer"
    >
      Opportunity
    </v-btn>

    <v-btn
      class="mx-2"
      min-width="0"
      text
      to="/host"
    >
      Host
    </v-btn>

    <v-spacer />

    <div class="mx-3" />
    <v-btn
      class="ml-2"
      min-width="0"
      text
      to="/authenticate"
    >
      Login/Signup
    </v-btn>

  </v-app-bar>

</template>

<script>
  // Utilities
  import { mapState, mapMutations } from 'vuex'

  export default {
    name: 'DashboardCoreAppBar',
    props: {
      value: {
        type: Boolean,
        default: false,
      },
    },
    data () {
      return {

        links: [
          { icon: 'Home', text: 'Home', route: '/' },
          { icon: 'Oportunity', text: 'Oportunity', route: '/volunteer' },
          { icon: 'Host', text: 'Host', route: '/host' },
        ],
      }
    },

    computed: {
      ...mapState(['drawer']),
    },

    methods: {
      ...mapMutations({
        setDrawer: 'SET_DRAWER',
      }),
    },
  }
</script>
