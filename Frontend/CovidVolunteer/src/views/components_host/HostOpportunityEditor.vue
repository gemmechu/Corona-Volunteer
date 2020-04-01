<template>
  <v-container
    id="authenticate"
    fluid
    tag="section"
  >
    <v-row justify="center">
      <v-col
        cols="12"
        md="12"
      >
        <h2 />
      </v-col>

      <v-col
        cols="12"
        md="12"
      >
        <base-material-card color="info">
          <template v-slot:heading>
            <div class="display-2 font-weight-bold">
              {{ $route.params.opportunityid }}Opportunity Detail
            </div>

            <div class="subtitle-1 font-weight-bold">
              Edit Delete Opportunity
            </div>
          </template>

          <v-form>
            <v-container class="py-0">
              <v-row>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="opportunity.name"
                    label="Name"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-menu
                    v-model="menu1"
                    :close-on-content-click="false"
                    transition="scale-transition"
                    offset-y
                    max-width="290px"
                    min-width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="computedDateFormatted"
                        label="Start Date"
                        hint="DD/MM/YYYY format"
                        persistent-hint
                        prepend-icon="event"
                        readonly
                        v-on="on"
                      />
                    </template>
                    <v-date-picker
                      v-model="date"
                      no-title
                      @input="menu2 = false"
                    />
                  </v-menu>
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-menu
                    v-model="menu2"
                    :close-on-content-click="false"
                    transition="scale-transition"
                    offset-y
                    max-width="290px"
                    min-width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="computedDateFormatted2"
                        label="End Date"
                        hint="DD/MM/YYYY format"
                        persistent-hint
                        prepend-icon="event"
                        readonly
                        v-on="on"
                      />
                    </template>
                    <v-date-picker
                      v-model="date2"
                      no-title
                      @input="menu2 = false"
                    />
                  </v-menu>
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="opportunity.minimum_age"
                    type="number"
                    label="Minimum age"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="opportunity.number_of_volunteer_needed"
                    label="number of Volunteer needed"
                    type="number"
                    class="purple-input"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="12"
                >
                  <v-textarea
                    v-model="opportunity.requirment_description"
                    outlined
                    name="input-7-4"
                    label="requirement description"
                    value=""
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="12"
                >
                  <v-textarea
                    v-model="opportunity.brief_description"
                    outlined
                    name="input-7-4"
                    label="brief description"
                    value=""
                  />
                </v-col>
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
              </v-row>
              <v-row>
                <v-btn
                  class="mr-3"
                  color="info"
                  @click="updateOpportunity"
                >
                  Update
                </v-btn>
                <v-btn
                  color="error"
                  @click="deleteOpportunity"
                >
                  Delete
                </v-btn>
                <v-spacer />
                <v-btn
                  color="warning"
                  to="/opportunityApplicant/opportunityid"
                >
                  See Volunteer
                </v-btn>
              </v-row>
            </v-container>
          </v-form>
        </base-material-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  import Axios from 'axios'
  export default {
    data: function () {
      return {
        overlay: false,
        opportunity: '',
        opportunity_id: this.$route.params.opportunityId,
        select: null,
        items: [],
        date: new Date().toISOString().substr(0, 10),
        date2: new Date().toISOString().substr(0, 10),
        dateFormatted: this.formatDate(new Date().toISOString().substr(0, 10)),
        menu1: false,
        menu2: false,
      }
    },
    computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      },
      computedDateFormatted2 () {
        return this.formatDate(this.date2)
      },
    },
    watch: {
      date (val) {
        this.dateFormatted = this.formatDate(this.date)
      },
    },
    mounted: function () {
      this.overlay = true
      Axios.get('https://stormy-meadow-78369.herokuapp.com/api/opportunity/' + this.opportunity_id)
        .then(response => (this.opportunity = response.data)).then(() => { this.overlay = false })
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
    },
    methods: {
      formatDate (date) {
        if (!date) return null

        const [year, month, day] = date.split('-')
        return `${day}/${month}/${year}`
      },
      parseDate (date) {
        if (!date) return null

        const [month, day, year] = date.split('/')
        return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
      },
      updateOpportunity () {
        this.overlay = true
        Axios.put('https://stormy-meadow-78369.herokuapp.com/api/opportunity/' + this.opportunity_id, {
          name: this.opportunity.name,
          minimum_age: this.opportunity.minimum_age,
          number_of_volunteer_needed: this.opportunity.number_of_volunteer_needed,
          requirment_description: this.opportunity.requirment_description,
          brief_description: this.opportunity.brief_description,
        }).then(() => { this.overlay = false })
      },
      deleteOpportunity () {
        this.overlay = true
        Axios.delete('https://stormy-meadow-78369.herokuapp.com/api/opportunity/' + this.opportunity_id)
          .then(() => { this.overlay = false })
      },

    },
  }
</script>

<style scoped>
.v-progress-circular {
  margin: 1rem;
}
</style>
