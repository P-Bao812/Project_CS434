<template>
  <div class="admin-review">
    <div class="flex justify-between items-center mb-6">
      <h1>Quản lý đánh giá</h1>
    </div>
    
    <CCard class="p-0 overflow-hidden">
      <table class="admin-table w-full text-left border-collapse">
        <thead>
          <tr class="bg-surface border-b">
            <th class="p-4">Món ăn</th>
            <th class="p-4">Người dùng</th>
            <th class="p-4">Đánh giá</th>
            <th class="p-4">Bình luận</th>
            <th class="p-4">Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray">
            <td class="p-4">Bò lúc lắc</td>
            <td class="p-4">Nguyen Van A</td>
            <td class="p-4">⭐⭐⭐⭐⭐</td>
            <td class="p-4">Rất ngon!</td>
            <td class="p-4 flex gap-2">
              <CButton variant="danger">Xoá</CButton>
            </td>
          </tr>
          <tr class="border-b hover:bg-gray">
            <td class="p-4">Canh chua cá lóc</td>
            <td class="p-4">Trần Thị B</td>
            <td class="p-4">⭐⭐⭐⭐</td>
            <td class="p-4">Hơi chua một tí</td>
            <td class="p-4 flex gap-2">
              <CButton variant="danger">Xoá</CButton>
            </td>
          </tr>
        </tbody>
      </table>
    </CCard>
  </div>
</template>

<script setup>
import CCard from '@/components/common/CCard.vue'
import CButton from '@/components/common/CButton.vue'
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
.hover\:bg-gray:hover { background-color: var(--color-background); }
</style>
