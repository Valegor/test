<template>
    <v-container>
        <v-row justify="center">
            ANSWER-UPDATE-OBJECT
        </v-row>
    </v-container>
</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data: () => ({
        id: '',
        game: {},
        dialog: false,
        finish: false,        
        blocks_count: 1,
        locus_tek: 1,
        block_tek_title: '',
        block_tek_subtitle: '',
        locuses_count: 1,
        locus_tek: 1,
        locus_tek_title: '',
        locus_tek_subtitle: '',
        card_answer: [],
        cards_tek_locus: [],
        card_count: 0,
        answer_number: 1,    
    }),
    methods: {
        start(){
            console.log('Start Object Update')
            this.loadObject()
        },
        startEdit(){
            console.log('Start Object Edit')
        },
        loadObject(){

                this.answer_id = this.$route.params.id

                axios.get('/api/answer/' + this.answer_id)
                .then(response => {
                    this.answer = response.data[0];
                    this.id = this.answer.id
                    this.game = JSON.parse(this.answer.object)
                    console.log('Id: ' + this.id)
                    this.startEdit()
                })
                .catch(function(e){
                    this.error = e;
                }); 
        },
    },
    created () {

    }, 
    updated (){

    },
    mounted() {
        this.start()
    }

    }

</script>