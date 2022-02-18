<template>
    <div>

    <v-card
    class="mx-auto"
    max-width="500"
    >
        <v-card-title>
        You Game Score {{ score }}
        </v-card-title>
        <v-card-subtitle>
        <b>You Total Score:</b> {{ user_total }} <br>     
        </v-card-subtitle>
    </v-card>

  <v-card
    max-width="500"
    class="mx-auto"
  >
    <v-toolbar
      color="indigo"
      dark
    >

      <v-toolbar-title>Records</v-toolbar-title>

      <v-spacer></v-spacer>

    </v-toolbar>
    <v-list>
      <v-list-item
        v-for="top of tops"
        :key="top.email"
      >
        <v-list-item-icon>
          <v-icon
            color="pink"
          >
            mdi-star
          </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ top.score }} - {{ top.name }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-card>

    </div>
</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data: () => ({
        user_email: '',
        user_name: '',
        user_total: '',
        score: '',
        tops: []
    }),
    methods: {
        start(){
            this.user_email = this.$store.getters.USER_EMAIL
            this.user_name = this.$store.getters.USER_NAME
            this.score = this.$store.getters.TOTAL
            this.user_total = Number(this.$store.getters.USER_SCORE) + Number(this.score)
        },
        updateScore(){
            axios.post('/api/add-score', { user_email: this.user_email, score: this.score })
            .then( r => {
                return response
            })
            .catch( err => {
                console.log(err.response);
            })
        },
        top10(){
             axios
                .get("/api/score-top10")
                .then(response => {
                    this.tops = response.data;
                    console.log(this.tops)
                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });
        }
    },
    created () {

    }, 
    updated (){

    },
    mounted() {
        console.log('mounted')
        this.start()
        this.updateScore()
        this.top10()
    }

    }

</script>
