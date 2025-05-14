<template>
    <nav class="bg-gradient-to-r from-indigo-700/10 to-teal-100/30 ">
        <div class="max-w-7xl mx-auto flex px-4">
            <Link href="/" class="py-2 text-primary-500 shrink-0">
            <img src="../../assets/images/logo.png" alt="Sch" class="h-10">
            </Link>
            <div class="flex-auto"></div>
            <!-- hambage -->
            <div class="md:hidden flex items-center">
                <button @click="navbarOpen = !navbarOpen" class="text-primary-500 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18M3 12h18m-7.5 6h7.5" />
                    </svg>
                </button>
            </div>
            <div class="fixed z-30 h-full w-full backdrop-blur" @click="navbarOpen = false"
                :class="navbarOpen ? 'block' : 'hidden'"></div>
            <div @click="navbarOpen = false"
                class="fixed z-40 md:static md:translate-x-0 bg-primary-700 text-white h-full top-0 left-0 md:self-center md:flex md:space-x-2 md:py-2 md:text-primary-800 md:bg-primary-100/0 transition duration-300 ease-in-out "
                :class="navbarOpen ? 'translate-x-0 ' : '-translate-x-full', isMobile ? 'w-60' : ''">
                <img src="../../assets/images/img_2.jpg" alt="" class="w-full aspect-video mb-4 md:hidden">
                <Link
                    class="block md:inline bg-indigo-400/50 my-1 px-2 py-1 mx-2 rounded hover:bg-primary-500 md:hover:bg-primary-100 md:bg-primary-100/0"
                    href="/">HOME</Link>
                <Link
                    class="block md:inline bg-indigo-400/50 my-1 px-2 py-1 mx-2 rounded hover:bg-primary-500 md:hover:bg-primary-100 md:bg-primary-100/0"
                    href="/">EXPLORE</Link>
                <Link
                    class="block md:inline bg-indigo-400/50 my-1 px-2 py-1 mx-2 rounded hover:bg-primary-700 md:bg-primary-500 md:text-white"
                    href="/login">LOGIN</Link>
                <Link
                    class="block md:inline bg-indigo-400/50 my-1 px-2 py-1 mx-2 rounded hover:bg-primary-700 md:bg-primary-500 md:text-white"
                    href="/register">REGISTER</Link>
            </div>

        </div>
    </nav>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const isMobile = ref(false);


const navbarOpen = ref(false);
const toggleNavbar = () => {
    navbarOpen.value = !navbarOpen.value;
};

if (window.innerWidth < 768) {
    isMobile.value = true;
} else {
    isMobile.value = false;
}
window.addEventListener("resize", () => {
    if (window.innerWidth < 768) {
        isMobile.value = true;
    } else {
        isMobile.value = false;
    }
});
</script>