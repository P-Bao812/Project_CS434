<template>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.css"
    integrity="sha512-x9WwyMYBnlXMNQ6kQ/Lyzu1NqIhLQKL5Oq6xByfXuRj7s9CskyCbLv/1IjqzJmXwFXWr0ov6jBV7Qbc0hh9nHg=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
  <div class="app-layout">
    <aside class="sidebar">
      <div class="sidebar-menu">
        <a href="#" class="sidebar-item ">
          <span><i class="fa-solid fa-house-chimney"></i></span> Trang chủ
        </a>
        <a href="#" class="sidebar-item">
          <span><i class="fa-solid fa-magnifying-glass"></i></span> Tìm nguyên liệu
        </a>
      </div>
      <div class="sidebar-footer">
        Để bắt đầu lưu trữ món ngon của riêng bạn, vui lòng <a href="#">đăng ký</a> hoặc <a href="#">đăng nhập</a>.
      </div>
    </aside>
  </div>

</template>
<script>
export default {

}
</script>
<style>
aside.sidebar {
  width: 250px;
  background-color: #ffffff;
  border-right: 1px solid var(--border-color);
  padding: 20px 0;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: width 0.3s ease;
  height: 100vh;
  position: sticky;
  top: 0;
}

/* Trạng thái thu gọn */
aside.sidebar.collapsed {
  width: 70px;
}

aside.sidebar.collapsed .sidebar-text,
aside.sidebar.collapsed .sidebar-footer {
  display: none;
}

.sidebar-header-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 15px 15px 15px;
  border-bottom: 1px solid var(--border-color);
  margin-bottom: 10px;
}

.sidebar-logo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: bold;
  color: var(--primary-color);
  font-size: 1rem;
  white-space: nowrap;
}

.btn-toggle {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 1.1rem;
  color: var(--primary-color);
  padding: 5px;
}

.sidebar-menu {
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.sidebar-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 20px;
  color: var(--text-main);
  text-decoration: none;
  font-size: 0.95rem;
  transition: 0.2s;
  white-space: nowrap;
}

.sidebar-item.active,
.sidebar-item:hover {
  background-color: var(--primary-color);
  color: white;
  border-radius: 0 20px 20px 0;
  margin-right: 15px;
}

.sidebar-footer {
  padding: 0 20px;
  font-size: 0.8rem;
  color: var(--text-muted);
  line-height: 1.4;
}

.sidebar-footer a {
  color: var(--primary-color);
  text-decoration: underline;
  font-size: 0.8rem;
  text-decoration: none;
}
</style>
