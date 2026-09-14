import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'

export const useRecipeStore = defineStore('recipes', () => {
  const recipes = ref([])
  const loading = ref(false)

  const searchKeyword = ref('')
  const searchIngredients = ref([])

  async function fetchRecipes() {
    loading.value = true
    try {
      const res = await axios.get('http://127.0.0.1:8000/api/mon-an')
      recipes.value = res.data.data.map(item => ({
        id: item.id,
        title: item.tenmonan,
        image: item.hinhanh || 'https://images.unsplash.com/photo-1600891964092-4316c288032e',
        description: item.mota,
        ingredients: [],
        instructions: '',
        dokho: item.dokho,
        thoigiannau: item.thoigiannau,
        khauphanan: item.khauphanan,
        rating: 0,
        reviews: 0
      }))
    } catch (error) {
      console.error('Lỗi khi tải danh sách món ăn:', error)
    } finally {
      loading.value = false
    }
  }

  function searchRecipes(keyword) {
    if (!keyword) return recipes.value
    return recipes.value.filter(r => r.title.toLowerCase().includes(keyword.toLowerCase()))
  }

  function searchByIngredients(ingredientsList) {
    if (!ingredientsList || ingredientsList.length === 0) return recipes.value
    return recipes.value.filter(r => {
      return ingredientsList.some(ing => 
        r.ingredients.some(ri => ri.toLowerCase().includes(ing.toLowerCase()))
      )
    })
  }

  return { recipes, loading, searchKeyword, searchIngredients, fetchRecipes, searchRecipes, searchByIngredients }
})