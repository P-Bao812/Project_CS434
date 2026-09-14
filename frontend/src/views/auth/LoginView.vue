<template>
  <div class="auth-page bg-background flex items-center justify-center p-4">
    <CCard class="auth-card p-4">
      <h2 class="text-center mb-6">Đăng nhập</h2>
      
      <form @submit.prevent="handleLogin" class="flex-col gap-4">
        <CInput 
          v-model="email" 
          type="email" 
          label="Email" 
          placeholder="Nhập email của bạn" 
          :error="errors.email"
        />
        
        <CInput 
          v-model="password" 
          type="password" 
          label="Mật khẩu" 
          placeholder="Nhập mật khẩu" 
          :error="errors.password"
        />
        
        <CButton type="submit" variant="primary" full-width :loading="loading" class="mt-4">
          Đăng nhập
        </CButton>
      </form>
      
      <div class="text-center mt-6 text-body-regular">
        <span class="text-secondary">Chưa có tài khoản? </span>
        <router-link to="/register">Đăng ký ngay</router-link>
      </div>

      <div class="text-center mt-4 pt-4 border-t border-gray-100">
        <p class="text-caption text-secondary mb-2">Test Accounts:</p>
        <div class="flex justify-center gap-2">
          <CButton variant="outline" @click="mockLogin('member')">Member</CButton>
          <CButton variant="outline" @click="mockLogin('admin')">Admin</CButton>
        </div>
      </div>
    </CCard>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import { useAuthStore } from '@/stores/auth'
import CCard from '@/components/common/CCard.vue'
import CInput from '@/components/common/CInput.vue'
import CButton from '@/components/common/CButton.vue'

const router = useRouter()
const authStore = useAuthStore()

const email = ref('')
const password = ref('')
const errors = ref({})
const loading = ref(false)

const handleLogin = async () => {
  errors.value = {}

  if (!email.value) errors.value.email = 'Vui lòng nhập email'
  if (!password.value) errors.value.password = 'Vui lòng nhập mật khẩu'

  if (Object.keys(errors.value).length > 0) return

  loading.value = true

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      emaildangnhap: email.value,
      password: password.value
    })

    authStore.login(response.data.user, response.data.token)
    router.push(authStore.isAdmin ? '/admin' : '/')
  } catch (error) {
    errors.value.password = 'Email hoặc mật khẩu không đúng'
    console.error(error)
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.auth-page {
  min-height: calc(100vh - 150px);
}
.auth-card {
  width: 100%;
  max-width: 400px;
}
.border-t { border-top: 1px solid var(--color-border); }
</style>
