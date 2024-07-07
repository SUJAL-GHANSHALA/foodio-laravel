<template>
  <div class="Login flex justify-center items-center h-screen bg-gray-100">
    <!-- Left Section -->
    <div class="hidden lg:block lg:w-1/2 bg-cover bg-center">
    </div>

    <!-- Right Section -->
    <div class="w-full lg:w-1/2 p-8">
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 text-center bg-red-500">
          <img src="../../assets/Homepage/Logo.png" alt="image" class="h-12 mx-auto">
        </div>

        <!-- Form Section -->
        <div class="px-8 py-6">
          <form @submit.prevent="handleSubmit">
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" id="email" v-model="form.email" placeholder="Enter your email"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <input type="password" id="password" v-model="form.password" placeholder="Enter your password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>
            <button type="submit"
              class="w-full bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login</button>
          </form>

          <!-- Additional Options -->
          <div class="mt-4 text-center">
            <p>Don't have an account? <router-link to="/register"
                class="text-blue-500 hover:underline cursor-pointer">Register</router-link></p>
            <p>or</p>
          </div>

          <!-- Login with Google Button -->
          <button type="button" @click="handleGoogleLogin"
            class="w-full mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Continue with Google
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axiosInstance from '../../utils/axios.js'
import { useRouter } from 'vue-router'

const form = ref({
  email: '',
  password: ''
});

const router = useRouter();

const handleSubmit = () => {
  //for jumping to the next route, i have to use it in successful login, i can also use router.push
  router.replace('/SellerHomepage');

  const { email, password } = form.value;

  axiosInstance.post('/login', {
    email: email,
    password: password
  })
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error('Login error:', error)
  })
};
</script>

<style scoped>
.Login {
  background-image: url(../../assets/Homepage/hero.jpeg);
  background-size: cover;
}
</style>