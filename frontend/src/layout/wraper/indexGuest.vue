<template>
  <div class="wrapper">
    <!-- Header ở trên cùng -->
    <HeaderGuest></HeaderGuest>

    <!-- KHUNG GIỮA BẮC BUỘC PHẢI CÓ ĐỂ ÉP MENU VÀ MAIN NẰM NGANG -->
    <div class="app-middle">
      <MenuGuest></MenuGuest>
      <router-view class="main-content"></router-view>
    </div>

    <!-- Footer ở dưới cùng -->
    <Footer></Footer>
  </div>
</template>

<script>
import MenuGuest from "@/layout/components/Menu.vue";
import Footer from "@/layout/components/Footer.vue";
import HeaderGuest from "@/layout/components/Header.vue";

export default {
  name: "IndexGuest",
  components: {
    MenuGuest,
    HeaderGuest,
    Footer,
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css");

html, body, #app {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  background-color: #fcf8f6;
}

.wrapper {
  display: flex;
  flex-direction: column;
  width: 100%;
  min-height: 100vh;
  background-color: #fcf8f6;
}

/* Khung giữa dàn hàng ngang (Sidebar bên trái, Main bên phải) */
.app-middle {
  display: flex;
  flex: 1;
  width: 100%;
  overflow: hidden;
}

/* Vùng chứa nội dung router-view tự động chiếm khoảng trống còn lại */
.main-content {
  flex: 1;
  overflow-y: auto;
  padding: 30px;
  background-color: #fcf8f6;
}
</style>
