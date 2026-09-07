<template>
  <div class="admin-ingredient">
    <div class="flex justify-between items-center mb-6">
      <h1>Quản lý nguyên liệu</h1>
      <CButton variant="primary">Thêm nguyên liệu mới</CButton>
    </div>
    
    <CCard class="p-0 overflow-hidden">
      <table class="admin-table w-full text-left border-collapse">
        <thead>
          <tr class="bg-surface border-b">
            <th class="p-4">Tên nguyên liệu</th>
            <th class="p-4">Trạng thái</th>
            <th class="p-4">Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray">
            <td class="p-4 font-medium">Thịt bò</td>
            <td class="p-4"><span class="badge bg-success">Hoạt động</span></td>
            <td class="p-4 flex gap-2">
              <CButton variant="outline">Sửa</CButton>
              <CButton variant="danger">Xoá</CButton>
            </td>
          </tr>
          <tr class="border-b hover:bg-gray">
            <td class="p-4 font-medium">Hành tây</td>
            <td class="p-4"><span class="badge bg-success">Hoạt động</span></td>
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
.font-medium { font-weight: 500; }
.badge {
  padding: 0.25rem 0.5rem;
  border-radius: var(--radius-md);
  font-size: 12px;
  color: white;
}
.bg-success { background-color: var(--color-success); }
</style>
