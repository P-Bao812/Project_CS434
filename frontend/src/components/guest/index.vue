<template>
  <main class="main-content" :class="{ 'expanded': isCollapsed }">
    <div class="main-inner">
      <h1>Cooking Instructions</h1>
      <p>Nhập nguyên liệu sẵn có, chọn tâm trạng - AI sẽ gợi ý món ngon phù hợp nhất!</p>

      <!-- Ô tìm kiếm -->
      <div class="search-box">
        <span>🔍</span>
        <input type="text" placeholder="Nhập nguyên liệu: trứng, cà chua, hành lá...">
      </div>

      <!-- Khu vực cảm xúc -->
      <div class="mood-container">
        <div class="mood-title">Bạn đang cảm thấy thế nào?</div>
        <div class="mood-list">
          <button class="mood-btn">😊 Vui vẻ</button>
          <button class="mood-btn">😔 Buồn</button>
          <button class="mood-btn">🥱 Mệt mỏi</button>
          <button class="mood-btn">🤩 Hào hứng</button>
          <button class="mood-btn">😌 Thư giãn</button>
        </div>
      </div>

      <!-- Khung gợi ý AI -->
      <div class="ai-card">
        <p>AI sẽ đề xuất món ăn phù hợp dựa trên nguyên liệu và tâm trạng của bạn</p>
        <button class="btn-ai">✨ Nhận gợi ý ngay</button>
      </div>
    </div>
  </main>
</template>
<script>
export default {
  name: 'MainContent',
  props: {
    isCollapsed: {
      type: Boolean,
      default: false
    }
  }
}
</script>
<style scoped>
.main-content {
  flex: 1;
  /* Bắt buộc có để main tự động chiếm khoảng trống còn lại */
  padding: 30px;
  background-color: #fcf8f6;
  overflow-y: auto;
  transition: all 0.3s ease;
}

.main-inner {
  max-width: 900px;
  margin: 0 auto;
  text-align: center;
}

h1 {
  color: #5a2833;
  font-size: 2.2rem;
  margin-bottom: 10px;
}

p {
  color: #777777;
  margin-bottom: 25px;
}

.search-box {
  position: relative;
  margin-bottom: 30px;
}

.search-box input {
  width: 100%;
  padding: 12px 20px 12px 45px;
  border-radius: 25px;
  border: 1px solid #e6d5d0;
  outline: none;
  background-color: #fff;
}

.search-box span {
  position: absolute;
  left: 15px;
  top: 50%;
  transform: translateY(-50%);
}

.mood-container {
  margin-bottom: 30px;
}

.mood-title {
  font-weight: 600;
  margin-bottom: 15px;
}

.mood-list {
  display: flex;
  justify-content: center;
  gap: 10px;
  flex-wrap: wrap;
}

.mood-btn {
  background: #ffffff;
  border: 1px solid #e6d5d0;
  padding: 8px 16px;
  border-radius: 20px;
  cursor: pointer;
}

.mood-btn:hover {
  background-color: #5a2833;
  color: white;
}

.ai-card {
  background-color: #fff5f2;
  border: 1px solid #e6d5d0;
  border-radius: 16px;
  padding: 25px;
  text-align: center;
}

.btn-ai {
  margin-top: 15px;
  background: #5a2833;
  color: white;
  border: none;
  padding: 10px 24px;
  border-radius: 20px;
  cursor: pointer;
}
</style>
