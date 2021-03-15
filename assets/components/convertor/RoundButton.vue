<template>
  <b-overlay
      :show="loading"
      rounded
      opacity="0.3"
      spinner-small
      spinner-variant="primary"
      class="position-absolute m-auto absolute-center round-50"
    >
      <b-button 
        type="submit"
        variant="secondary"
        class="position-absolute m-auto absolute-center round-50 round-full z-2"
        :disabled="loading"
      >
        <span class="material-icons">{{ icon }}</span>
      </b-button>
    </b-overlay>
</template>

<script>
export default {
  name: "RoundButton",
  props: {
    icon: {
      type: String,
      default: 'cached'
    },
    loading: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style scoped>
.z-2 {
  z-index: 2;
}
.round-50 {
  width: 50px;
  height: 50px;
}
.round-full {
  border-radius: 50%;
}
.absolute-center {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
span {
  align-items: center;
  vertical-align: middle;
}
</style>
