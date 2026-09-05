<script></script>
<template>
  <footer>
    <div class="footer-links">
      <a href="#">Về chúng tôi</a>
      <a href="#">Liên hệ</a>
      <a href="#">Chính sách bảo mật</a>
      <a href="#">Điều khoản sử dụng</a>
    </div>
    
  </footer>
</template>
<style>
:root {
  --primary-color: #5a2833;
  --bg-color: #fcf8f6;
  --card-bg: #fff5f2;
  --border-color: #e6d5d0;
  --text-main: #333333;
  --text-muted: #777777;
}

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background-color: var(--bg-color);
  color: var(--text-main);
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

footer {
  background-color: #ffffff;
  border-top: 1px solid var(--border-color);
  padding: 20px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.85rem;
  color: var(--text-muted);
  margin-top: auto;
}

.footer-links {
  display: flex;
  gap: 20px;
}

.footer-links a {
  color: var(--text-muted);
  text-decoration: none;
}

.footer-links a:hover {
  color: var(--primary-color);
}

.social-icons {
  display: flex;
  gap: 15px;
}
</style>
