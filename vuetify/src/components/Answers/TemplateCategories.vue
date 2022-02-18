
<template>

<div>

<v-card
    class="mx-auto mb-4 indigo lighten-4"
    max-width="400"
    tile
>
    <v-list-item>
    <v-list-item-content>
        <v-list-item-title
        class="h5"
        >
        ДОСТУПНЫЕ КАТЕГОРИИ ШАБЛОНОВ
        </v-list-item-title>
      </v-list-item-content>
    </v-list-item>
  </v-card>

  <v-card
    v-for="category in categories" :key="category.id"
    class="mx-auto mb-4"
    max-width="400"
    tile
    :to="'/template-category/' + category.id"
  >

    <v-list-item>
        <v-list-item-content>
            <v-list-item-title><h3>{{ category.category }}</h3></v-list-item-title>
        </v-list-item-content>
    </v-list-item> 

    <v-img
      :src="serverUrl + category.img"
      max-height="150"
      contain
    ></v-img>

      <v-spacer></v-spacer>

    <br>

  </v-card>


 </div> 

</template>

<script>
    import axios from '@/axios/axios'

    export default {
    data: () => ({
        name: 'PostCategories',
        categories: '',
        show: false,
        serverUrl: ''
    }),
    methods: {
        async getPostCategoryes(){

            console.log('categoryes')

            await axios
                .get("/api/template-categoryes/")
                .then(response => {
                    this.categories = response.data;
                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });

                this.serverUrl = this.$store.getters.serverUrl;

        }
    },
    created() {
        this.getPostCategoryes()
    },
    updated (){
        // this.getGameCategory()
    },
    mounted() {
        // this.getGameCategory()
    }

    }

</script>

