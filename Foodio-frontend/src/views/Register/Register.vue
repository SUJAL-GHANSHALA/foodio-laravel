<template>
  <div class="Registration flex justify-center items-center h-screen bg-gray-100">
    <!-- Left Section -->
    <div class="hidden lg:block lg:w-1/2 bg-cover bg-center">
    </div>

    <!-- Right Section -->
    <div class="w-full lg:w-1/2 p-8">
      <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 text-center bg-red-500">
          <img src="../../assets/Homepage/Logo.png" alt="Registration Image" class="h-12 mx-auto">
        </div>

        <!-- Form Section -->
        <div class="px-8 py-6">
          <form @submit.prevent="handleSubmit">
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
              <input type="text" id="name" v-model="form.name" placeholder="Enter your name"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>
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
            <div class="mb-4">
              <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
              <input type="password" id="confirmPassword" v-model="form.confirmPassword"
                placeholder="Enter your password again"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500">
            </div>
            <button type="submit"
              class="w-full bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
          </form>

          <!-- Additional Options -->
          <div class="mt-4 text-center">
            <p>Already have an account? <router-link to="/login"
                class="text-blue-500 hover:underline cursor-pointer">Login</router-link></p>
          </div>

          <!-- Register with Google Button -->
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

const form = ref({
  name: '',
  email: '',
  password: '',
  confirmPassword: ''
});

const handleSubmit = () => {
  const { name, email, password, confirmPassword } = form.value;

  axiosInstance.post('/register', {
    name: name,
    email: email,
    password: password,
    password_confirmation: confirmPassword,
    role_id: 1
  })
    .then(response => {
      console.log(response.data);
    })
    .catch(error => {
      console.error('Registration  error:', error)
    })
};
</script>

<style scoped>
.Registration {
  background-image: url(../../assets/Homepage/hero.jpeg);
  background-size: cover;
}
</style>
