
<template>

<div>

<v-card
    :to="'/card/' + card.id"
    v-for="card in cards.data" :key="card.id"
    class="mx-auto"
    max-width="344"
  >
    <v-img
      :src="serverUrl + card.img1"
      max-height="450"
      contain
    ></v-img>

    <v-card-title>
      Подробнее о карте>>
    </v-card-title>

      <v-spacer></v-spacer>


    <br>

  </v-card>
  
  

  <br>

<pagination 
    :data="cards" 
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
            cards: {},
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

			axios.get('/api/card-category/' + this.cat_id + '?page=' + page)
				.then(response => {
					this.cards = response.data;
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