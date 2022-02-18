<template>

      <!-- MAIN  -->
        <div class="app">
            <div class="app__header">
                <img src="img/logo.png" class="app__logo">
            </div>
            <div class="app__body">
                <router-link class="routerLink" to="/">
                <button class="app__btn">
                    <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                    <div class="app__btn-text">Home</div>
                </button>
                </router-link>
                <button class="app__btn">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <div class="app__btn-text">Records</div>
                </button>
                <button class="app__btn">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <div class="app__btn-text">Author</div>
                </button>
                <button class="app__btn btn__sound">
                    <i class="fa fa-volume-up" aria-hidden="true"></i>
                    <div class="app__btn-text">Sound</div>
                </button>
            </div>
        </div>

</template>

<script>
  export default {
    name: 'Test'
  }
</script>
