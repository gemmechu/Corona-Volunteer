<template>
  <v-container
    id="volunteer"
    tag="section"
  >
    <v-row>
      <div v-if="recents.length">
        <v-row>
          <v-col
            cols="12"
          >
            <h2> Opportunities Status </h2>
          </v-col>
          <v-col
            cols="12"
            md="4"
            v-for="recentOpportunity of recents"
            :key="recentOpportunity.id"
          >
            <base-material-stats-card
              color="info"
              icon="mdi-circle"
              :title="recentOpportunity.brief_description"
              :value="recentOpportunity.status"
              sub-icon="mdi-clock"
              :sub-text="recentOpportunity.created_at"
            />
          </v-col>
        </v-row>
      </div>
      <v-col
        cols="12"
        style="padding-top:0"
      >
        <base-material-card
          flat
          color="info"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              All Opportunities
            </div>
          </template>
          <template>
            <v-card flat>
              <v-card-title>
                <v-spacer />
                <v-text-field
                  v-model="search"
                  label="Search"
                  single-line
                  hide-details
                >
                  *
                </v-text-field>
              </v-card-title>
              <v-data-table
                :headers="headers"
                :items="desserts"
                :search="search"
                @click:row="handleClick"
              >
                <template v-slot:no-results>
                  <v-alert
                    :value="true"
                    color="error"
                    icon="warning"
                  >
                    Your search for "{{ search }}" found no results.
                  </v-alert>
                </template>
              </v-data-table>
            </v-card>
          </template>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
  import { Calendar } from 'dayspan'
  import axios from 'axios'
  export default {
    data: () => ({
      calendar: Calendar.months(),
      search: '',
      recents: [],
      headers: [
        {
          text: 'Opportunity',
          align: 'left',
          sortable: false,
          value: 'name',
        },
        { text: 'Organization', value: 'organization_id' },
        { text: 'Type', value: 'activity_type' },
        { text: 'Avaliable spot', value: 'number_of_avaliable_spot' },
        { text: 'Status', value: 'status' },
      ],
      desserts: [
      ],
      tabs: 0,
    }),
    mounted: function () {
      axios.get('https://stormy-meadow-78369.herokuapp.com/api/applicant')
        .then(response => (this.recents = response.data.filter(x => x.volunteer_id === localStorage.getItem('userId'))))
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
      axios.get('https://stormy-meadow-78369.herokuapp.com/api/opportunity')
        .then(response => (this.desserts = response.data))
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
    },
    methods: {
      open (event) {
        alert(event.title)
      },
      handleClick (value) {
        this.$router.push({ path: `/volunteerOpportunityDetails/${value.id}` })
      },
    },
  }
</script>
<style>
body, html, #app, #dayspan {
  font-family: Roboto, sans-serif;
  width: 100%;
  height: 100%;
}
</style>
