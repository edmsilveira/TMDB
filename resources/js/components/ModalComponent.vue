<style lang="scss">
    @import 'ModalComponent.scss';
</style>

<template>
    <div class="modal-mask">
          <div class="modal-body">
            <slot name="body">
              <section v-if="movie" class="modal-body-wr">
                  <h2 class="it-ttl">Title: {{movie.original_title}}</h2>
                  <img class="it-img _lz" :src="movie.poster_path"/>
                  <span class="it-txt">Genre: {{movie.genre}}</span>
                  <span class="it-txt">Overview: {{movie.overview}}</span>
                  <span class="it-txt">Release Date: {{movie.release_date}}</span>
              </section>
            </slot>
          </div>
          <button class="modal-default-button" @click="$emit('close');"> X </button>
    </div>
</template>

<script>
  export default {
    props: {
        movie: {}
    }
  }
</script>