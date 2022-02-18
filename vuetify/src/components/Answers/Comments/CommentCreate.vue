<template>
<div>
    <v-form
    ref="form"
    @submit.prevent="submit"
  >

<v-container fluid>
        <v-textarea 
          name="input-7-7"
          filled
          auto-grow
          v-model="text"
          label="Text"
          rows="7"
          row-height="20"
        ></v-textarea>
  </v-container>

  <v-container fluid>
        <v-textarea
          name="input-7-7-7"
          filled
          auto-grow
          v-model="author_name"
          label="Author Name"
          rows="1"
          row-height="20"
        ></v-textarea>
</v-container>


<v-container fluid>
    <v-btn
      color="success"
      class="mr-4"
      type="submit"
    >
      Save
    </v-btn>

</v-container>

  </v-form>

<v-card
    class="mx-auto mb-4"
    max-width="400"
    tile
  >
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title>Внимание!</v-list-item-title>
            <v-list-item-subtitle>
                Ваш комментарий будет проверен модератором.
            </v-list-item-subtitle>
            <v-list-item-subtitle>
                Рассмотрен будет только первый оставленный комментарий!
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item> 

</v-card>

  <v-dialog
      v-model="dialog"
      max-width="300"
    >
      <v-card>
        <v-card-title class="text-h6">
            Спасибо<br>
        </v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="close"
          >
            OK
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

</div>
</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data: () => ({
        id: '',
        parent_id: 0,
        template_id: 0,
        text: '',
        author_id: '',
        author_name: '',
        author_email: '',
        aviable: 0,
        user: {},
        dialog: false,
    }),
    methods: {
        start(){
            this.template_id = this.$route.params.id
            this.author_email = this.$store.getters.USER_EMAIL
            this.getUser()
        },
        close(){
          this.dialog = false
          this.$router.push('/template-categories')
        },
        getUser(){
            axios
                .get('/api/user/' + this.author_email)
                .then(response => {
                    this.user = response.data;
                    this.author_name = this.user[0].name
                    this.author_id = this.user[0].id
                    console.log(this.author_name)
                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });
        },
        submit(){
            console.log('submit')

            axios.post('/api/comment-create', {  
                parent_id: this.parent_id,
                template_id: this.template_id,
                text: this.text,                           
                author_id: this.author_id,                           
                author_name: this.author_name,                           
                author_email: this.author_email,                           
                aviable: this.aviable,                           
                })
                    .then( response => {
                        console.log(response)
                        this.dialog = true
                        setTimeout(() => { this.$router.push('/template-categories')}, 3000)
                        
                        // console.log('Updated Answer ID: ' + this.id)

                        // this.$router.push( '/answer-update-object/' + `${this.id}`)
                    })
                    .catch( err => {
                        // console.log('error')
                        console.log(err.response);
                }) 
        },
    },
    created () {

    }, 
    updated (){

    },
    mounted() {
        console.log('mounted')
        this.start()
    }

    }

</script>