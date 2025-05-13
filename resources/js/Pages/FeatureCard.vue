<template>
    <div>
        <div class="text-4xl mb-2">{{ icon }}</div>
        <h3 class="font-semibold mb-2">{{ title }}</h3>
        <p class="text-sm">{{ desc }}</p>
    </div>
</template>

<script setup>
defineProps(['icon', 'title', 'desc']);
</script>