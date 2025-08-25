<template>
    <h1>Customer Detail Page</h1>
   {{ data }}

</template>
<script setup>
const props = defineProps({
  data: String
})
console.log(props.data)
</script>