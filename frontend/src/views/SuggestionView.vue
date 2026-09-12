<template>
  <div class="suggestion-page container py-8 max-w-2xl">
    <h1 class="mb-6 text-center">Gợi ý món ăn</h1>
    <p class="text-center text-secondary mb-8">Hãy cho chúng tôi biết sở thích hoặc yêu cầu của bạn, chúng tôi sẽ gợi ý món ăn phù hợp.</p>
    
    <CCard class="p-6 mb-8">
      <form @submit.prevent="getSuggestion" class="flex-col gap-4">
        <div class="form-group">
          <label class="font-medium text-body-regular block mb-2">Bạn muốn ăn món gì hôm nay?</label>
          <textarea 
            v-model="request" 
            class="textarea w-full p-4 rounded-lg border focus-primary"
            rows="4" 
            placeholder="VD: Tôi muốn một món ăn ít calo, chế biến nhanh gọn cho bữa tối..."
          ></textarea>
        </div>
        
        <CButton type="submit" variant="primary" full-width :loading="loading" :disabled="!request.trim()">
          Nhận gợi ý
        </CButton>
      </form>
    </CCard>

    <div v-if="suggestedRecipe" class="suggestion-result">
      <h2 class="mb-4">Món ăn phù hợp với bạn:</h2>
      <CCard interactive @click="$router.push(`/recipe/${suggestedRecipe.id}`)">
        <template #image>
          <img :src="suggestedRecipe.image" :alt="suggestedRecipe.title">
        </template>
        <h3 class="mb-2">{{ suggestedRecipe.title }}</h3>
        <p class="text-secondary text-body-regular line-clamp-2">{{ suggestedRecipe.description }}</p>
      </CCard>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRecipeStore } from '@/stores/recipes'
import CCard from '@/components/common/CCard.vue'
import CButton from '@/components/common/CButton.vue'

const recipeStore = useRecipeStore()

const request = ref('')
const loading = ref(false)
const suggestedRecipe = ref(null)

const getSuggestion = async () => {
  loading.value = true
  suggestedRecipe.value = null
  
  // Mock API delay
  await new Promise(r => setTimeout(r, 1200))
  loading.value = false
  
  // Pick random recipe
  const recipes = recipeStore.recipes
  suggestedRecipe.value = recipes[Math.floor(Math.random() * recipes.length)]
}
</script>

<style scoped>
.py-8 { padding-top: 2rem; padding-bottom: 2rem; }
.max-w-2xl { max-width: 42rem; margin: 0 auto; }
.textarea {
  font-family: var(--font-body);
  border: 1px solid var(--color-border);
  outline: none;
  resize: vertical;
  background-color: var(--color-surface);
}
.textarea:focus {
  border-color: var(--color-primary);
  box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
}
.w-full { width: 100%; }
.block { display: block; }
.font-medium { font-weight: 500; }
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;  
  overflow: hidden;
}
</style>
