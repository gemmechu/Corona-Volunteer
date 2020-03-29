<template>
  <v-container
    id="opportunityDetails"
    fluid
    tag="section"
  >
    <v-row>
      <v-col
        cols="12"
        md="12"
      >
        <base-material-card color="info">
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              {{ opportunity.name }}
            </div>
          </template>
          <div class="ml-5">
            <h3>Status</h3>
            <span>{{ opportunity.status }}</span>
            <br>
            <h3>Start Date</h3>
            <span>{{ opportunity.start_date }}</span>
            <br>
            <h3>End Date</h3>
            <span>{{ opportunity.end_date }}</span>
            <br>
            <h3>Minimum Age</h3>
            <span>{{ opportunity.minimum_age }}</span>
            <br>
            <h3>Brief description</h3>
            <span>{{ opportunity.brief_description }}</span>
            <br>
            <h3>Requirment description</h3>
            <span>{{ opportunity.requirment_description }}</span>
            <br>
          </div>
          <v-col
            cols="12"
            class="text-right"
          >
            <v-btn
              color="info"
              class="mr-0"
               @click="expressInterest(opportunity.id)"
            >
              Express Interest
            </v-btn>
          </v-col>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
  import axios from 'axios'
  export default {
    data: function () {
      return {
        opportunity: '',
        id: this.$route.params.details,
      }
    },
    mounted: function () {
      axios.get('https://stormy-meadow-78369.herokuapp.com/api/opportunity/' + this.id)
        .then(response => (this.opportunity = response.data))
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
    },
    methods: {
      expressInterest (opId) {
        this.$router.push({ path: '/authenticate' })
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
