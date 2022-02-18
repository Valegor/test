<template>

<div>

<v-card
    :to="'/game/' + game.id"
    v-for="game in games.data" :key="game.id"
    class="mx-auto"
    max-width="344"
  >

    <v-list-item>
        <v-list-item-content>
            <v-list-item-title><h3>{{ game.name }}</h3></v-list-item-title>
        </v-list-item-content>
    </v-list-item> 

    <v-img
      :src="serverUrl + game.img"
      max-height="150"
      contain
    ></v-img>

    <v-card-title>
      Подробнее >>
    </v-card-title>

      <v-spacer></v-spacer>


    <br>

  </v-card>
  
  

  <br>

<pagination 
    :data="games" 
    @pagination-change-page="getResults"
    :limit=2
    size="small"
    align="center"
></pagination>

</div> 

</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data () {
        return {
            games: {},
            page: 1,
            cat_id: '',
            show: false,
            serverUrl: ''

        }
    },
    methods: {
        getResults(page = this.page) {

            this.cat_id = this.$route.params.id

            // console.log(this.cat_id)

			axios.get('/api/game-categories/' + this.cat_id + '?page=' + page)
				.then(response => {
					this.games = response.data;
				});
            
            this.serverUrl = this.$store.getters.serverUrl;
		}
    },
    created() {

    },
    updated (){

    },
    mounted() {
        this.getResults()
    }

    }

</script>