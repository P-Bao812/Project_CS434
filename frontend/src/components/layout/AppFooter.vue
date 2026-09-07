<template>
  <footer class="footer">
    <div class="container text-center">
      <p class="text-secondary">&copy; {{ new Date().getFullYear() }} CookMate. Nấu ngon từ có sẵn, thông minh mỗi ngày.</p>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background-color: var(--color-surface);
  border-top: 1px solid var(--color-border);
  padding: 2rem 0;
  margin-top: auto;
}
</style>
