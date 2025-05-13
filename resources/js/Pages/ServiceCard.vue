<template>
    <div>
        <img :src="`../../assets/images/${img}`" class="rounded mb-4 w-full object-cover h-48" />
        <h4 class="font-semibold mb-2">{{ title }}</h4>
        <p class="text-sm text-gray-600">{{ desc }}</p>
    </div>
</template>

<script setup>
defineProps(['img', 'title', 'desc']);
</script>