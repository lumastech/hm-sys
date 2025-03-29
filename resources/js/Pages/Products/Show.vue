<template>
    <DashLayout>

        <Head :title="product.name" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/3 p-4">
                    <div class="h-64 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                        <img v-if="product.image" :src="`/storage/${product.image}`" :alt="product.name"
                            class="h-full w-full object-contain">
                        <div v-else class="text-gray-400">
                            <i class="fa fa-image fa-4x"></i>
                            <p class="mt-2">No image available</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-2/3 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ product.name }}</h1>
                            <p class="text-gray-600">{{ product.business?.name }}</p>
                        </div>
                        <span :class="{
                            'px-3 py-1 text-sm rounded-full': true,
                            'bg-green-100 text-green-800': product.status === 'active',
                            'bg-red-100 text-red-800': product.status === 'inactive',
                        }">
                            {{ product.status }}
                        </span>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Price</h2>
                        <p class="text-2xl font-bold">{{ formatCurrency(product.price) }}</p>
                    </div>

                    <div class="mt-6">
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Description</h2>
                        <div class="prose max-w-none" v-html="product.description"></div>
                    </div>

                    <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                        <Link :href="route('products.edit', product.id)"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Edit Product
                        </Link>
                        <Link :href="route('products.index')"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                        Back to Products
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </DashLayout>
</template>

<script setup>
import { format } from 'date-fns';

defineProps({
    product: Object
});

const formatCurrency = (value) => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    }).format(value);
};
</script>