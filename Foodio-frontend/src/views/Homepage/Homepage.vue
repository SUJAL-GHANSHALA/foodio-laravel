<script setup>

</script>

<template>
    <div>
        <div class="nav-bar h-24 flex">
            <div class="nav-bar-left w-1/2 flex items-center">
                <img src="../../assets/Homepage/Logo.png" alt="" class="h-12 ml-12">
            </div>
            <div class="nav-bar-right w-1/2 flex items-center justify-end">
                <p class="font-bold .sm:font-normal text-white mr-10 cursor-pointer">Our stats</p>
                <p class="font-bold .sm:font-normal text-white mr-10 cursor-pointer">Know us</p>
                <button
                    class="bg-white font-bold text-green-900 py-2 px-4 rounded-full shadow-md hover:bg-green-600 hover:text-white transition duration-300 ease-in-out pl-6 pr-6 mr-6">
                    Sign up your store
                </button>
            </div>
        </div>

        <div class="main-content-area flex items-center justify-end">
            <div class="hero mr-6">
                <img src="../../assets/Homepage/Heading.png" alt="">
                <div class="hero-buttons">
                    <router-link to="/register"
                        class="bg-white font-bold text-black-900 py-2 px-4 rounded-full shadow-md hover:bg-green-600 hover:text-white transition duration-300 ease-in-out pl-6 pr-6 mr-6 border-black router-link">
                        For Businesses
                    </router-link>
                    <router-link to="/register"
                        class="bg-white font-bold text-black-900 py-2 px-4 rounded-full shadow-md hover:bg-green-600 hover:text-white transition duration-300 ease-in-out pl-6 pr-6 mr-6 border-black router-link">
                        For Customers
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .nav-bar {
        background-color: #04292A;
    }
    .main-content-area {
        background-image: url(../../assets/Homepage/hero.jpeg);
        background-size: cover;
        height: 88vh;
        width: 100%;
    }
    .router-link {
        border: 1px solid black;
    }
</style>