<template>
  <div class="auth-page bg-background flex items-center justify-center p-4">
    <CCard class="auth-card p-4">
      <h2 class="text-center mb-6">Đăng ký tài khoản</h2>
      
      <form @submit.prevent="handleRegister" class="flex-col gap-4">
        <CInput 
          v-model="name" 
          type="text" 
          label="Họ và tên" 
          placeholder="Nhập họ và tên" 
          :error="errors.name"
        />

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
          placeholder="Tạo mật khẩu" 
          :error="errors.password"
        />
        
        <CButton type="submit" variant="primary" full-width :loading="loading" class="mt-4">
          Đăng ký
        </CButton>
      </form>
      
      <div class="text-center mt-6 text-body-regular">
        <span class="text-secondary">Đã có tài khoản? </span>
        <router-link to="/login">Đăng nhập ngay</router-link>
      </div>
    </CCard>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import CCard from '@/components/common/CCard.vue'
import CInput from '@/components/common/CInput.vue'
import CButton from '@/components/common/CButton.vue'

const router = useRouter()
const authStore = useAuthStore()

const name = ref('')
const email = ref('')
const password = ref('')
const errors = ref({})
const loading = ref(false)

const handleRegister = async () => {
  errors.value = {}
  
  if (!name.value) errors.value.name = 'Vui lòng nhập họ tên'
  if (!email.value) errors.value.email = 'Vui lòng nhập email'
  if (!password.value) errors.value.password = 'Vui lòng nhập mật khẩu'
  
  if (Object.keys(errors.value).length > 0) return

  loading.value = true
  
  // Simulate API delay
  await new Promise(r => setTimeout(r, 1000))
  loading.value = false
  
  // Basic mock register & login
  authStore.login({
    id: 'user_new',
    name: name.value,
    email: email.value,
    role: 'member'
  })
  
  router.push('/')
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
</style>
