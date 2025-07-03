<template>
  <div class="form-item">
    <label :for="label">{{ item.label }}</label>
    <input
      type="input"
      :placeholder="item.placeholder"
      :name="item.name"
      @input="handleInput"
      v-model="def_value"
      class="border p-2 rounded w-full"
    />
    <div v-if="errorMessage" class="text-red-500">{{ errorMessage }}</div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import * as script from '../../../public/js/script.js'

// props
const props = defineProps({
  item: Object,
  old: String,
  errors: Object,
})

// 初期値のセット
const def_value = ref(script.select_def_value(props.old, props.item))
const errorMessage = ref(script.extract_error_message(props.errors, props.item))

// 入力時のバリデーション
function handleInput(event) {
  const newValue = event.target.value
  errorMessage.value = script.valdiate_value(newValue, props.item)
}
</script>

<style scoped>
.form-item {
  margin-bottom: 1rem;
}
</style>