<style lang="scss">
    @import 'FeedComponent.scss';
</style>

<template>
    <div class="content">
        <menu-component></menu-component>
        <modal-component v-if="showModal" class="p-dtn" :html="modalContent.html" :href="modalContent.href" @close="showModal = false"></modal-component>

        <div class="p-orn">
            <h1 v-if="requesting">Loading...</h1>
            <div v-if="posts.length" v-masonry transition-duration="0s" item-selector=".it">
                <div v-masonry-tile class="it" v-for="(post, index) in posts" :id="index" :key="index">
                    <a class="it-lnk" :href="'/modal'" @click.prevent="clickModal($event,post.id)">
                        <img class="it-img _lz" :src="post.poster_path"/>
                        <h2 class="it-ttl">Title: {{ post.original_title }}</h2>
                        <span class="it-txt">Genre IDs: {{ post.genre_ids }}</span>
                        <span class="it-txt">Release Date: {{ post.release_date }}</span>
                    </a>
                </div>
            </div>
            <h2 v-if="!posts.length">Ops! No results found for {{query }}</h2>
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
              showModal:false,
              key: '',
              modalContent: {html: '', info: {}, href: ''},
              query: '',
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
            postHandler(href) {
                let FeedComponent, body;

                body = $('body');
                FeedComponent = this;

                function render() {
                    axios
                        .get(href)
                        .then(result => (FeedComponent.modalContent.html = result.data));

                        // Modal Active
                        body.addClass('MD-ACT LOCK');
                }

                function destroy() {
                    FeedComponent.modalContent.html = '';

                    // Modal Active
                    body.removeClass('MD-ACT LOCK');
                }

                if (href) render(); else destroy();
            },
            clickModal(event, id) {
                if (this.modalOpen) {
                    this.postHandler(false);
                    this.showModal = false;
                } else {
                    let href = event.target.parentElement.getAttribute('href');

                    this.modalContent.href = href;

                    this.key = id;
                    this.getDetails(this);

                    this.postHandler(href);
                    this.showModal = true;
                }
            }
           
        },
        beforeMount() {
            this.postHandler();
            this.getMovies(this);
            this.getModal(this);
        },
        mounted() {
            this.paginate();
        }
    }
</script>