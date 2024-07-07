<template>
  <div class="p-4 mt-7">
    <div class="flex justify-center mb-4 space-x-8">
      <button 
        v-for="view in views" 
        :key="view.name"
        @click="currentView = view.name"
        :class="['px-4 py-2 relative', 
        { 'text-orange-500 underline-offset-4 font-bold': currentView === view.name, 'text-gray-700': currentView !== view.name },
        { 'text-gray-400 ': currentView !== view.name }
        ]"
      >
        {{ view.label }}
        <span v-if="currentView === view.name" class="absolute left-0 bottom-0 w-full h-1 bg-orange-500"></span>
      </button>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-bold">Product
              Name</th>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-bold">Quantity
            </th>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-bold">Picked By
            </th>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-bold">Price
            </th>
            <th scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider font-bold">Status
            </th>
          </tr>
          <tr>
            <th colspan="5" class="px-6 py-3 border-b-2 border-green-900"></th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 overflow-y-auto max-h-80">
          <tr v-for="(order, index) in filteredOrders" :key="index" class="hover:bg-gray-100">
            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ order.productName }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ order.quantity }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ order.pickedBy }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">&#8377; {{ order.price }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span :class="statusClasses(order.status)" class="text-sm">{{ order.status }}</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const views = [
  { name: 'newOrders', label: 'New Orders' },
  { name: 'unclaimed', label: 'Unclaimed' },
  { name: 'refunds', label: 'Refunds' },
  { name: 'transactionHistory', label: 'Transaction History' },
];

const currentView = ref('newOrders');

const newOrders = ref([
  { productName: 'Product A', quantity: 2, pickedBy: 'John Doe', price: 250, status: 'Pending' },
  { productName: 'Product B', quantity: 1, pickedBy: 'Jane Smith', price: 150, status: 'Processing' },
]);

const transactionHistory = ref([
  { productName: 'Product C', quantity: 3, pickedBy: 'John Doe', price: 300, status: 'Completed' },
  { productName: 'Product D', quantity: 2, pickedBy: 'Jane Smith', price: 200, status: 'Completed' },
]);

const unclaimed = ref([
  { productName: 'Product E', quantity: 1, pickedBy: 'John Doe', price: 100, status: 'Unclaimed' },
  { productName: 'Product F', quantity: 4, pickedBy: 'Jane Smith', price: 400, status: 'Unclaimed' },
]);

const refunds = ref([
  { productName: 'Product G', quantity: 1, pickedBy: 'John Doe', price: 150, status: 'Refunded' },
  { productName: 'Product H', quantity: 2, pickedBy: 'Jane Smith', price: 300, status: 'Refunded' },
]);

const filteredOrders = computed(() => {
  if (currentView.value === 'newOrders') {
    return newOrders.value;
  } else if (currentView.value === 'transactionHistory') {
    return transactionHistory.value;
  } else if (currentView.value === 'unclaimed') {
    return unclaimed.value;
  } else if (currentView.value === 'refunds') {
    return refunds.value;
  }
  return [];
});

const statusClasses = (status) => {
  return {
    'bg-green-100 text-green-800': status === 'Pending',
    'bg-yellow-100 text-yellow-800': status === 'Processing',
    'bg-blue-100 text-blue-800': status === 'Completed',
    'bg-red-100 text-red-800': status === 'Unclaimed',
    'bg-orange-100 text-orange-800': status === 'Refunded',
  };
};
</script>

<style scoped>
button {
  flex: 1;
  text-align: center;
  font-size: 1.125rem; 
}

button.underline {
  text-decoration: underline;
}
</style>
