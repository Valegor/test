<template>

  <!-- <div id="app"> -->
    <!-- App.vue -->

<v-app>

  <v-navigation-drawer
      app
      temporary
      v-model="drawer"
  >
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6">
            MEDIFIT-GAMES
          </v-list-item-title>
          <v-list-item-subtitle>
            www.medifit.ru
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <menu-list ref="child3"></menu-list>

  </v-navigation-drawer>
  <!-- <v-app-bar  app></v-app-bar> -->
    <v-app-bar
      app
      color="primary"
      dence
      dark
    >
      <!-- <v-app-bar-nav-icon> </v-app-bar-nav-icon> -->
        
      <v-app-bar-nav-icon 
          @click="drawer = !drawer"
          class="hidden-md-and-up"
      ></v-app-bar-nav-icon>


  <!-- <v-toolbar-title> -->
                    
        <v-btn
            depressed
            color="primary"
            router-link to=/
            >
            <v-icon left>mdi-home</v-icon>
              ГЛАВНАЯ
        </v-btn>
      <!-- </v-toolbar-title> -->

      <v-spacer></v-spacer>

          <v-toolbar-items>

              <menu-buttons ref="child2"></menu-buttons>

        </v-toolbar-items>

    </v-app-bar>


  <!-- Sizes your content based upon application components -->
  <v-main>

    <!-- Provides the application the proper gutter -->
    <v-container fluid>
        <section class="content">

            <!--Элемент, который при отрисовке будет замененм на ваш view-->
            <slot/>

        </section>
    </v-container>
  </v-main>


  <v-footer
    color="primary"
    padless
  >
    <v-row
      justify="center"
      no-gutters
    >
        <div class="hidden-sm-and-down" >

          <menu-buttons ref="child1"></menu-buttons>

        </div>
      <v-col
        class="primary lighten-2 py-4 text-center white--text"
        cols="12"
      >
        {{ new Date().getFullYear() }} — <strong>MEDIFIT-GAMES</strong>
      </v-col>
    </v-row>
  </v-footer>
</v-app>
  <!-- </div> -->
</template>



<script>

  import MenuButtons from '@/components/Template/MenuButtons.vue'
  import MenuList from '@/components/Template/MenuList.vue'


  export default {
    components: { MenuButtons, MenuList },
    data () {
      return {
        right: null,
        collapseOnScroll: true,
        drawer: false,
      }
    },
    mounted() {

        },

        updated() {
          this.$refs.child1.getToken();
          this.$refs.child2.getToken();
          this.$refs.child3.getToken();
        },
    methods: {

        },
  }
</script>