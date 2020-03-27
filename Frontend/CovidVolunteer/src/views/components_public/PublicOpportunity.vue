<template>
  <v-container
    id="volunteer"
    fluid
    tag="section"
  >
    <v-row>
      <v-col
        cols="12"
        md="3"
        style="padding-top:0"
      >
        <v-row>
          <v-col
            cols="12"
            md="12"
            style="padding:0"
          >
            <base-material-card
              flat
              color="info"
            >
              <template v-slot:heading>
                <div class="display-2 font-weight-bold">
                  Availability
                </div>
              </template>
              <v-card-text>
                <v-simple-table style="overflow:hidden">
                  <thead>
                    <tr>
                      <th class="primary--text">
                        M
                      </th>
                      <th class="primary--text">
                        T
                      </th>
                      <th class="primary--text">
                        W
                      </th>
                      <th class="primary--text">
                        T
                      </th>
                      <th class="primary--text">
                        F
                      </th>
                      <th class="primary--text">
                        S
                      </th>
                      <th class="primary--text">
                        S
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr class="pb-0">
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                      <td style="padding:0;margin:0">
                        <v-checkbox></v-checkbox>
                      </td>
                    </tr>

                  </tbody>
                </v-simple-table>
              </v-card-text>
            </base-material-card>
          </v-col>
          <v-col
            cols="12"
            md="12"
            style="padding:0"
          >
            <base-material-card
              color="info"
            >
              <template v-slot:heading>
                <div class="display-2 font-weight-bold">
                  Pereferences
                </div>
              </template>
              <v-card-text>
                <v-row>
                  <v-col
                    cols="12"
                    md="12"
                    style="padding:0"
                  >
                    <v-text-field
                      label="Citerion"
                      class="purple-input"
                    />
                  </v-col>
                  <v-col
                    cols="12"
                    md="12"
                    style="padding:0"
                  >
                    <v-text-field
                      label="Citerion"
                      class="purple-input"
                    />
                  </v-col>
                  <v-col
                    cols="12"
                    md="12"
                    style="padding:0"
                  >
                    <v-text-field
                      label="Citerion"
                      class="purple-input"
                    />
                  </v-col>
                  <v-col
                    cols="12"
                    md="12"
                    style="padding:0"
                  >
                    <v-text-field
                      label="Citerion"
                      class="purple-input"
                    />
                  </v-col>
                </v-row>
              </v-card-text>
            </base-material-card>
          </v-col>
        </v-row>
      </v-col>
      <v-col
        cols="12"
        md="9"
        style="padding-top:0"
      >
        <base-material-card
          flat
          color="info"
        >
          <template>
            <v-card flat>
              <v-card-title>
                <v-spacer>
                </v-spacer>
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
                <template v-slot:items="props">
                  <td>
                    {{ props.item.name }}
                  </td>
                  <td class="text-right">
                    {{ props.item.calories }}
                  </td>
                  <td class="text-right">
                    {{ props.item.fat }}
                  </td>
                  <td class="text-right">
                    {{ props.item.carbs }}
                  </td>
                  <td class="text-right">
                    {{ props.item.protein }}
                  </td>
                  <td class="text-right">
                    {{ props.item.iron }}
                  </td>
                </template>
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
      <v-col
        cols="12"
        lg="12"
      >
        <div
          v-cloak
          id="dayspan"
          class="display-2 font-weight-bold"
        >
          <ds-calendar-app :calendar="calendar"></ds-calendar-app>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
  import { Calendar } from 'dayspan'
  export default {
    data: () => ({
      calendar: Calendar.months(),
      search: '',
      headers: [
        {
          text: 'Opportunity',
          align: 'left',
          sortable: false,
          value: 'Opportunity',
        },
        { text: 'Organization', value: 'Organization' },
        { text: 'Where', value: 'Where' },
        { text: 'Time', value: 'Time' },
        { text: 'Distance', value: 'Distance' },
        { text: 'Status', value: 'Status' },
      ],
      desserts: [
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia',
          Organization: 'Meals on Wheels ',
          Where: 'Virginia',
          Time: 'Open',
          Distance: 7000,
          Status: 'Available',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Beach',
          Organization: 'Meals on Wheels ',
          Where: ' Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Available',
        },
        {
          Opportunity: 'Drivers to deliver meals to Cali',
          Organization: 'Meals on Wheels ',
          Where: 'California',
          Time: 'Open',
          Distance: 7000,
          Status: 'Denied',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in New York',
          Organization: 'Meals on Wheels ',
          Where: 'New York',
          Time: 'Open',
          Distance: 7000,
          Status: 'Denied',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Massacusets',
          Organization: 'Meals on Wheels ',
          Where: 'Massacusets',
          Time: 'Open',
          Distance: 7000,
          Status: 'Denied',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Orange county',
          Organization: 'Meals on Wheels ',
          Where: 'Orange county',
          Time: 'Open',
          Distance: 7000,
          Status: 'Pending',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels ',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Pending',
        },
      ],
      tabs: 0,
      tasks: {
        0: [
          {
            text: 'Sign contract for "What are conference organizers afraid of?"',
            value: true,
          },
          {
            text: 'Lines From Great Russian Literature? Or E-mails From My Boss?',
            value: false,
          },
          {
            text: 'Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit',
            value: false,
          },
          {
            text: 'Create 4 Invisible User Experiences you Never Knew About',
            value: true,
          },
        ],
        1: [
          {
            text: 'Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit',
            value: true,
          },
          {
            text: 'Sign contract for "What are conference organizers afraid of?"',
            value: false,
          },
        ],
        2: [
          {
            text: 'Lines From Great Russian Literature? Or E-mails From My Boss?',
            value: false,
          },
          {
            text: 'Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit',
            value: true,
          },
          {
            text: 'Sign contract for "What are conference organizers afraid of?"',
            value: true,
          },
        ],
      },
      list: {
        0: false,
        1: false,
        2: false,
      },
      today: '2019-01-08',
      events: [
        {
          title: 'Vacation',
          details: 'Going to the beach!',
          date: '2018-12-30',
          open: false,
        },
        {
          title: 'Vacation',
          details: 'Going to the beach!',
          date: '2018-12-31',
          open: false,
        },
        {
          title: 'Vacation',
          details: 'Going to the beach!',
          date: '2019-01-01',
          open: false,
        },
        {
          title: 'Meeting',
          details: 'Spending time on how we do not have enough time',
          date: '2019-01-07',
          open: false,
        },
        {
          title: '30th Birthday',
          details: 'Celebrate responsibly',
          date: '2019-01-03',
          open: false,
        },
        {
          title: 'New Year',
          details: 'Eat chocolate until you pass out',
          date: '2019-01-01',
          open: false,
        },
        {
          title: 'Conference',
          details: 'Mute myself the whole time and wonder why I am on this call',
          date: '2019-01-21',
          open: false,
        },
        {
          title: 'Hackathon',
          details: 'Code like there is no tommorrow',
          date: '2019-02-01',
          open: false,
        },
      ],
    }),
    computed: {
      // convert the list of events into a map of lists keyed by date
      eventsMap () {
        const map = {}
        this.events.forEach(e => (map[e.date] = map[e.date] || []).push(e))
        return map
      },
    },
    methods: {
      open (event) {
        alert(event.title)
      },
      handleClick (value) {
        this.$router.push({ path: `/details/${value.Opportunity}` })
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
