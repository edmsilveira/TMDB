<style lang="scss">
    @import 'SearchComponent.scss';
</style>

<template>
    <section class="search">
        <menu-component></menu-component>
        <modal-component v-if="showModal" class="p-dtn" :movie="modalContent" @close="showModal = false;toggleModal();"></modal-component>

        <div class="filter">
                <input class="filter-input" type="text" v-model="keyword" placeholder="Movie name .."/>
                <button class="filter-submit" @click.prevent="search()"> Search </button>
        </div>
        <div v-if="searchby.length" class="search-content" v-masonry transition-duration="0s" item-selector=".it">
            <div v-masonry-tile class="it" v-for="(movie, index) in searchby" :id="index" :key="index">
                    <a class="it-lnk" :href="'/'" @click.prevent="clickMovie($event, movie.id)">
                        <img class="it-img _lz" :src="movie.poster_path"/>
                    </a>
                    <div class="it-inf">
                        <h2 class="it-ttl">Title: {{ movie.original_title }}</h2>
                        <span class="it-txt">Genre IDs: {{ movie.genre_ids }}</span>
                        <span class="it-txt">Release Date: {{ movie.release_date }}</span>
                    </div>
            </div>
        </div>
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
        bottomOfWindow() {
                return window.pageYOffset + window.innerHeight === document.documentElement.offsetHeight;
            },
        paginate() {
            window.onscroll = () => {
                if (!this.filtered && this.bottomOfWindow())
                    this.searchPosts(this);
            }
        },
         search() {
            let search = $('.search');

            if(this.keyword === '') {
                search.removeClass('found-posts');    
            } else {
                search.addClass('found-posts');
            }

            this.filtered = false;

            if(this.searchby.length > 0) {
                this.searchby = [];
            }

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
            this.key = id;
            this.getDetails(this);
            this.showModal = true;

            this.toggleModal();                    
        }
    },
    mounted() {
        this.paginate();
    }

  }
</script>