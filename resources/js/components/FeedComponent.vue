<style lang="scss">
    @import 'FeedComponent.scss';
</style>

<template>
    <div class="content">
        <menu-component></menu-component>
        <modal-component v-if="showModal" class="p-dtn" :movie="modalContent" @close="showModal = false;toggleModal();"></modal-component>

        <div class="p-orn">       
            <div v-if="posts.length" v-masonry transition-duration="0s" item-selector=".it">
                <div v-masonry-tile class="it" v-for="(post, index) in posts" :id="index" :key="index">
                    <a class="it-lnk" :href="'/'" @click.prevent="clickMovie($event,post.id)">
                        <img class="it-img _lz" :src="post.poster_path"/>
                        <h2 class="it-ttl">Title: {{ post.original_title }}</h2>
                        <span class="it-txt">Genre IDs: {{ post.genre_ids }}</span>
                        <span class="it-txt">Release Date: {{ post.release_date }}</span>
                    </a>
                </div>
            </div>
            <h2 v-if="!posts.length">Loading...</h2>
        </div>

    </div>
</template>

<script>
    export default {
        data () {
            return {
              i: 1,
              j: 1,
              z: 0,
              requested: false,
              requesting: false,
              showModal: false,
              key: '',
              modalContent: {},
              posts: []
            };
        },
        methods: {
            bottomOfWindow() {
                return window.pageYOffset + window.innerHeight === document.documentElement.offsetHeight;
            },
            paginate() {
                window.onscroll = () => {
                    if (!this.requested && this.bottomOfWindow())
                        this.getMovies(this);
                }
            },
            toggleModal() {
                let body = $('body');

                if(this.showModal){
                    body.addClass('MD-ACT LOCK');
                } else {
                    body.removeClass('MD-ACT LOCK');
                }
            },
            clickMovie(event, id) {
                let body = $('body');

                this.key = id;
                this.getDetails(this);
                this.showModal = true;

                this.toggleModal();                    
            }
           
        },
        beforeMount() {
            this.getMovies(this);
        },
        mounted() {
            this.paginate();
        }
    }
</script>