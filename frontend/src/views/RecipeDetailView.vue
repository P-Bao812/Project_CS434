<template>
  <div class="recipe-detail container py-8">
    <div v-if="loading" class="text-center py-12">
      <div class="spinner"></div>
      <p class="mt-4 text-secondary">Đang tải thông tin món ăn...</p>
    </div>
    
    <div v-else-if="!recipe" class="empty-state text-center py-12 bg-surface rounded-lg border shadow-sm">
      <p class="text-error text-body-large">Không tìm thấy món ăn!</p>
      <CButton variant="outline" class="mt-4" @click="$router.push('/search')">Quay lại tìm kiếm</CButton>
    </div>
    
    <div v-else class="content grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Left Column: Image & Actions -->
      <div class="md:col-span-1">
        <div class="image-wrapper rounded-lg overflow-hidden shadow-md mb-4">
          <img :src="recipe.image" :alt="recipe.title" class="w-full h-auto object-cover aspect-4/3">
        </div>
        
        <div class="actions flex-col gap-2">
          <CButton 
            v-if="authStore.isLoggedIn"
            variant="primary" 
            full-width 
            @click="toggleFavorite"
          >
            {{ isFavorite ? '❤️ Đã lưu yêu thích' : '🤍 Lưu yêu thích' }}
          </CButton>
          <CButton 
            variant="outline" 
            full-width 
            @click="share"
          >
            Chia sẻ
          </CButton>
        </div>
      </div>
      
      <!-- Right Column: Details -->
      <div class="md:col-span-2">
        <h1 class="mb-2 text-primary">{{ recipe.title }}</h1>
        <div class="meta flex gap-4 text-secondary text-body-regular mb-6">
          <span>⭐ {{ recipe.rating }} ({{ recipe.reviews }} đánh giá)</span>
        </div>
        
        <p class="description text-body-large mb-8">
          {{ recipe.description }}
        </p>
        
        <div class="ingredients mb-8">
          <h3 class="mb-4">Nguyên liệu cần chuẩn bị</h3>
          <ul class="ingredient-list">
            <li v-for="(ing, idx) in recipe.ingredients" :key="idx" class="ingredient-item flex items-center gap-2 mb-2">
              <span class="bullet"></span> {{ ing }}
            </li>
          </ul>
        </div>
        
        <div class="instructions mb-8">
          <h3 class="mb-4">Cách làm</h3>
          <div class="instruction-content bg-surface p-6 rounded-lg border shadow-sm">
            <p v-for="(step, idx) in formattedInstructions" :key="idx" class="mb-2">{{ step }}</p>
          </div>
        </div>

        <!-- Review Section (UC12) -->
        <div class="reviews-section border-t pt-8">
          <h3 class="mb-4">Đánh giá ({{ recipe.reviews }})</h3>
          
          <div v-if="authStore.isLoggedIn" class="add-review bg-surface p-6 rounded-lg border shadow-sm mb-6">
            <h4 class="mb-4">Viết đánh giá của bạn</h4>
            <div class="flex gap-2 mb-4">
              <button 
                v-for="star in 5" 
                :key="star" 
                class="star-btn"
                :class="{ active: star <= userRating }"
                @click="userRating = star"
              >
                ⭐
              </button>
            </div>
            <CInput v-model="userReviewText" type="text" placeholder="Nhập đánh giá của bạn..." class="mb-4" />
            <CButton variant="primary" @click="submitReview" :disabled="!userRating || !userReviewText">Gửi đánh giá</CButton>
          </div>
          <div v-else class="bg-surface p-4 rounded-lg border text-center mb-6">
            <p class="text-secondary mb-2">Vui lòng đăng nhập để đánh giá món ăn.</p>
            <CButton variant="outline" @click="$router.push('/login')">Đăng nhập</CButton>
          </div>

          <div class="review-list flex-col gap-4">
            <div class="review-item bg-surface p-4 rounded-lg border">
              <div class="flex justify-between mb-2">
                <strong>Người dùng ẩn danh</strong>
                <span>⭐⭐⭐⭐⭐</span>
              </div>
              <p class="text-secondary text-body-regular">Món ăn rất ngon, công thức chuẩn!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import { useRecipeStore } from '@/stores/recipes'
import { useAuthStore } from '@/stores/auth'
import CButton from '@/components/common/CButton.vue'
import CInput from '@/components/common/CInput.vue'

const route = useRoute()
const recipeStore = useRecipeStore()
const authStore = useAuthStore()

const loading = ref(true)
const recipe = ref(null)
const isFavorite = ref(false)

const userRating = ref(0)
const userReviewText = ref('')

onMounted(async () => {
  if (recipeStore.recipes.length === 0) {
    await recipeStore.fetchRecipes()
  }
  const id = route.params.id
  recipe.value = recipeStore.recipes.find(r => String(r.id) === String(id))
  loading.value = false
})

const formattedInstructions = computed(() => {
  if (!recipe.value) return []
  return recipe.value.instructions.split('.').map(s => s.trim()).filter(Boolean)
})

const toggleFavorite = () => {
  isFavorite.value = !isFavorite.value
  alert(isFavorite.value ? 'Đã lưu vào danh sách yêu thích' : 'Đã gỡ khỏi danh sách yêu thích')
}

const share = () => {
  alert('Đã sao chép đường dẫn món ăn!')
}

const submitReview = () => {
  alert('Gửi đánh giá thành công!')
  userRating.value = 0
  userReviewText.value = ''
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.pt-8 { padding-top: 2rem; }
.border-t { border-top: 1px solid var(--color-border); }
.border { border: 1px solid var(--color-border); }
.overflow-hidden { overflow: hidden; }
.w-full { width: 100%; }
.h-auto { height: auto; }
.object-cover { object-fit: cover; }
.aspect-4\/3 { aspect-ratio: 4/3; }

.spinner {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  border: 3px solid rgba(16, 185, 129, 0.2);
  border-radius: 50%;
  border-top-color: var(--color-primary);
  animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

.md\:col-span-1 { grid-column: span 1 / span 1; }
.md\:col-span-2 { grid-column: span 2 / span 2; }

.bullet {
  display: inline-block;
  width: 8px;
  height: 8px;
  background-color: var(--color-primary);
  border-radius: 50%;
}

.star-btn {
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
  filter: grayscale(1);
  transition: transform var(--transition-fast);
}
.star-btn:hover {
  transform: scale(1.2);
}
.star-btn.active {
  filter: grayscale(0);
}
</style>
