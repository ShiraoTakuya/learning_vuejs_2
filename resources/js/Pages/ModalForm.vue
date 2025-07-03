<template>
    <div v-if="isModalVisible" class="modal-overlay" @click.self="close">
      <div class="modal-content">
        <h2>入力フォーム</h2>
        <input v-model="form.name" placeholder="名前" />
        <input v-model="form.email" type="email" placeholder="メール" />
        <textarea v-model="form.message" placeholder="メッセージ"></textarea>
        <button @click="close">閉じる</button>
        <button>送信（仮）</button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, watch } from 'vue'
  
  // props と emits の定義
  const props = defineProps({
    show: Boolean
  })
  const emit = defineEmits(['close'])
  
  // フォームデータ
  const form = ref({
    name: '',
    email: '',
    message: ''
  })
  
  // モーダルの表示状態（ローカルで制御）
  const isModalVisible = ref(props.show)
  
  // propsの変更に応じて表示状態を同期
  watch(() => props.show, (newVal) => {
    isModalVisible.value = newVal
  })
  
  // 閉じる処理
  function close() {
    isModalVisible.value = false
    emit('close')
  }
  </script>
  
  <style scoped>
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .modal-content {
    background: white;
    padding: 1rem;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    display: flex;
    flex-flow: column;
    gap: 16px;
  }
  button {
    border: 1px solid black;
  }
  input {
    border: 1px solid black;
  }
  textarea {
    border: 1px solid black;
    height: 256px;
  }
  </style>