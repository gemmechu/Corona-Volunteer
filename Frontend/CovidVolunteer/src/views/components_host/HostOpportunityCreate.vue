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
              Create Opportunity
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
                    v-model="name"
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
                    v-model="minimum_age"
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
                    v-model="number_of_volunteer_needed"
                    label="number of Volunteer needed"
                    type="number"
                    class="purple-input"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    label="language requirement"
                    class="purple-input"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="city"
                    label="City"
                    class="purple-input"
                  />
                </v-col>

                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="subcity"
                    label="subcity"
                    class="purple-input"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="phone_number"
                    label="phone number"
                    class="purple-input"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="6"
                >
                  <v-select
                    v-model="activity_type"
                    :items="items"
                    item-value="id"
                    item-text="name"
                    :rules="[v => !!v || 'Item is required']"
                    label="Activity Type"
                    required
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="12"
                >
                  <v-textarea
                    v-model="requirment_description"
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
                    v-model="brief_description"
                    outlined
                    name="input-7-4"
                    label="brief description"
                    value=""
                  />
                </v-col>
              </v-row>
              <v-btn
                color="info"
                @click="createOpportunity"
              >
                Create New
              </v-btn>
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
    data: vm => ({
      select: null,
      items: [],
      date: new Date().toISOString().substr(0, 10),
      date2: new Date().toISOString().substr(0, 10),
      dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
      menu1: false,
      menu2: false,
      // Input Data
      name: '',
      status: 'active',
      start_date: new Date().toISOString().substr(0, 10),
      end_date: new Date().toISOString().substr(0, 10),
      brief_description: '',
      requirment_description: '',
      minimum_age: 0,
      number_of_volunteer_needed: 0,
      number_of_avaliable_spot: 0,
      region: 'central',
      zone: '09',
      city: '',
      subcity: '',
      woreda: '08',
      house_number: 'new',
      phone_number: '',
      emergency_contact: '+25163884829',
      organization_id: '',
      activity_type: null,
      opportunity_language_requirment: [
        { name: 'amharic', degree_proficency: 'advanced' },
        { name: 'afaan oromo', degree_proficency: 'beginer' },
      ],
    }),
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
      Axios.get('https://stormy-meadow-78369.herokuapp.com/api/activityType')
        .then(response => (this.items = response.data))
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
      createOpportunity () {
        Axios.post('https://stormy-meadow-78369.herokuapp.com/api/opportunity',
                   {
                     name: this.name,
                     status: 'active',
                     start_date: this.computedDateFormatted,
                     end_date: this.computedDateFormatted2,
                     brief_description: this.brief_description,
                     requirment_description: this.requirment_description,
                     minimum_age: this.minimum_age,
                     number_of_volunteer_needed: this.number_of_volunteer_needed,
                     number_of_avaliable_spot: this.number_of_volunteer_needed,
                     contact_id: {
                       region: 'central',
                       zone: '09',
                       city: this.city,
                       subcity: this.subcity,
                       woreda: '08',
                       house_number: 'new',
                       phone_number: this.phone_number,
                       emergency_contact: '+25163884829',
                     },
                     organization_id: { email: 'bluemoon@gmailcom' },
                     activity_type: this.activity_type,
                     opportunity_language_requirment: [
                       { name: 'amharic', degree_proficency: 'advanced' },
                       { name: 'afaan oromo', degree_proficency: 'beginer' },
                     ],
                   })
          .catch(console.log('error happend'))
      },
    },
  }
</script>
