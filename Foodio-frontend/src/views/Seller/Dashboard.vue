<template>
  <div class="flex">
    <div class="sidebar">
      <Sidebar />
    </div>

    <div class="main-section">
      <!-- header -->
      <div class="header">
        <Header />
      </div>

      <div>
        <Home />
        <!-- <AddNewFoodItem_form /> -->
        <!-- <QR_code /> -->
      </div>
    </div>
  </div>
</template>
  
<script setup>
  import Sidebar from '../../components/Seller/Dashboard/Sidebar.vue'
  import Header from '../../components/Seller/Home/Header.vue'
  import Home from './Home.vue'
  import AddNewFoodItem_form from '../../components/Seller/Home/AddNewFoodItem_form.vue';
  import QR_code from '../../components/Seller/Home/QR_code.vue'
</script>
  
<style>
  .sidebar {
    background-color: #04292A;
    height: 100vh;
    width: 10%;
  }

  .main-section {
    height: 100vh;
    width: 90%;
  }
</style>