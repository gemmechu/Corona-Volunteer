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
          You Have to login first!
        </v-card-title>

        <v-card-text>
          Would you like to Login?
        </v-card-text>

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
            to="/authenticate"
          >
            Yes
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
  export default {
    data () {
      return {
        dialog: false,
      }
    },
  }
</script>
