<template>
    <v-container>
        <v-row justify="center">
            PLEESE WAIT
        </v-row>
        <v-row justify="center">
            <div class="text-center">
                <v-progress-circular
                :size="70"
                :width="7"
                indeterminate
                color="primary"
                ></v-progress-circular>
            </div>  
        </v-row>

    </v-container>
</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data: () => ({
        id: '',
        exist_answer: '',
        author_email: '',
        template_id: '',
        author_id: '',
        author_name: '',
        aviable: 0,
        title: 'title here',
        subtitle: 'subtitle here',
        notes: 'notes here',
        object: {}
    }),
    methods: {
        start(){
            console.log('start create template')
            this.exist()
        },
        createAnswer(){

            axios.post('/api/answer-create', {                
                title: this.title,
                template_id: this.template_id,  
                subtitle: this.subtitle,
                notes: this.notes,
                author_id: this.author_id,
                author_name: this.author_name,
                author_email: this.author_email,
                aviable: this.aviable,
                object: this.object,               
                })
                    .then( response => {
                        console.log(response)
                        
                        this.id = response.data.data.id
                        console.log('Created Answer ID: ' + this.id)

                        this.$router.push( '/answer-update-object/' + `${this.id}`)

                        // return response
                    })
                    .catch( err => {
                        // console.log('error')
                        console.log(err.response);
                }) 
        },
        create(){

            console.log('create')
            this.getAuthor()

        },
        getAuthor(){

            axios
                .get('/api/user/' + this.author_email)
                .then(response => {
                    this.author_name = response.data[0].name;
                    this.author_id = response.data[0].id;

                    console.log('Author id: ' + this.author_id)
                    console.log('Author name: ' + this.author_name)

                this.getObject()

                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });

        },
        getObject(){

            this.template_id = this.$route.params.id

            axios
                .get('/api/template/' + this.template_id)
                .then(response => {

                    this.object = response.data[0].object;

                this.createAnswer()    

                    // console.log('Object: ' + this.object)
                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });

        },
        exist(){
            
            this.template_id = this.$route.params.id
            this.author_email = this.$store.getters.USER_EMAIL

            //проверить есть ли у этого автора незавершенный ответ на дынный шаблон

            axios.post('/api/answer-check', { author_email: this.author_email, template_id: this.template_id })
                    .then( response => {
                        
                        this.exist_answer = response.data

                        console.log('Exist Answer ID: ' + this.exist_answer)

                        if(this.exist_answer > 0){
                            this.$router.push( '/answer-update-passport/' + `${this.exist_answer}`)
                        } else { this.create() }

                        return response
                    })
                    .catch( err => {
                        // console.log('error')
                        console.log(err.response);
                    })  
        }

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