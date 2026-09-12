<template>
  <div class="home">
    <section class="hero bg-surface text-center shadow-sm">
      <div class="container p-8 py-12">
        <h1 class="text-primary mb-4">Nấu ngon từ có sẵn, thông minh mỗi ngày</h1>
        <p class="text-secondary text-body-large mb-8">Trợ lý nấu ăn thông minh giúp bạn tận dụng tối đa nguyên liệu có sẵn trong tủ lạnh.</p>
        
        <div class="search-box mx-auto flex gap-2">
          <CInput v-model="keyword" placeholder="Nhập tên món ăn bạn muốn tìm..." @keyup.enter="handleSearch" />
          <CButton variant="primary" @click="handleSearch">Tìm kiếm</CButton>
        </div>
        
        <div class="mt-4">
          <router-link to="/search" class="text-secondary text-caption hover:text-primary">
            Hoặc tìm kiếm bằng nguyên liệu có sẵn
          </router-link>
        </div>
      </div>
    </section>

    <section class="featured-recipes container py-12">
      <h2 class="mb-6">Món ăn nổi bật</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <CCard 
          v-for="recipe in recipes" 
          :key="recipe.id" 
          interactive 
          @click="goToDetail(recipe.id)"
        >
          <template #image>
            <img :src="recipe.image" :alt="recipe.title">
          </template>
          <h3 class="mb-2">{{ recipe.title }}</h3>
          <p class="text-secondary text-body-regular line-clamp-2">{{ recipe.description }}</p>
          <template #footer>
            <div class="flex justify-between items-center text-caption text-secondary">
              <span>⭐ {{ recipe.rating }} ({{ recipe.reviews }})</span>
              <span>Xem chi tiết &rarr;</span>
            </div>
          </template>
        </CCard>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'
import { useRecipeStore } from '@/stores/recipes'
import CButton from '@/components/common/CButton.vue'
import CInput from '@/components/common/CInput.vue'
import CCard from '@/components/common/CCard.vue'

const router = useRouter()
const recipeStore = useRecipeStore()
const keyword = ref('')

// Get first 3 recipes as featured
const recipes = computed(() => recipeStore.recipes.slice(0, 3))

const handleSearch = () => {
  recipeStore.searchKeyword = keyword.value
  router.push('/search')
}

const goToDetail = (id) => {
  router.push(`/recipe/${id}`)
}
</script>

<style scoped>
.hero {
  border-bottom: 1px solid var(--color-border);
}
.search-box {
  max-width: 600px;
}
.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
.py-12 {
  padding-top: 3rem;
  padding-bottom: 3rem;
}
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;  
  overflow: hidden;
}
</style>
