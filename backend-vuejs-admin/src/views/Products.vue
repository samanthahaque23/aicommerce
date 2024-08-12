<template>
    <div class="flex items-center justify-between mb-3 ml-10">
        <h1 class="text-3xl text-black font-semibold">Products</h1>
        <button
            type="submit"
            class="flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white blue-indigo-600 hover"
        >
            Add new product
        </button>
    </div>
    <div class="bg-white text-black p-4 rounded shadow ml-10">
        <div class="flex justify-between border-b-2 pb-3">
            <div class="flex items-center">
                <span class="whitespace-nowrap mr-3"> Per Page </span>
                <select
                    @change="getProducts(null)"
                    v-model="perPage"
                    class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                >
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <input
                    v-model="search"
                    @change="getProducts(null)"
                    class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="Type to Search products"
                />
            </div>
        </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <TableHeaderCell
                            field="id"
                            :sort-field="sortField"
                            :sort-direction="sortDirection"
                            @click="sortProducts('id')"
                        >
                            ID
                        </TableHeaderCell>
                        <TableHeaderCell
                            field="image"
                            :sort-field="sortField"
                            :sort-direction="sortDirection"
                        >
                            Image
                        </TableHeaderCell>
                        <TableHeaderCell
                            field="title"
                            :sort-field="sortField"
                            :sort-direction="sortDirection"
                            @click="sortProducts('title')"
                        >
                            Title
                        </TableHeaderCell>
                        <TableHeaderCell
                            field="price"
                            :sort-field="sortField"
                            :sort-direction="sortDirection"
                            @click="sortProducts('price')"
                        >
                            Price
                        </TableHeaderCell>
                        <!-- <TableHeaderCell
                            field="quantity"
                            :sort-field="sortField"
                            :sort-direction="sortDirection"
                            @click="sortProducts('quantity')"
                        >
                            Quantity
                        </TableHeaderCell> -->
                        <TableHeaderCell
                            field="updated_at"
                            :sort-field="sortField"
                            :sort-direction="sortDirection"
                            @click="sortProducts('updated_at')"
                        >
                            Last Updated At
                        </TableHeaderCell>
                        <!-- <TableHeaderCell field="actions">
                            Actions
                        </TableHeaderCell> -->
                    </tr>
                </thead>
                <tbody v-if="products.loading ">
                    <tr>
                        <td colspan="6">
                            <Spinner v-if="products.loading" />
                            <p v-else class="text-center py-8 text-gray-700">
                                There are no products
                            </p>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr v-for="product of products.data">
                        <td class="border-b p-2">
                            {{ product.id }}
                        </td>
                        <td class="border-b p-2">
                            <img
                                :src="product.image_url"
                                :alt="product.title"
                                class="w-16"
                            />
                        </td>
                        <td
                            class="border-b p-2 whitespace-nowrap overflow-hidden text-ellipsis max-w-[200px]"
                        >
                            {{ product.title }}
                        </td>
                        <td class="border-b p-2">
                            {{ product.price }}
                        </td>
                        <td class="border-b p-2">
                            {{ product.updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div
                v-if="!products.loading"
                class="flex justify-between items-center mt-5"
            >
                <span>
                    Showing from {{ products.from }} to {{ products.to }}
                </span>
                <nav
                    v-if="products.total > products.limit"
                    class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                        v-for="(link, i) of products.links"
                        :key="i"
                        :disabled="!link.url"
                        href="#"
                        @click.prevent="getForPage($event, link)"
                        aria-current="page"
                        class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                        :class="[
                            link.active
                                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
                            i === 0 ? 'rounded-l-md' : '',
                            i === products.links.length - 1
                                ? 'rounded-r-md'
                                : '',
                            !link.url ? ' bg-gray-100 text-gray-700' : '',
                        ]"
                        v-html="link.label"
                    >
                    </a>
                </nav>
            </div>
    </div>
</template>

<script setup >
import { computed, onMounted, ref } from "vue";
import store from "../store/index.js";
import { PRODUCTS_PER_PAGE } from "../constants.js";
import TableHeaderCell from "../components/core/table/TableHeaderCell.vue";

const perPage = ref(PRODUCTS_PER_PAGE);
const search = ref("");
const products = computed(() => store.state.products);
const sortField = ref("updated_at");
const sortDirection = ref("desc");

onMounted(() => {
    getProducts();
});

function getProducts(url = null) {
    store.dispatch("getProducts", {
        url,
        search: search.value,
        per_page: perPage.value,
        sort_field: sortField.value,
        sort_direction: sortDirection.value,
    });
}

function sortProducts(field) {
    if (field === sortField.value) {
        if (sortDirection.value === "desc") {
            sortDirection.value = "asc";
        } else {
            sortDirection.value = "desc";
        }
    } else {
        sortField.value = field;
        sortDirection.value = "asc";
    }

    getProducts();
}
function getForPage(ev, link) {
    if (!link.url || link.active) {
        return;
    }

    getProducts(link.url);
}
</script>
