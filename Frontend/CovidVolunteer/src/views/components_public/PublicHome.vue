<template>
  <v-container
    id="dashboard"
    tag="section"
  >
    <v-row>
      <v-img src="abren" />
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
        cols="12"
      >
        <h2 class="lg-6">
          Recent Opportunities
        </h2>
        <div class="my-2">
          <v-btn
            outlined
            text
          >
            SHOW ALL
          </v-btn>
        </div>
      </v-col>

      <v-col
        cols="12"
        md="4"
      >
        <base-material-card
          color="info"
          class="px-5 py-3"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              Opportunity A
            </div>

            <div class="subtitle-1 font-weight-light">
              15th September, 2016
            </div>
          </template>
          <v-card-text>
            "Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
          </v-card-text>
          <v-btn
            class="ma-2"
            outlined
            color="info"
          >
            Detail
          </v-btn>
        </base-material-card>
      </v-col>
      <v-col
        cols="12"
        md="4"
      >
        <base-material-card
          color="info"
          class="px-5 py-3"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              Opportunity A
            </div>

            <div class="subtitle-1 font-weight-light">
              15th September, 2016
            </div>
          </template>
          <v-card-text>
            "Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
          </v-card-text>
          <v-btn
            class="ma-2"
            outlined
            color="info"
          >
            Detail
          </v-btn>
        </base-material-card>
      </v-col>
      <v-col
        cols="12"
        md="4"
      >
        <base-material-card
          color="info"
          class="px-5 py-3"
        >
          <template v-slot:heading>
            <div class="display-2 font-weight-light">
              Opportunity A
            </div>

            <div class="subtitle-1 font-weight-light">
              15th September, 2016
            </div>
          </template>
          <v-card-text>
            "Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
          </v-card-text>
          <v-btn
            class="ma-2"
            outlined
            color="info"
          >
            Detail
          </v-btn>
        </base-material-card>
      </v-col>

    </v-row>
  </v-container>
</template>

<script>
  export default {
    name: 'Home',

    data () {
      return {
        abren: require('../../assets/abren.jpg'),
      }
    },

    methods: {
      complete (index) {
        this.list[index] = !this.list[index]
      },
    },
  }
</script>
