<template>
  <v-container
    id="volunteer"
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
              Search for opportunities
            </div>
          </template>

          <template>
            <v-card flat>
              <v-card-title>
                Opportunity
                <v-spacer>
                  *
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
        <base-material-card
          color="info"
          class="px-5 py-3"
        >
          <template v-slot:heading>
            <v-tabs
              v-model="tabs"
              background-color="transparent"
              slider-color="white"
            >
              <span
                class="subheading font-weight-bold mx-3"
                style="align-self: center"
              >Filters:</span>
              <v-tab class="mr-3">
                <v-icon class="mr-2">
                  mdi-bug
                </v-icon>
                Availability
              </v-tab>
              <v-tab class="mr-3">
                <v-icon class="mr-2">
                  mdi-code-tags
                </v-icon>
                Location
              </v-tab>
              <v-tab>
                <v-icon class="mr-2">
                  mdi-cloud
                </v-icon>
                Features
              </v-tab>
            </v-tabs>
          </template>

          <v-tabs-items
            v-model="tabs"
            class="transparent"
          >
            <v-tab-item
              v-for="n in 3"
              :key="n"
            >
              <v-card-text>
                <template v-for="(task, i) in tasks[tabs]">
                  <v-row
                    :key="i"
                    align="center"
                  >
                    <v-col cols="1">
                      <v-list-item-action>
                        <v-checkbox
                          v-model="task.value"
                          color="secondary"
                        />
                      </v-list-item-action>
                    </v-col>

                    <v-col cols="9">
                      <div
                        class="font-weight-light"
                        v-text="task.text"
                      />
                    </v-col>

                    <v-col
                      cols="2"
                      class="text-right"
                    >
                      <v-icon class="mx-1">
                        mdi-pencil
                      </v-icon>
                      <v-icon
                        color="error"
                        class="mx-1"
                      >
                        mdi-close
                      </v-icon>
                    </v-col>
                  </v-row>
                </template>
              </v-card-text>
            </v-tab-item>
          </v-tabs-items>
          <v-col
            cols="12"
            class="text-right"
          >
            <v-btn
              color="info"
              class="mr-0"
            >
              Apply Filters
            </v-btn>
          </v-col>
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
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Available',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Available',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Denied',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Denied',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Denied',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Pending',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
          Where: 'Virginia Beach',
          Time: 'Open',
          Distance: 7000,
          Status: 'Pending',
        },
        {
          Opportunity: 'Drivers to deliver meals to seniors in Virginia Beach',
          Organization: 'Meals on Wheels of Virginia Beach',
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
