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
          v-model="title"
          label="Title"
          rows="1"
          row-height="20"
        ></v-textarea>
  </v-container>

  <v-container fluid>
        <v-textarea
          name="input-7-7-7"
          filled
          auto-grow
          v-model="subtitle"
          label="Subitle"
          rows="1"
          row-height="20"
        ></v-textarea>
</v-container>


<v-container fluid>
    <v-textarea
      name="input-7-1"
      filled
      label="Notes"
      v-model="notes"
      auto-grow
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

      <v-btn @click="editObject">
        EDIT CARDS
      </v-btn>

</v-container>

  </v-form>


  <v-dialog
      v-model="dialog"
      max-width="290"
    >
      <v-card>
        <v-card-title class="text-h5">
          Change Saved
        </v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
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
        answer: '',
        title: '',
        subtitle: '',
        notes: '',
        dialog: false,
    }),
    methods: {
        start(){
            console.log('start')
            this.getAnswer()
        },
        submit(){
            console.log('submit')
            console.log('Title: ' + this.title) 

            axios.post('/api/answer-update-passport', {  
                id: this.id,                           
                title: this.title,
                subtitle: this.subtitle,  
                notes: this.notes,              
                })
                    .then( response => {
                        console.log(response)
                        this.dialog = true
                        // console.log('Updated Answer ID: ' + this.id)

                        // this.$router.push( '/answer-update-object/' + `${this.id}`)
                    })
                    .catch( err => {
                        // console.log('error')
                        console.log(err.response);
                }) 
        },
        editObject(){
            console.log('object')
            this.$router.push( '/answer-cards/' + `${this.id}`)
        },
        getAnswer(){
            
            this.answer_id = this.$route.params.id
            
            axios.get('/api/answer/' + this.answer_id)
                .then(response => {
                    this.answer = response.data[0];
                    this.id = this.answer.id
                    this.title = this.answer.title
                    this.subtitle = this.answer.subtitle
                    this.notes = this.answer.notes
                    console.log('Subtitle: ' + this.subtitle)
                })
                .catch(function(e){
                    this.error = e;
                });              
        },
    },    
    created () {

    }, 
    updated (){
      // console.log('updated')
      // this.start()
    },
    mounted() {
        console.log('mounted')
        this.start()
    }
    }

</script>