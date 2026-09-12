<template>
  <div class="search-page container py-8">
    <h1 class="mb-6">Tìm kiếm món ăn</h1>
    
    <div class="search-tabs flex gap-4 mb-6 border-b pb-2">
      <button 
        :class="['tab-btn', { active: searchType === 'keyword' }]"
        @click="searchType = 'keyword'"
      >
        Tìm theo tên
      </button>
      <button 
        :class="['tab-btn', { active: searchType === 'ingredients' }]"
        @click="searchType = 'ingredients'"
      >
        Tìm theo nguyên liệu
      </button>
    </div>

    <!-- Keyword Search -->
    <div v-if="searchType === 'keyword'" class="search-box mb-8 flex gap-2">
      <CInput v-model="keyword" placeholder="Ví dụ: Cơm tấm, bún bò..." @keyup.enter="performSearch" />
      <CButton variant="primary" @click="performSearch">Tìm kiếm</CButton>
    </div>

    <!-- Ingredients Search -->
    <div v-else class="ingredients-search-box mb-8">
      <div class="flex gap-2 mb-4">
        <CInput v-model="currentIngredient" placeholder="Nhập nguyên liệu (vd: thịt bò)" @keyup.enter="addIngredient" />
        <CButton variant="secondary" @click="addIngredient">Thêm</CButton>
      </div>
      
      <div v-if="ingredients.length > 0" class="selected-ingredients flex gap-2 mb-4 flex-wrap">
        <CTag 
          v-for="(ing, idx) in ingredients" 
          :key="idx" 
          variant="primary" 
          closable 
          @close="removeIngredient(idx)"
        >
          {{ ing }}
        </CTag>
      </div>
      
      <CButton variant="primary" full-width @click="performSearch">Tìm món ăn với nguyên liệu này</CButton>
    </div>

    <!-- Results -->
    <div class="results">
      <h2 class="mb-4">Kết quả tìm kiếm ({{ results.length }})</h2>
      
      <div v-if="results.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <CCard 
          v-for="recipe in results" 
          :key="recipe.id" 
          interactive 
          @click="$router.push(`/recipe/${recipe.id}`)"
        >
          <template #image>
            <img :src="recipe.image" :alt="recipe.title">
          </template>
          <h3 class="mb-2">{{ recipe.title }}</h3>
          <p class="text-secondary text-body-regular line-clamp-2">{{ recipe.description }}</p>
          <div class="mt-2 flex gap-1 flex-wrap">
             <CTag v-for="ing in recipe.ingredients.slice(0, 3)" :key="ing">{{ ing }}</CTag>
             <CTag v-if="recipe.ingredients.length > 3">...</CTag>
          </div>
        </CCard>
      </div>
      
      <div v-else class="empty-state text-center py-12 bg-surface rounded-lg border shadow-sm">
        <p class="text-secondary text-body-large">Không tìm thấy món ăn nào phù hợp.</p>
        <CButton variant="outline" class="mt-4" @click="clearSearch">Thử lại</CButton>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRecipeStore } from '@/stores/recipes'
import CInput from '@/components/common/CInput.vue'
import CButton from '@/components/common/CButton.vue'
import CCard from '@/components/common/CCard.vue'
import CTag from '@/components/common/CTag.vue'

const recipeStore = useRecipeStore()
const searchType = ref('keyword') // 'keyword' or 'ingredients'

const keyword = ref(recipeStore.searchKeyword)
const currentIngredient = ref('')
const ingredients = ref([...recipeStore.searchIngredients])
const results = ref([])

onMounted(() => {
  if (keyword.value) {
    searchType.value = 'keyword'
    performSearch()
  } else if (ingredients.value.length > 0) {
    searchType.value = 'ingredients'
    performSearch()
  } else {
    results.value = recipeStore.recipes
  }
})

const addIngredient = () => {
  if (currentIngredient.value.trim() && !ingredients.value.includes(currentIngredient.value.trim())) {
    ingredients.value.push(currentIngredient.value.trim())
    currentIngredient.value = ''
  }
}

const removeIngredient = (idx) => {
  ingredients.value.splice(idx, 1)
}

const performSearch = () => {
  if (searchType.value === 'keyword') {
    recipeStore.searchKeyword = keyword.value
    results.value = recipeStore.searchRecipes(keyword.value)
  } else {
    recipeStore.searchIngredients = [...ingredients.value]
    results.value = recipeStore.searchByIngredients(ingredients.value)
  }
}

const clearSearch = () => {
  keyword.value = ''
  ingredients.value = []
  recipeStore.searchKeyword = ''
  recipeStore.searchIngredients = []
  results.value = recipeStore.recipes
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.pb-2 { padding-bottom: 0.5rem; }
.border-b { border-bottom: 1px solid var(--color-border); }
.border { border: 1px solid var(--color-border); }

.tab-btn {
  background: none;
  border: none;
  padding: 0.5rem 1rem;
  font-weight: 600;
  font-size: 16px;
  color: var(--color-text-secondary);
  cursor: pointer;
  border-bottom: 2px solid transparent;
  margin-bottom: -1px;
}
.tab-btn.active {
  color: var(--color-primary);
  border-bottom-color: var(--color-primary);
}
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;  
  overflow: hidden;
}
</style>
