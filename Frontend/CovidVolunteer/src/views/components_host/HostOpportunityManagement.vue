<template>
  <v-container
    id="hostManagement"
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
              Opportunity Manager
            </div>
          </template>

          <template>
            <v-card flat>
              <v-card-title>
                <v-btn
                  outlined
                  text
                  color="info"
                  to="/hostOpportunityCreate"
                >
                  Create New
                </v-btn>
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
                <template v-slot:items="props">
                  <td>
                    {{ props.item.name }}
                  </td>
                  <td class="text-right">
                    {{ props.item.contactId }}
                  </td>
                  <td class="text-right">
                    {{ props.item.endingDate }}
                  </td>
                  <td class="text-right">
                    <v-chip :color="getColor(props.item.status)">
                      {{ props.item.status }}
                    </v-chip>
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
                <template v-slot:item.actions="{ item }">
                  <v-icon
                    small
                    class="mr-2"
                    @click="editItem(item)"
                  >
                    mdi-pencil
                  </v-icon>
                  <v-icon
                    small
                    @click="deleteItem(item)"
                  >
                    mdi-delete
                  </v-icon>
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
  export default {
    data () {
      return {
        calendar: Calendar.months(),
        search: '',
        headers: [
          { text: 'Opportunity', value: 'Opportunity' },
          { text: 'Organization', value: 'Organization' },
          { text: 'Contact ID', value: 'contactId' },
          { text: 'Ending Date', value: 'endingDate' },
          { text: 'Status', value: 'Status' },
        ],
        desserts: [
          {
            Opportunity: 'Opportunity 1',
            Organization: 'Kiros',
            contactId: '+2019242144',
            endingDate: 'Dec-13-2019',
            Status: 'Active',
          },
          {
            Opportunity: 'Opportunity 2',
            Organization: 'BlueLab',
            contactId: '+2019242144',
            endingDate: 'Dec-13-2019',
            Status: 'Closed',
          },
          {
            Opportunity: 'Opportunity 3',
            Organization: 'Google',
            contactId: '+2019242144',
            endingDate: 'Dec-13-2019',
            Status: 'Closed',
          },
          {
            Opportunity: 'Opportunity 4',
            Organization: 'Twitter',
            contactId: '+2019242144',
            endingDate: 'Dec-13-2019',
            Status: 'Active',
          },

        ],
      }
    },
    computed: {
      // convert the list of events into a map of lists keyed by date
      eventsMap () {
        const map = {}
        return map
      },
    },
    methods: {
      open (event) {
        alert(event.title)
      },
      getColor (status) {
        if (status === 'Denied') return 'red'
        else if (status === 'pending') return 'orange'
        else return 'green'
      },
      editItem (item) {
        this.editedIndex = this.desserts.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
        const index = this.desserts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
      },

      handleClick (value) {
        this.$router.push({ path: `/hostOpportunityEditor/${value.Opportunity}` })
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
