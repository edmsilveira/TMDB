<style lang="scss">
    @import 'ModalComponent.scss';
</style>

<template>
    <div class="modal-mask">
          <div class="modal-body">
            <slot name="body">
              <div v-if="html" v-html="html"></div>
              <div v-if="popup">
                  <h2 class="pin-title">{{popup.name}}</h2>
                  <span class="pin-address">{{popup.address}}</span>
                  <span class="pin-fone">{{popup.phone}}</span>
              </div>
            </slot>
          </div>
            <button class="modal-default-button" @click="$emit('close');"> Fechar </button>
    </div>
</template>

<script>
  export default {
    props: {
        html: null,
        popup: {},
        href: ''
    },
    mounted() {
      if (this.$router.currentRoute.path !== '/where') {
        this.$router.push(this.href);
      }
      
    },
    destroyed () {
      this.$router.push('/home')
    }
  }
</script>