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
      />

      <template>
        <v-form>
          <v-container>
            <v-row>
              <v-col
                cols="12"
                sm="6"
              >
                <v-text-field

                  label="First Name"
                  outlined
                  v-model = "first"
                />
              </v-col>

              <v-col
                cols="12"
                sm="6"
              >
                <v-text-field
                  v-model="last"
                  label="Last Name"
                  outlined
                />
              </v-col>
            </v-row>
          </v-container>
        </v-form>
      </template>
    </v-row>
  </v-container>
</template>
<script>
  export default {
    data: () => ({
      first: 'joi',
      last: 'Doe',
      hel: this.$route.params.hostid,
    }),
  }
</script>
<style>
body, html, #app, #dayspan {
  font-family: Roboto, sans-serif;
  width: 100%;
  height: 100%;
}
</style>
