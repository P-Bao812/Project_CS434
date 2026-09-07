<template>
  <div class="layout-admin flex">
    <aside class="sidebar shadow-md">
      <div class="logo-area p-6 border-b">
        <h2 class="text-primary m-0">Admin Panel</h2>
      </div>
      <nav class="admin-nav p-4 flex-col gap-2">
        <router-link to="/admin/recipes" class="admin-link p-4 rounded-md">Món ăn</router-link>
        <router-link to="/admin/ingredients" class="admin-link p-4 rounded-md">Nguyên liệu</router-link>
        <router-link to="/admin/reviews" class="admin-link p-4 rounded-md">Đánh giá</router-link>
        <a href="#" @click.prevent="logout" class="admin-link p-4 rounded-md text-error mt-8">Đăng xuất</a>
      </nav>
    </aside>
    <main class="main-content bg-background flex-1 p-8">
      <router-view />
    </main>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const router = useRouter()
const authStore = useAuthStore()

const logout = () => {
  authStore.logout()
  router.push('/login')
}
</script>

<style scoped>
.layout-admin {
  min-height: 100vh;
}
.sidebar {
  width: 250px;
  background-color: var(--color-surface);
  border-right: 1px solid var(--color-border);
  display: flex;
  flex-direction: column;
}
.admin-link {
  display: block;
  color: var(--color-text-primary);
  font-weight: 600;
}
.admin-link:hover, .router-link-active.admin-link {
  background-color: rgba(16, 185, 129, 0.1);
  color: var(--color-primary);
}
.border-b {
  border-bottom: 1px solid var(--color-border);
}
</style>
