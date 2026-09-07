<template>
  <div class="admin-recipe">
    <div class="flex justify-between items-center mb-6">
      <h1>Quản lý món ăn</h1>
      <CButton variant="primary">Thêm món ăn mới</CButton>
    </div>
    
    <CCard class="p-0 overflow-hidden">
      <table class="admin-table w-full text-left border-collapse">
        <thead>
          <tr class="bg-surface border-b">
            <th class="p-4">ID</th>
            <th class="p-4">Hình ảnh</th>
            <th class="p-4">Tên món ăn</th>
            <th class="p-4">Đánh giá</th>
            <th class="p-4">Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="recipe in recipes" :key="recipe.id" class="border-b hover:bg-gray">
            <td class="p-4">#{{ recipe.id }}</td>
            <td class="p-4">
              <img :src="recipe.image" :alt="recipe.title" class="w-12 h-12 object-cover rounded-md">
            </td>
            <td class="p-4 font-medium">{{ recipe.title }}</td>
            <td class="p-4">⭐ {{ recipe.rating }}</td>
            <td class="p-4 flex gap-2">
              <CButton variant="outline">Sửa</CButton>
              <CButton variant="danger">Xoá</CButton>
            </td>
          </tr>
        </tbody>
      </table>
    </CCard>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRecipeStore } from '@/stores/recipes'
import CCard from '@/components/common/CCard.vue'
import CButton from '@/components/common/CButton.vue'

const recipeStore = useRecipeStore()
const recipes = computed(() => recipeStore.recipes)
</script>

<style scoped>
.admin-table {
  border-collapse: collapse;
}
.border-b { border-bottom: 1px solid var(--color-border); }
.p-0 { padding: 0; }
.w-full { width: 100%; }
.text-left { text-align: left; }
.p-4 { padding: 1rem; }
.w-12 { width: 3rem; }
.h-12 { height: 3rem; }
.object-cover { object-fit: cover; }
.hover\:bg-gray:hover { background-color: var(--color-background); }
.font-medium { font-weight: 500; }
</style>
