import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: { layout: 'default' }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/auth/LoginView.vue'),
      meta: { layout: 'default' }
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/auth/RegisterView.vue'),
      meta: { layout: 'default' }
    },
    {
      path: '/search',
      name: 'search',
      component: () => import('../views/RecipeSearchView.vue'),
      meta: { layout: 'default' }
    },
    {
      path: '/recipe/:id',
      name: 'recipe-detail',
      component: () => import('../views/RecipeDetailView.vue'),
      meta: { layout: 'default' }
    },
    {
      path: '/favorites',
      name: 'favorites',
      component: () => import('../views/member/FavoritesView.vue'),
      meta: { layout: 'default', requiresAuth: true }
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('../views/member/ProfileView.vue'),
      meta: { layout: 'default', requiresAuth: true }
    },
    {
      path: '/history',
      name: 'history',
      component: () => import('../views/member/HistoryView.vue'),
      meta: { layout: 'default', requiresAuth: true }
    },
    {
      path: '/suggestions',
      name: 'suggestions',
      component: () => import('../views/SuggestionView.vue'),
      meta: { layout: 'default' }
    },
    {
      path: '/chat',
      name: 'chat',
      component: () => import('../views/ChatView.vue'),
      meta: { layout: 'default' }
    },
    {
      path: '/admin',
      name: 'admin-dashboard',
      component: () => import('../views/admin/AdminRecipeView.vue'),
      meta: { layout: 'admin', requiresAdmin: true }
    },
    {
      path: '/admin/recipes',
      name: 'admin-recipes',
      component: () => import('../views/admin/AdminRecipeView.vue'),
      meta: { layout: 'admin', requiresAdmin: true }
    },
    {
      path: '/admin/ingredients',
      name: 'admin-ingredients',
      component: () => import('../views/admin/AdminIngredientView.vue'),
      meta: { layout: 'admin', requiresAdmin: true }
    },
    {
      path: '/admin/reviews',
      name: 'admin-reviews',
      component: () => import('../views/admin/AdminReviewView.vue'),
      meta: { layout: 'admin', requiresAdmin: true }
    }
  ]
})

router.beforeEach((to, from, next) => {
  const authStore = useAuthStore()
  
  if (to.meta.requiresAuth && !authStore.isLoggedIn) {
    next('/login')
  } else if (to.meta.requiresAdmin && !authStore.isAdmin) {
    next('/')
  } else {
    next()
  }
})

export default router
