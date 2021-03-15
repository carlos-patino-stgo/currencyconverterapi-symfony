<template>
  <b-dropdown :text="currency" class="bg-transparent border-0">
    <b-dropdown-item 
      @click="setCurrency(currency.name)"
      v-for="currency in currencies" 
      v-bind:key="currency.name"
    >
    {{ currency.name}}
    </b-dropdown-item>
  </b-dropdown>
</template>

<script>
export default {
  name: "DropdownCurrency",
  props: {
    currencies: {
      type: Array,
      default: []
    },
    currency: ''
  },
  mounted() {
    this.setCurrency(this.currencies[0].name);
  },
  methods: {
    setCurrency(currency) {
      this.$emit('update:currency', currency);
    }
  }
}
</script>

<style scoped>
  .btn-check:active + .btn-outline-secondary,
  .btn-check:checked + .btn-outline-secondary,
  .btn-outline-secondary.active,
  .btn-outline-secondary.dropdown-toggle.show,
  .btn-outline-secondary:active {
    color: #6c757d !important;
  }
</style>
