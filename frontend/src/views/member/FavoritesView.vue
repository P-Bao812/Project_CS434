<template>
  <div class="favorites-page container py-8">
    <div class="flex justify-between items-center mb-6">
      <h1>Món ăn yêu thích</h1>
      <span class="text-secondary">{{ favorites.length }} món</span>
    </div>
    
    <div v-if="favorites.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <CCard 
        v-for="recipe in favorites" 
        :key="recipe.id" 
        interactive 
        @click="$router.push(`/recipe/${recipe.id}`)"
      >
        <template #image>
          <img :src="recipe.image" :alt="recipe.title">
        </template>
        <h3 class="mb-2">{{ recipe.title }}</h3>
        <p class="text-secondary text-body-regular line-clamp-2">{{ recipe.description }}</p>
        <template #footer>
          <div class="flex justify-between items-center">
            <span class="text-caption text-secondary">⭐ {{ recipe.rating }}</span>
            <CButton variant="ghost" class="text-error" @click.stop="remove(recipe.id)">Bỏ thích</CButton>
          </div>
        </template>
      </CCard>
    </div>
    
    <div v-else class="empty-state text-center py-12 bg-surface rounded-lg border shadow-sm">
      <p class="text-secondary text-body-large">Bạn chưa lưu món ăn nào.</p>
      <CButton variant="primary" class="mt-4" @click="$router.push('/')">Khám phá ngay</CButton>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRecipeStore } from '@/stores/recipes'
import CCard from '@/components/common/CCard.vue'
import CButton from '@/components/common/CButton.vue'

const recipeStore = useRecipeStore()
// Mock favorites using the first two recipes
const favorites = ref(recipeStore.recipes.slice(0, 2))

const remove = (id) => {
  favorites.value = favorites.value.filter(r => r.id !== id)
  alert('Đã gỡ món ăn khỏi danh sách yêu thích')
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;  
  overflow: hidden;
}
.border { border: 1px solid var(--color-border); }
</style>
