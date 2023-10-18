<template>
  <staticHeader></staticHeader>
  <router-view />
  <staticFooter></staticFooter>
</template>
<script>
import staticHeader from './resources/components/static/header.vue'
import staticFooter from './resources/components/static/footer.vue'
export default {
  components: {
    staticHeader,
    staticFooter
  }
}
</script>
