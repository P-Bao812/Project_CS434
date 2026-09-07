import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useRecipeStore = defineStore('recipes', () => {
  const recipes = ref([
    {
      id: '1',
      title: 'Bò lúc lắc',
      image: 'https://images.unsplash.com/photo-1600891964092-4316c288032e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
      description: 'Món bò lúc lắc thơm ngon, đậm đà, thịt bò mềm ngọt kết hợp với rau củ tươi mát.',
      ingredients: ['Thịt bò', 'Hành tây', 'Ớt chuông', 'Tỏi', 'Tiêu'],
      instructions: '1. Ướp thịt bò với gia vị. 2. Xào nhanh thịt bò trên lửa lớn. 3. Thêm rau củ vào xào cùng. 4. Dùng nóng.',
      rating: 4.5,
      reviews: 12
    },
    {
      id: '2',
      title: 'Canh chua cá lóc',
      image: 'https://images.unsplash.com/photo-1548943487-a2e4d43b4853?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
      description: 'Canh chua cá lóc miền Tây chua ngọt đậm đà, giải nhiệt mùa hè cực tốt.',
      ingredients: ['Cá lóc', 'Bạc hà', 'Đậu bắp', 'Cà chua', 'Me chua', 'Thơm'],
      instructions: '1. Làm sạch cá. 2. Nấu nước me chua. 3. Cho cá vào nấu chín. 4. Cho các loại rau vào, nêm nếm vừa ăn.',
      rating: 4.8,
      reviews: 34
    },
    {
      id: '3',
      title: 'Salad gà nướng',
      image: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
      description: 'Salad gà nướng ức gà healthy, phù hợp cho người ăn kiêng.',
      ingredients: ['Ức gà', 'Xà lách', 'Cà chua bi', 'Sốt mè rang'],
      instructions: '1. Nướng chín ức gà. 2. Cắt nhỏ rau củ. 3. Trộn đều với sốt mè rang.',
      rating: 4.2,
      reviews: 8
    }
  ])

  const searchKeyword = ref('')
  const searchIngredients = ref([])

  function searchRecipes(keyword) {
    if (!keyword) return recipes.value
    return recipes.value.filter(r => r.title.toLowerCase().includes(keyword.toLowerCase()))
  }

  function searchByIngredients(ingredientsList) {
    if (!ingredientsList || ingredientsList.length === 0) return recipes.value
    return recipes.value.filter(r => {
      // Check if recipe has at least one matching ingredient
      return ingredientsList.some(ing => 
        r.ingredients.some(ri => ri.toLowerCase().includes(ing.toLowerCase()))
      )
    })
  }

  return { recipes, searchKeyword, searchIngredients, searchRecipes, searchByIngredients }
})
