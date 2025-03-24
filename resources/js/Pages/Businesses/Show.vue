<template>
    <div>
        <h1 class="text-2xl font-semibold mb-4">{{ business.title }}</h1>
        <div class="mb-4">
            <img :src="`/storage/${business.image}`" alt="Business Image"
                class="w-full h-64 object-cover rounded-lg" />
        </div>
        <div class="mb-4">
            <p class="text-gray-700">{{ business.description }}</p>
        </div>
        <div class="mb-4">
            <p><strong>Importance:</strong> {{ business.importance }}</p>
            <p><strong>Start Date:</strong> {{ business.start_date }}</p>
            <p><strong>End Date:</strong> {{ business.end_date }}</p>
            <p><strong>Status:</strong> {{ business.status }}</p>
        </div>
        <div class="flex justify-end">
            <Link :href="`/businesses/${business.id}/edit`"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Edit
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    business: Object,
});
</script>