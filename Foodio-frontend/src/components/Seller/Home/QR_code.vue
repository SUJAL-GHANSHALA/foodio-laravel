<template>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold mb-4">&lt; Your QR code is generated &gt;</h1>
            <div class="border-4 border-black inline-block p-4">
                <img :src="qrCodeUrl" alt="QR Code" class="mx-auto" ref="qrImage" />
            </div>
            <p class="text-orange-500 underline mt-2 cursor-pointer text-sm" @click="printQR">Print QR</p>

            <p class="text-gray-700 mb-4">Please print QR code or stick it to your meal.</p>
            <div class="space-x-4">
                <button class="btn-finish">Finish</button>
                <button class="btn-finish-add-new">Finish and add new</button>
                <button class="btn-add-print-queue">Add to print queue</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const qrCodeUrl = ref('');
const qrImage = ref(null);

const fetchQRCode = async () => {
    try {
        const response = await fetch('http://localhost:8000/api/generate-qr-code');
        const qrCode = await response.text();
        qrCodeUrl.value = `data:image/svg+xml;base64,${btoa(unescape(encodeURIComponent(qrCode)))}`;
    } catch (error) {
        console.error('Error fetching QR code:', error);
    }
}

const printQR = () => {
    const qrImageElement = qrImage.value;
    if (qrImageElement) {
        const printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(`
          <html>
            <head>
              <title>Print QR Code</title>
              <style>
                body { margin: 0; text-align: center; }
                img { max-width: 100%; max-height: 100%; }
              </style>
            </head>
            <body>
              <img src="${qrImageElement.src}" />
            </body>
          </html>
        `);
        printWindow.document.close();
        printWindow.print();
    } else {
        console.error('QR image element not found.');
    }
}

onMounted(() => {
    fetchQRCode();
});
</script>

<style scoped>
.btn-finish,
.btn-finish-add-new,
.btn-add-print-queue {
    display: inline-block;
    padding: 0.5rem 1rem;
    background-color: #3b82f6;
    color: #ffffff;
    border-radius: 0.375rem;
    transition: background-color 0.2s ease-in-out;
    text-decoration: none;
    cursor: pointer;
}

.btn-finish:hover,
.btn-finish-add-new:hover,
.btn-add-print-queue:hover {
    background-color: #2563eb;
}

.text-orange-500 {
    color: #f59e0b;
}
</style>