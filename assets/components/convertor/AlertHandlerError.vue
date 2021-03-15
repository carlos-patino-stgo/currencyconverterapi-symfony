<template>
  <b-alert
    variant="warning"
    :show="showError"
    class="w-100 mb-2"
  >
    <ul>
      <li v-for="(msg, key) in errMsg" v-bind:key="key">
        {{ key }}: {{ msg }}
      </li>
    </ul>
  </b-alert>
</template>

<script>
export default {
  name: "AlertHandlerError.vue",
  props: {
    showError: {
      type: Boolean,
      default: false
    },
    errMsg: {
      default: []
    }
  }
}
</script>

<style scoped>

</style>