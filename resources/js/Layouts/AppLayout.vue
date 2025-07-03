<template>
  <div>
    <header>
      <h1>My Site</h1>
    </header>
    <div class="header-space"></div>

    <main>
      <slot />
    </main>

    <footer>
      <p>&copy; 2025 My Company</p>
    </footer>
  </div>
</template>

<script setup>
</script>

<style scoped>
header{
  position: fixed;
  display: flex;
  justify-content: center;
  width: 100%;
  height: 32px;
  background-color: white;
  border: 1px solid black;
}
.header-space{
  position: block;
  height: 32px;
  background-color: white;
}
footer{
  position: fixed;
  display: flex;
  justify-content: center;
  width: 100%;
  height: 32px;
  background-color: white;
  border: 1px solid black;
  bottom: 0;
}
.footer-space{
  position: block;
  height: 32px;
  background-color: white;
}
</style>