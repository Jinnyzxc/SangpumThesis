<template>
  <staticHeader></staticHeader>
  <router-view />
</template>
<script>
import staticHeader from './resources/components/static/header.vue'

export default {
  components: {
    staticHeader
  }
}
</script>
