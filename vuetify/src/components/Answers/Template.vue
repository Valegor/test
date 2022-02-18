
<template v-slot:game.notes="{{game.notes}}">

<div>

  <v-card
    class="mx-auto"
    max-width="344"
  >
    <v-img
      :src="this.imageUrl"
      max-height="200"
      contain
    ></v-img>

    <v-card-title>
      {{ game.name }}
    </v-card-title>

    <v-card-subtitle>
      <b>Description:</b> {{ game.subtitle  }} <br>
      <b>Author:</b> {{ game.author }} <br>
      <b>Category:</b> {{ game.category }} <br>
      <b>Date:</b> {{ game.date }} <br>
      <hr>
        <v-btn
        color="success"
        dark
        @click.prevent="$router.push( '/answer-create/' + `${game.id}` )"
        >
        Create Answer
        </v-btn>
    </v-card-subtitle>

    <v-card-actions>
      <v-btn
        color="orange lighten-2"
        text
      >
        Read More!
      </v-btn>

      <v-spacer></v-spacer>

      <v-btn
        icon
        @click="show = !show"
      >
        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
      </v-btn>
    </v-card-actions>

    <v-expand-transition>

      <div v-show="show">

        <v-divider></v-divider>

        <v-card-text>
            <div v-html="game.notes"></div>
        </v-card-text>

      </div>
    </v-expand-transition>
  </v-card>

 </div> 

</template>

<script>

    import axios from '@/axios/axios'
   

    export default {
    data: () => ({
        game: '',
        game_id: '',
        cards: '',
        show: false,
        imageUrl: '',
        serverUrl: '',
        object: {},
        user_name: '',
        user_email: '',
        user_score: 0,
        user: {},
    }),
    methods: {
        async getGame(){

            this.game_id = this.$route.params.id
    
            await axios
                .get('/api/template/' + this.game_id)
                .then(response => {
                    this.game = response.data[0];
                    // console.log(this.game)
                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });

                this.imageUrl = this.$store.getters.serverUrl + this.game.img
        },
    },
    created() {
        this.getGame()
        // this.getGameCards()
        // this.getUser()
    },
    updated (){
        // this.getUser()
    },
    mounted() {
        this.getGame()
    }

    }

</script>
