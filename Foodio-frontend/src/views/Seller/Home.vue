<template>
    <div>
        <!-- graph, recent sales, add new food item -->
        <div class="graph-recent-addnew">
            <div class="graph">

            </div>
            <div class="recent-addnew">
                <div class="addnew">
                    <img src="../../assets/Seller/addicon.png" alt="" class="h-7 cursor-pointer">
                    <p>Add new food item</p>
                </div>
                <div class="recent">
                    <p class="text-lg font-bold ml-12">Recent Sales</p>
                    <div class="flex flex-wrap justify-around">
                        <Recent_sales />
                        <Recent_sales />
                        <Recent_sales />
                        <Recent_sales />
                    </div>
                </div>
            </div>
        </div>
        <!-- in my shop section -->
        <div class="inmyshop">
            <Inmyshop />
        </div>
        <!-- new orders table section -->
        <div class="new-orders-table">
            <Table />
        </div>
    </div>
</template>

<script setup>
import Inmyshop from '../../components/Seller/Home/Inmyshop.vue'
import Table from '../../components/Seller/Home/Table.vue'
import Recent_sales from '../../components/Seller/Home/Recent_sales.vue'
</script>

<style>
    .header {
        height: 70px;
        border: 1px solid red;
    }
    .graph-recent-addnew {
        height: 270px;
        /* border: 1px solid red; */
        display: flex;
    }
    .graph {
        width: 50%;
        height: 100%;
        border: 1px solid black;
    }
    .recent-addnew {
        width: 50%;
        border: 1px solid blue;
        height: 100%;
    }
    .addnew {
        width: 100%;
        height: 20%;
        border: 1px solid green;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-weight: bold;
    }
    .recent {
        width: 100%;
        height: 80%;
        border: 1px solid red;
    }
    .inmyshop {
        border: 1px solid blue;
        height: 250px;
        width: 100%;
    }
    .new-orders-table {
        width: 100%;
        height: auto;
        border: 1px solid cyan;
    }
</style>