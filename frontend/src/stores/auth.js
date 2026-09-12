import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', () => {
  const user = ref(null) // null when Guest
  
  const isLoggedIn = computed(() => user.value !== null)
  const isMember = computed(() => user.value?.role === 'member')
  const isAdmin = computed(() => user.value?.role === 'admin')
  
  function login(userData) {
    user.value = userData
  }
  
  function logout() {
    user.value = null
  }

  return { user, isLoggedIn, isMember, isAdmin, login, logout }
})
