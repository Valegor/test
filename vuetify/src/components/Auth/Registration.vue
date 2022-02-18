<template>
  <v-container fluid fill-height>
    <v-layout align-center justify-center>
      <v-flex xs12 sm8 md6>
        <v-card class="elevation-12">
          <v-toolbar dark color="primary">
            <v-toolbar-title>Registration form</v-toolbar-title>
          </v-toolbar>
          <v-card-text>
            <v-form v-model="valid" ref="form" lazy-validation>
              <v-text-field
                prepend-icon="mdi-email"
                name="name"
                label="Name"
                type="text"
                v-model="name"
                :counter="2"
                :rules="nameRules"
              ></v-text-field>
              <v-text-field
                prepend-icon="mdi-email"
                name="email"
                label="Email"
                type="email"
                v-model="email"
                :rules="emailRules"
              ></v-text-field>
              <v-text-field
                prepend-icon="mdi-lock"
                name="password"
                label="Password"
                type="password"
                :counter="8"
                v-model="password"
                :rules="passwordRules"
              ></v-text-field>
              <v-text-field
                prepend-icon="mdi-lock"
                name="password_confirmation"
                label="Confirm Password"
                type="password"
                :counter="8"
                v-model="password_confirmation"
                :rules="confirmPasswordRules"
              ></v-text-field>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              @click="onSubmit"
              :disabled="!valid"
            >Create account!</v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
  const emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/
  import axios from '../../axios/axios'

  export default {
    data () {
      return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        valid: false,
        nameRules: [
          v => !!v || 'Namr is required',
          v => (v && v.length >= 2) || 'Name must be equal or more than 2 characters'
        ],
        emailRules: [
          v => !!v || 'E-mail is required',
          v => emailRegex.test(v) || 'E-mail must be valid'
        ],
        passwordRules: [
          v => !!v || 'Password is required',
          v => (v && v.length >= 8) || 'Password must be equal or more than 8 characters'
        ],
        confirmPasswordRules: [
          v => !!v || 'Password is required',
          v => v === this.password || 'Password should match'
        ]
      }
    },
    methods: {
      onSubmit () {
        if (this.$refs.form.validate()) {


                    axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/register', 
                        { 
                            name: this.name , 
                            email: this.email, 
                            password: this.password, 
                            password_confirmation: this.password_confirmation  
                        })
                                .then( res => {
                                    // console.log('response')
                                    // console.log(res);
                                    localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                                    this.$router.push({ name: 'home' })
                                    return response
                                })
                                .catch( err => {
                                    // console.log('error')
                                    console.log(err.response);
                                })
                })

          // const user = {
          //   email: this.email,
          //   password: this.password
          // }

          // console.log(user)
        }
      }
    }
  }
</script>