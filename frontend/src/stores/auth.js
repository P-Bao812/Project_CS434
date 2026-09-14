import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', () => {
  const user = ref(null)
  const token = ref(localStorage.getItem('token') || null)

  const isLoggedIn = computed(() => user.value !== null)
  const isMember = computed(() => user.value?.role === 'member')
  const isAdmin = computed(() => user.value?.role === 'admin')

  function login(userData, userToken) {
    user.value = userData
    token.value = userToken
    if (userToken) {
      localStorage.setItem('token', userToken)
    }
  }

  function logout() {
    user.value = null
    token.value = null
    localStorage.removeItem('token')
  }

  return { user, token, isLoggedIn, isMember, isAdmin, login, logout }
})