<style lang="scss">
    @import 'SearchComponent.scss';
</style>

<template>
    <section class="search">
        <menu-component></menu-component>
        <modal-component v-if="showModal" class="p-dtn" :movie="modalContent" @close="showModal = false;toggleModal();"></modal-component>

        <div class="filter">
                <input type="text" v-model="keyword" placeholder="Movie name .."/>
                <span v-if="searchby.length">{{searchby.length}} posts found</span>
                <button class="filter-submit" @click.prevent="search()"> Search </button>
        </div>
        <h2 v-if="!keyword && searchby.length <= 0" class="search-text">Search for any movie!</h2>
        <div v-if="keyword && searchby.length" class="search-content" v-masonry transition-duration="0s" item-selector=".it">
            <div v-masonry-tile class="it" v-for="(movie, index) in searchby" :id="index" :key="index">
                    <a class="it-lnk" :href="'/'" @click.prevent="clickMovie($event, movie.id)">
                        <img class="it-img _lz" :src="movie.poster_path"/>
                        <h2 class="it-ttl">Title: {{ movie.original_title }}</h2>
                        <span class="it-txt">Genre IDs: {{ movie.genre_ids }}</span>
                        <span class="it-txt">Release Date: {{ movie.release_date }}</span>
                    </a>
                </div>
        </div>
        <h2 v-else-if="keyword && !searchby.length" class="search-text no">Movie Not Found!</h2>
    </section>
</template>

<script>
  export default {
    data() {
        return {
            searchby: [],
            keyword: '',
            j: 1,
            modalContent: {},
            showModal: false,
            filtered: false,
            requesting: false
        };
    },
    methods: {
         search() {
            this.filtered = false;
            this.searchPosts(this);
        },
        toggleModal() {
            let body = $('body');

            if(this.showModal){
                body.addClass('MD-ACT LOCK');
            } else {
                body.removeClass('MD-ACT LOCK');
                this.modalContent = '';
            }
        },
        clickMovie(event, id) {
            let body = $('body');

            this.key = id;
            this.getDetails(this);
            this.showModal = true;

            this.toggleModal();                    
        }
    }

  }
</script>