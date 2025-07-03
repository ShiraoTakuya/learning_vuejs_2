<template>
  <div>This is just page 2</div>
  <div class="column">
    <Link href="/">ページ1へ移動（SPA）</Link>
    <a href="/">ページ1へ移動（NORMAL）</a>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

import AppLayout from '@/Layouts/AppLayout.vue'
defineOptions({
  layout: AppLayout,
})

</script>

<style scoped>
.column {
  display: flex;
  flex-flow: column;
}
</style>