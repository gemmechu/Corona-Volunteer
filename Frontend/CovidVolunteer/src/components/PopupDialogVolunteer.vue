<template>
  <v-row justify="center">
    <v-btn
      color="info"
      class="mr-0"
      outlined=""
      @click.stop="dialog = true"
    >
      Express Interest
    </v-btn>

    <v-dialog
      v-model="dialog"
      max-width="350"
    >
      <v-card>
        <v-card-title class="headline">
          Are You sure ?
        </v-card-title>
        <v-card-actions>
          <v-spacer />

          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            No
          </v-btn>

          <v-btn
            color="blue darken-1"
            text
            @click="expressInterest"
          >
            Yes
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  import Axios from 'axios'
  export default {
    data () {
      return {
        dialog: false,
      }
    },
    methods: {
      expressInterest () {
        Axios.post('https://stormy-meadow-78369.herokuapp.com/api/applicant', {
          volunteer_id: '20576554-0e90-41cc-8586-e8307fc19b72',
          opportunity_id: this.$route.params.details,
          status: 'pending',
          brief_description: 'Hello this test',
        }).then(this.dialog = false)
      },
    },
  }
</script>
