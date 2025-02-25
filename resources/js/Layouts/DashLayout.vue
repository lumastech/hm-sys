<script setup>
import Sidebar from '@/Components/Sidebar.vue';

</script>

<template>
    <div class="fixed flex h-full w-full bg-primary-100">
        <Sidebar />
        <main class="flex-auto">
            <div class="navbar p-2 h-16 border-primary-50"></div>
            <div class="main h-full bg-primary-50 rounded-2xl">
                <slot />
            </div>
        </main>
    </div>
</template>