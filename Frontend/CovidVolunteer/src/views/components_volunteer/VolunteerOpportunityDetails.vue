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
            v-if="!applied"
            cols="12"
            class="text-right"
          >
            <popup />
          </v-col>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
  import axios from 'axios'
  import popup from './../../components/PopupDialogVolunteer'
  export default {
    components: { popup },
    data: function () {
      return {
        opportunity: '',
        applied: false,
        id: this.$route.params.details,
      }
    },
    mounted: function () {
      axios.get('https://stormy-meadow-78369.herokuapp.com/api/opportunity/' + this.id)
        .then(response => (this.opportunity = response.data))
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
      axios.get('https://stormy-meadow-78369.herokuapp.com/applicant/')
        .then(response => (this.applied = response.data.filter(x => x.volunteer_id === localStorage.getItem('userId') && x.opportunity_id === this.id).len > 0))
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
    },
    methods: {
      expressInterest (opId) {
        axios({
          method: 'POST',
          url: 'https://stormy-meadow-78369.herokuapp.com/api/volunteer/applicant/',
          data: {
            volunteer_id: localStorage.getItem('userId'),
            opportunity_id: this.id,
            brief_description: this.opportunity.brief_description,
            status: this.opportunity.status,
          },
          headers: { 'content-type': 'application/json' },
        }).then(result => {
          this.recents = result.data
          this.$router.push({ path: '/volunteerOpportunityDetails/' + this.id })
        })
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
