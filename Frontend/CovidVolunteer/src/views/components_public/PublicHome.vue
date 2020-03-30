<template>
  <v-container
    id="dashboard"
    tag="section"
  >
    <v-col
      class="align-end"
      cols="12"
      lg="12"
    >
      <img
        height="370px"
        width="370px"
        :src="'https://scontent.fadd1-1.fna.fbcdn.net/v/t1.15752-9/91397625_1470240889823152_7387739624845606912_n.jpg?_nc_cat=106&_nc_sid=b96e70&_nc_ohc=D4lFk4-pOLcAX8RaVF_&_nc_ht=scontent.fadd1-1.fna&oh=e2f5ecd2a47c480161d7fc773eb21330&oe=5EA543FC'"
      >
    </v-col>
    <v-row>
      <v-col
        cols="12"
        lg="12"
      >
        <base-material-card
          color="info"
        >
          <template v-slot:reveal-actions>
            <v-tooltip bottom>
              <template v-slot:activator="{ attrs, on }">
                <v-btn
                  v-bind="attrs"
                  color="info"
                  icon
                  v-on="on"
                >
                  <v-icon
                    color="info"
                  >
                    mdi-refresh
                  </v-icon>
                </v-btn>
              </template>

              <span>Refresh</span>
            </v-tooltip>

            <v-tooltip bottom>
              <template v-slot:activator="{ attrs, on }">
                <v-btn
                  v-bind="attrs"
                  light
                  icon
                  v-on="on"
                >
                  <v-icon>mdi-pencil</v-icon>
                </v-btn>
              </template>

              <span>Change Date</span>
            </v-tooltip>
          </template>

          <h4 class="card-title font-weight-light mt-2 ml-2">
            Let's Help One Another
          </h4>

          <p class="d-inline-flex font-weight-light ml-2 mt-1">
            "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
          </p>
        </base-material-card>
      </v-col>

      <v-col
        v-for="op of opportunities.slice(0,3)"
        :key="op.id"
        cols="12"
        md="4"
      >
        <base-material-card
          color="info"
          class="px-5 py-3"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              {{ op.name }}
            </div>

            <div class="subtitle-1 font-weight-light">
              {{ op.end_date }}
            </div>
          </template>
          <v-card-text>
            {{ op.brief_description }}
          </v-card-text>
          <v-btn
            class="ma-2"
            outlined
            color="info"
            @click="Details(op)"
          >
            Detail
          </v-btn>
        </base-material-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <div class="my-2">
          <v-btn
            outlined
            text
            to="/volunteer"
          >
            SHOW ALL
          </v-btn>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  import axios from 'axios'
  export default {
    name: 'Home',
    data: function () {
      return {
        opportunities: [],
      }
    },
    mounted: function () {
      axios.get('https://stormy-meadow-78369.herokuapp.com/api/opportunity')
        .then(response => (this.opportunities = response.data))
        .catch(console.log('error occured'))
        .finally(console.log('loading complete'))
    },
    methods: {
      complete (index) {
        this.list[index] = !this.list[index]
      },
      Details (value) {
        this.$router.push({ path: `/opportunityDetails/${value.id}` })
      },
    },
  }
</script>
