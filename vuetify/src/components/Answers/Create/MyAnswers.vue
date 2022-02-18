<template>

<div>

<div
v-for="answer in answers.data" :key="answer.id"
>
<v-card
    class="mx-auto mb-4"
    max-width="400"
    tile
  >
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title><h3>{{ answer.title }}</h3></v-list-item-title>
            <v-list-item-subtitle>
                <h5>{{ answer.subtitle }}</h5>
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item>    
</v-card>

<v-card
    class="mx-auto mb-4"
    max-width="400"
    tile
    :to="'/answer-cards/' + answer.id"
>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-subtitle>
                EDIT ANSWERS CARDS
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item>      
</v-card>

<v-card
    class="mx-auto mb-4"
    max-width="400"
    tile
    :to="'/answer-update-passport/' + answer.id"
>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-subtitle>
                EDIT ANSWERS PASSPORT
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item>      
</v-card>

<hr>

</div>


<br>

</div> 

</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data () {
        return {
            answers: {},
            category: '',
            user_email: '',
            cat_id: '',
            show: false,
            serverUrl: '',

        }
    },
    methods: {
        getResults(page = this.page) {

            this.user_email = this.$store.getters.USER_EMAIL

			axios.get('/api/answers-email/' + this.user_email)
				.then(response => {
					this.answers = response;
				});
        
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


