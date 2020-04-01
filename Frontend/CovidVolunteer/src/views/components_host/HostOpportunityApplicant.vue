<template>
  <v-container
    id="ApplicantManagement"
    fluid
    tag="section"
  >
    <v-row>
      <v-col
        cols="12"
        lg="12"
      >
        <base-material-card
          color="info"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-bold">
              Applicant Manager
            </div>
          </template>
          <v-overlay :value="overlay">
            <v-progress-circular
              indeterminate
              class="d-flex"
            />
            <v-btn
              icon
              class="d-flex"
              @click="overlay = false"
            >
              <v-icon>mdi-close</v-icon>
            </v-btn>
          </v-overlay>
          <template>
            <v-card flat>
              <v-card-title>
                <v-text-field
                  v-model="search"
                  label="Search"
                  single-line
                  hide-details
                />
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
              </v-card-title>
            </v-card>
          </template>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
  import Axios from 'axios'
  export default {
    data: () => ({
      overlay: false,
      search: '',
      headers: [
        {
          text: 'Applicant',
          align: 'left',
          sortable: false,
          value: 'volunteer_id',
        },
        { text: 'Status', value: 'status' },
      ],
      desserts: [
      ],
      tabs: 0,
    }),
    mounted: function () {
      this.overlay = true
      Axios.post('https://stormy-meadow-78369.herokuapp.com/api/opportunity/applicantsForAnOpportunity', {
        opportuniy_id: '2f6049ac-1ad1-4fb0-b657-9cdb4610a753',
      },
      )
        .then(response => (this.desserts = response.data)).then(() => { this.overlay = false })
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
    },
    methods: {
      handleClick (value) {
        this.$router.push({ path: `/hostOpportunityEditor/${value.id}` })
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
.v-progress-circular {
  margin: 1rem;
}
</style>
