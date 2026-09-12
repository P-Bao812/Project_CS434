<template>
  <div class="history-page container py-8">
    <div class="flex justify-between items-center mb-6">
      <h1>Lịch sử xem gần đây</h1>
      <CButton variant="outline" class="text-error" @click="clearHistory">Xoá lịch sử</CButton>
    </div>
    
    <div v-if="history.length > 0" class="flex-col gap-4">
      <div 
        v-for="recipe in history" 
        :key="recipe.id" 
        class="history-item bg-surface p-4 rounded-lg border shadow-sm flex items-center gap-4 cursor-pointer hover:border-primary transition-colors"
        @click="$router.push(`/recipe/${recipe.id}`)"
      >
        <img :src="recipe.image" :alt="recipe.title" class="history-img rounded-md">
        <div class="flex-1">
          <h3 class="mb-1">{{ recipe.title }}</h3>
          <p class="text-secondary text-caption">Đã xem lúc: Hôm nay, 10:30 AM</p>
        </div>
        <CButton variant="ghost" class="text-secondary" @click.stop="remove(recipe.id)">&times;</CButton>
      </div>
    </div>
    
    <div v-else class="empty-state text-center py-12 bg-surface rounded-lg border shadow-sm">
      <p class="text-secondary text-body-large">Lịch sử trống.</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRecipeStore } from '@/stores/recipes'
import CButton from '@/components/common/CButton.vue'

const recipeStore = useRecipeStore()
// Mock history
const history = ref([...recipeStore.recipes].reverse())

const remove = (id) => {
  history.value = history.value.filter(r => r.id !== id)
}

const clearHistory = () => {
  if (confirm('Bạn có chắc muốn xoá toàn bộ lịch sử?')) {
    history.value = []
  }
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.history-img {
  width: 80px;
  height: 80px;
  object-fit: cover;
}
.border { border: 1px solid var(--color-border); }
.hover\:border-primary:hover { border-color: var(--color-primary); }
.transition-colors { transition: border-color var(--transition-fast); }
.cursor-pointer { cursor: pointer; }
</style>
