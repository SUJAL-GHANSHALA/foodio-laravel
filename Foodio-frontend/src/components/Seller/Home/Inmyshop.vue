<template>
    <div>
        <div class="flex w-full justify-between">
            <p class="font-bold mt-2 ml-3">In my shop</p>
            <p class="text-orange-500 mt-2 mr-3 underline cursor-pointer">Show all</p>
        </div>
        <div class="top flex">
            <div class="left w-1/2">
                <div class="h-1/2 compo">
                    <Inmyshop_details />
                </div>
                <div class="h-1/2 compo">
                    <Inmyshop_details />
                </div>
            </div>
            <div class="right w-1/2">
                <div class="h-1/2 compo">
                    <Inmyshop_details />
                </div>
                <div class="h-1/2 compo">
                    <Inmyshop_details />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Inmyshop_details from './Inmyshop_details.vue'
</script>

<style>
    .top {
        border: 1px solid blue;
        height: 216px;
    }
    .left {
        border: 1px solid black;
    }
    .right {
        border: 1px solid blue;
    }
    .compo {
        border: 1px solid orange;
    }
</style>