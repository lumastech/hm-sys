<script setup>
import Navbar from '@/Components/Navbar.vue';
import Sidebar from '@/Components/Sidebar.vue';

</script>

<template>
    <div class="relative top-full">
        <div class="fixed flex h-full w-full bg-primary-50">
            <Sidebar class="hidden md:inline" />
            <main class="flex-auto">
                <div class="navbar p-2 h-16 border-primary-50">
                    <Navbar />
                </div>
                <div class="main h-full bg-white md:rounded-tl-2xl p-4 overflow-x-auto pb-24">
                    <slot />
                </div>
            </main>
        </div>
        <Sidebar class="absolute md:hidden bg-primary-100  top-0 left-0 -translate-x-full transition-all" />
    </div>
</template>