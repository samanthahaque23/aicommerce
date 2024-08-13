<template>
    <div class="flex items-center justify-between mb-3 ml-10">
        <h1 class="text-3xl text-black font-semibold">Products</h1>
        <button
            type="submit"
            class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white blue-indigo-600 hover"
            @click="showProductModal"
        >
            Add new product
        </button>
    </div>
    <ProductModal v-model:modalValue="showModal" :product="productModel" />
    <ProductTable />
</template>

<script setup>
import ProductTable from "./ProductsTable.vue";
import ProductModal from "./ProductModal.vue";
import { ref } from "vue";

const showModal = ref(false);

const DEFAULT_PRODUCT = {
    id: "",
    title: "",
    description: "",
    image: "",
    price: "",
};

const productModel = ref({ ...DEFAULT_PRODUCT });
function showProductModal() {
    showModal.value = true;
}
</script>





