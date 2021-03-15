<template>
  <div class="w-100 bg-white p-4">
    <div class="input-group w-100 h-100">
      <slot></slot>
      <slot name="drop-down"></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "BoxInput"
}
</script>