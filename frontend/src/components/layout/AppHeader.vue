<template>
  <header class="header shadow-sm">
    <div class="container flex items-center justify-between">
      <router-link to="/" class="logo flex items-center gap-2">
        <span class="logo-text text-primary">CookMate</span>
      </router-link>
      
      <nav class="nav-links flex gap-6">
        <router-link to="/" class="nav-item">Trang chủ</router-link>
        <router-link to="/search" class="nav-item">Tìm kiếm</router-link>
        <router-link to="/suggestions" class="nav-item">Gợi ý món ăn</router-link>
        <router-link to="/chat" class="nav-item">Chatbot AI</router-link>
      </nav>
      
      <div class="auth-actions flex items-center gap-4">
        <!-- Mock Member state (hardcoded for UI preview) -->
        <template v-if="authStore.isLoggedIn">
          <router-link to="/favorites" class="nav-item">Yêu thích</router-link>
          <router-link to="/profile" class="nav-item">Cá nhân</router-link>
          <CButton variant="outline" @click="authStore.logout()">Đăng xuất</CButton>
        </template>
        <template v-else>
          <router-link to="/login">
            <CButton variant="ghost">Đăng nhập</CButton>
          </router-link>
          <router-link to="/register">
            <CButton variant="primary">Đăng ký</CButton>
          </router-link>
        </template>
      </div>
    </div>
  </header>
</template>

<script setup>
import { useAuthStore } from '@/stores/auth'
import CButton from '@/components/common/CButton.vue'

const authStore = useAuthStore()
</script>

<style scoped>
.header {
  background-color: var(--color-surface);
  border-bottom: 1px solid var(--color-border);
  height: 70px;
  display: flex;
  align-items: center;
  position: sticky;
  top: 0;
  z-index: 100;
}

.logo-text {
  font-family: var(--font-heading);
  font-size: 24px;
  font-weight: 700;
}

.nav-item {
  color: var(--color-text-primary);
  font-weight: 600;
  font-size: 15px;
}

.nav-item:hover, .router-link-active.nav-item {
  color: var(--color-primary);
}
</style>
