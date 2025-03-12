<template>
    <div>
        <h1 class="text-2xl font-semibold mb-4">{{ announcement.title }}</h1>
        <div class="mb-4">
            <img :src="`/storage/${announcement.image}`" alt="Announcement Image"
                class="w-full h-64 object-cover rounded-lg" />
        </div>
        <div class="mb-4">
            <p class="text-gray-700">{{ announcement.description }}</p>
        </div>
        <div class="mb-4">
            <p><strong>Importance:</strong> {{ announcement.importance }}</p>
            <p><strong>Start Date:</strong> {{ announcement.start_date }}</p>
            <p><strong>End Date:</strong> {{ announcement.end_date }}</p>
            <p><strong>Status:</strong> {{ announcement.status }}</p>
        </div>
        <div class="flex justify-end">
            <Link :href="`/announcements/${announcement.id}/edit`"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Edit
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    announcement: Object,
});
</script>