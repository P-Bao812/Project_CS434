<template>
  <header>
    <div class="logo-area">
      <img src="https://tse4.mm.bing.net/th/id/OIP.QzAYhYI6WmF2sCWm-yq3YgHaHa?r=0&rs=1&pid=ImgDetMain&o=7&rm=3"
        height="60px" width="50px"> <a href="/src/components/guest/home.vue">Cooking Instructions</a>
    </div>
    <button class="btn-login">Đăng nhập</button>
  </header>
</template>
<script>
export default {

}
</script>
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

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 10px;
  background-color: #ffffff;
  border-bottom: 1px solid var(--border-color);
}

.logo-area,
a {
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: bold;
  color: var(--primary-color);
  font-size: 1.1rem;
  text-decoration: none;
}

.btn-login {
  background-color: #ffffff;
  border: 1px solid var(--border-color);
  padding: 8px 18px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 600;
  color: var(--primary-color);
  transition: 0.2s;
}

.btn-login:hover {
  background-color: var(--card-bg);
}

/* --- LAYOUT CHÍNH (CONTAINER 3 TRẠNG THÁI) --- */
.showcase-container {
  display: flex;
  flex-direction: column;
  gap: 50px;
  padding: 40px 20px;
  max-width: 1200px;
  margin: 0 auto;
  width: 100%;
}

.state-section {
  background: #ffffff;
  border: 2px dashed var(--border-color);
  border-radius: 12px;
  padding: 30px;
  position: relative;
}

.state-label {
  position: absolute;
  top: -15px;
  left: 20px;
  background: var(--primary-color);
  color: white;
  padding: 4px 12px;
  border-radius: 4px;
  font-size: 0.85rem;
  font-weight: bold;
}

/* --- MAIN CONTENT STYLES --- */
main {
  text-align: center;
  padding: 20px 0;
}

main h1 {
  color: var(--primary-color);
  font-size: 2.2rem;
  margin-bottom: 10px;
}

main p {
  color: var(--text-muted);
  margin-bottom: 25px;
  font-size: 0.95rem;
}

/* Ô tìm kiếm */
.search-box {
  position: relative;
  max-width: 600px;
  margin: 0 auto 30px auto;
}

.search-box input {
  width: 100%;
  padding: 12px 20px 12px 45px;
  border-radius: 25px;
  border: 1px solid var(--border-color);
  outline: none;
  font-size: 0.95rem;
  background-color: #fff;
}

.search-box span {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-muted);
}

/* Tâm trạng */
.mood-container {
  margin-bottom: 30px;
}

.mood-title {
  font-weight: 600;
  margin-bottom: 15px;
  font-size: 1rem;
}

.mood-list {
  display: flex;
  justify-content: center;
  gap: 10px;
  flex-wrap: wrap;
}

.mood-btn {
  background: #ffffff;
  border: 1px solid var(--border-color);
  padding: 8px 16px;
  border-radius: 20px;
  cursor: pointer;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: 0.2s;
}

.mood-btn.active,
.mood-btn:hover {
  background-color: var(--primary-color);
  color: white;
  border-color: var(--primary-color);
}

/* Khung gợi ý AI */
.ai-card {
  background-color: var(--card-bg);
  border: 1px solid var(--border-color);
  border-radius: 16px;
  padding: 25px;
  max-width: 750px;
  margin: 0 auto;
  text-align: left;
}

.ai-card-center {
  text-align: center;
}

.btn-ai {
  background: linear-gradient(135deg, #7a3544, #5a2833);
  color: white;
  border: none;
  padding: 10px 24px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 600;
  box-shadow: 0 4px 10px rgba(90, 40, 51, 0.2);
}
</style>
