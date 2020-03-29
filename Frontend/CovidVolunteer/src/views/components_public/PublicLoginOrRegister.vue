<template>
  <v-container
    id="authenticate"
    tag="section"
  >
    <v-row v-if="noUser == true">
      <v-alert
        type="error"
        dismissible
        class="pa-2"
      >
        Username or Passord incorrect
      </v-alert>
    </v-row>
    <v-row justify="center">
      <v-col
        cols="12"
        md="12"
      >
        <base-material-card color="info">
          <template v-slot:heading>
            <div class="display-2 font-weight-bold">
              Login
            </div>

            <div class="subtitle-1 font-weight-bold">
              Fill in appropriate Username and Passord
            </div>
          </template>

          <v-container class="py-0">
            <v-row>
              <v-col
                cols="12"
                md="6"
              >
                <v-text-field
                  v-model="email"
                  label="Email Address"
                  class="purple-input"
                />
              </v-col>
              <v-col
                cols="12"
                md="6"
              >
                <v-text-field
                  v-model="password"
                  label="Password"
                  class="purple-input"
                />
              </v-col>
              <v-col
                cols="12"
              >
                <v-btn
                  color="info"
                  @click="login()"
                >
                  Login
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </base-material-card>
      </v-col>

      <v-col
        cols="12"
        md="12"
      >
        <h2>If you don't have an account, Please Register Here.</h2>
      </v-col>

      <v-col
        cols="12"
        md="12"
      >
        <base-material-card color="info">
          <template v-slot:heading>
            <div class="display-2 font-weight-bold">
              Register Profile
            </div>

            <div class="subtitle-1 font-weight-bold">
              Complete your profile
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
                    v-model="volunteer.first_name"
                    label="First Name"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.last_name"
                    label="Last Name"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.birthdate"
                    type="date"
                    label="Birth Date"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-select
                    v-model="volunteer.gender"
                    :items="genders"
                    label="Gender"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.email"
                    type="email"
                    label="Email"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.password"
                    type="password"
                    label="Password"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.distance_willing_to_travel"
                    label="Distance willing to travel In Kms"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.educational_level"
                    label="Educational Level"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="volunteer.employment_status"
                    label="Employment Status"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-select
                    v-model="volunteer.disability_status"
                    :items="disability"
                    label="Disability Status"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.region"
                    label="Region"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.zone"
                    label="Zone"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.city"
                    label="City"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.woreda"
                    label="Woreda"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.subcity"
                    label="Subcity"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.house_number"
                    label="House Number"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.phone_number"
                    label="Phone Number"
                  />
                </v-col>
                <v-col
                  cols="12"
                  md="4"
                >
                  <v-text-field
                    v-model="contact.emergency_contact"
                    label="Emergency Contact"
                  />
                </v-col>

                <v-col
                  cols="12"
                  class="text-right"
                >
                  <v-btn
                    color="info"
                    class="mr-0"
                    @click="sendData()"
                  >
                    Register
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </base-material-card>
      </v-col>
      <v-snackbar
        v-model="snackbar"
        :timeout="timeout"
      >
        {{ text }}
        <v-btn
          color="blue"
          text
          @click="snackbar = false"
        >
          Close
        </v-btn>
      </v-snackbar>
    </v-row>
  </v-container>
</template>

<script>
  import axios from 'axios'
  export default {
    data: () => ({
      noUser: false,
      snackbar: false,
      text: 'Failed to Register. Please try again',
      timeout: 2000,
      email: '',
      password: '',
      contact: {
        id: '',
        region: '',
        zone: '',
        city: '',
        subcity: '',
        woreda: '',
        house_number: '',
        phone_number: '',
        emergency_contact: '',
      },
      volunteer: {
        id: '',
        first_name: '',
        last_name: '',
        birthdate: '',
        gender: '',
        email: '',
        password: '',
        distance_willing_to_travel: '',
        educational_level: '',
        employment_status: '',
        disability_status: '',
        id_image: 'http://stormy-meadow-78369.herokuapp.com/api/volunteer',
        account_status: 'pending',
        token: '0a49f70f-ce80-48df-bcaa-432a106ded26',
      },
      genders: [
        'Male',
        'Female',
      ],
      disability: [
        'true',
        'false',
      ],
      response: '',
    }),
    mounted () {
      debugger
    },
    methods: {
      sendData () {
        axios({ method: 'POST', url: 'https://stormy-meadow-78369.herokuapp.com/api/contact', data: this.contact, headers: { 'content-type': 'application/json' } }).then(result => {
          console.log(result.data)
          this.response = result.data
          this.vol = {}
          this.vol = this.volunteer
          this.vol.contact_id = {}
          this.vol.contact_id.region = this.response.region
          this.vol.contact_id.zone = this.response.zone
          this.vol.contact_id.city = this.response.city
          this.vol.contact_id.subcity = this.response.subcity
          this.vol.contact_id.woreda = this.response.woreda
          this.vol.contact_id.house_number = this.response.house_number
          this.vol.contact_id.phone_number = this.response.phone_number
          this.vol.contact_id.emergency_contact = this.response.emergency_contact
          if (this.vol.disability_status === 'true') {
            this.vol.disability_status = true
          } else {
            this.vol.disability_status = false
          }
          axios({ method: 'POST', url: 'https://stormy-meadow-78369.herokuapp.com/api/volunteer', data: this.vol, headers: { 'content-type': 'application/json' } }).then(result => {
            if (result.data.first_name !== this.vol.first_name) {
              this.trigger()
            }
          }, error => {
            console.error(error)
            this.trigger()
          })
        }, error => {
          console.error(error)
          this.trigger()
        })
      },
      login () {
        this.vol = {}
        this.vol.email = this.email
        this.vol.password = this.password
        axios({
          method: 'GET',
          url: 'https://stormy-meadow-78369.herokuapp.com/api/volunteer',
          data: this.vol,
          headers: { 'content-type': 'application/json' },
        }).then(result => {
          if (result.data[0].email === this.email && result.data[0].password === this.password) {
            this.$router.push('volunteers')
          } else {
            this.noUser = true
          }
        }, error => {
          console.error(error)
        })
      },
      trigger () {
        this.snackbar = true
      },
    },
  }
</script>
