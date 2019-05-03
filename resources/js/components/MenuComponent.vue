<style lang="scss">
    @import 'MenuComponent.scss';
</style>

<template>
    <nav class="menu">
            <ul class="menu-content">
                <li class="menu-it"><a :href="'/home'">Feed</a></li>
                <li class="menu-it"><a :href="'/search'">Search</a></li>
            </ul>
    </nav>
</template>
<script>
  export default {

  }
</script>