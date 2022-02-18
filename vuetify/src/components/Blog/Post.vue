<template v-slot:post.body="{{post.body}}">

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
      {{ post.title }}
    </v-card-title>

    <v-card-subtitle>
      <b>Author:</b> {{ post.author }} <br>
      <b>Date:</b> {{ post.date }} <br>
      <b>Description:</b> {{ post.subtitle  }} <br>
      
    </v-card-subtitle>



    <v-card-actions>
      <v-btn
        color="orange lighten-2"
        text
      >
        Read More
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

   <div v-html="post.body"></div>

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
        name: 'Post',
        post: '',
        show: false,
        imageUrl: ''
    }),
    methods: {
        async getPost(){


            this.post_id = this.$route.params.id

            console.log(this.post_id)

            // console.log(this.$store.getters.serverUrl)

            
            await axios
                .get('/api/post/' + this.post_id 
                //{
                // params: {
                //         id: this.cat_id
                //     }
                // }
                )
                .then(response => {
                    this.post = response.data[0];
                })
                .catch(function(e){
                    // console.log('error')
                    this.error = e;
                });

                this.imageUrl = this.$store.getters.serverUrl + this.post.img

        }
    },
    created() {
        this.getPost()
    },
    updated (){
        // this.getGameCategory()
    },
    mounted() {
        // this.getGameCategory()
    }

    }

</script>