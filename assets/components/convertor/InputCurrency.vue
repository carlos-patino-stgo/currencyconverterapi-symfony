<template>
  <input
    :required="isRequired"
    :value="amount"
    @input="$emit('update:amount', $event.target.value)"
    :readonly="readOnly"
    type="number"
    step="0.01"
    class="form-control h-100 border-0"
  >
</template>

<script>
export default {
  name: "InputCurrency",
  props: {
    isRequired: {
      type: Boolean,
      default: false
    },
    amount: {
      required: true
    },
    readOnly: {
      type: Boolean,
      default: false
    }
  }
}
</script>

<style scoped>
input {
  outline: none;
}
.form-control:focus {
  box-shadow: none;
  border: none;
}
.form-control:disabled,
.form-control[readonly] {
  background-color: transparent !important;
}
</style>
