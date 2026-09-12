<template>
  <div class="profile-page container py-8 max-w-2xl">
    <h1 class="mb-6 text-center">Thông tin cá nhân</h1>
    
    <CCard class="p-6">
      <form @submit.prevent="updateProfile" class="flex-col gap-4">
        <CInput 
          v-model="profile.name" 
          label="Họ và tên" 
          placeholder="Nhập họ và tên" 
        />
        <CInput 
          v-model="profile.email" 
          type="email" 
          label="Email" 
          disabled 
        />
        <CInput 
          v-model="profile.phone" 
          label="Số điện thoại" 
          placeholder="Nhập số điện thoại" 
        />
        
        <div class="actions mt-6 flex gap-4">
          <CButton type="submit" variant="primary" :loading="loading">Lưu thay đổi</CButton>
          <CButton variant="outline" type="button" @click="$router.push('/')">Huỷ</CButton>
        </div>
      </form>
    </CCard>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useAuthStore } from '@/stores/auth'
import CCard from '@/components/common/CCard.vue'
import CInput from '@/components/common/CInput.vue'
import CButton from '@/components/common/CButton.vue'

const authStore = useAuthStore()

const profile = ref({
  name: '',
  email: '',
  phone: ''
})

const loading = ref(false)

onMounted(() => {
  if (authStore.user) {
    profile.value.name = authStore.user.name
    profile.value.email = authStore.user.email
    profile.value.phone = '0987654321'
  }
})

const updateProfile = async () => {
  loading.value = true
  await new Promise(r => setTimeout(r, 800))
  loading.value = false
  alert('Cập nhật thông tin thành công!')
  if (authStore.user) {
    authStore.user.name = profile.value.name
  }
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.max-w-2xl { max-width: 42rem; margin: 0 auto; }
</style>
