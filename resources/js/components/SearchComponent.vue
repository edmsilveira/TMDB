<style lang="scss">
    @import 'SearchComponent.scss';
</style>

<template>
    <section class="search">
        <menu-component></menu-component>
        <div class="filter">
                <input type="text" v-model="keyword" placeholder="Search it .."/>
                <span v-if="filterby.length">{{filterby.length}} posts found</span>
                <button class="filter-submit" @click.prevent="search()"> Search </button>
        </div>
        <h2 v-if="!keyword &&filterby.length <= 0" class="search-text">Faça a sua procura de posts!</h2>
        <div v-if="keyword && filterby.length" class="search-content" v-masonry transition-duration="0s" item-selector=".it">
            <div v-masonry-tile class="it filtered _lz" v-for="(filtred, index) in filterby" :id="filtred.id" :key="filtred.id">
                <a class="it-lnk" :href=" index % 2 === 0 ? '/modal' : '/ladom'" @click.prevent="clickModal($event), getInfo(filterby[index])">
                    <img class="it-img _lz" :src="filtred.post_image"/>
                    <h2 class="it-ttl">{{ filtred.post_title }}</h2>
                </a>
            </div>
        </div>
        <h2 v-else-if="keyword && !filterby.length" class="search-text no">NÃO TEM NADA</h2>
    </section>
</template>

<script>
  export default {
    data() {
        return {
            filterby: [],
            keyword: '',
            filtered: false,
            requesting: false
        };
    },
    methods: {
         search() {
            this.filtered = false;
            this.searchPosts(this);
        }
    }

  }
</script>