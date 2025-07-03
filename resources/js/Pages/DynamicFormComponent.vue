<template>
  <div v-if="isReady">
    <div class="container">
      <form :action="formRoute" method="post">
        <input type="hidden" name="_token" :value="csrfToken" />
        <div v-for="(item, index) in initialData" :key="index">
          <component
            :is="componentMap[item.type]"
            :item="item"
            :old="old"
            :errors="errors"
          />
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
    <pre>{{ responseData }}</pre>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import InputType1 from './InputType1.vue'
import * as script from '../../../public/js/script.js'

const isReady = ref(false)

// constructor
import axios from 'axios'
const responseData = ref(null)
onMounted(async () => {
    try {
        const res = await axios.get('/api/dynamic-form-component')
        responseData.value = res.data
    } catch (e) {
        console.error('API取得失敗', e)
    }
    isReady.value = true;
})

// props
const props = defineProps({
  initialData: Object,
  formRoute: String,
  old: Object,
  errors: Object
})

// CSRF トークン
const csrfToken = ref(script.get_csrf())

// 🔧 component名とコンポーネントを対応させるマップ
const componentMap = {
  InputType1
}
</script>

<style scoped>
button {
  border: 1px solid black;
  padding: 4px;
}
.container {
  width: 99%;
  margin: 0 auto;
}
</style>