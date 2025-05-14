<template>

    <Head title="Smart Hostel Manager" />
    <Navbar />
    <section class="relative bg-cover bg-center h-130 home-hero-section">
        <div
            class="flex bg-gradient-to-r h-full from-primary-700/50 to-black/40 items-center  text-white text-center px-4">
            <div class="flex self-center max-w-7xl mx-auto">
                <div class="flex-auto justify-center items-center flex flex-col py-20">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Smart Hostel Manager</h1>
                    <p class="text-lg max-w-xl">Simplify student accommodation with our all-in-one management platform.
                    </p>
                    <p class="text-lg mb-6 max-w-xl">We provide a modern solution to streamline hostel operations and
                        improve
                        student
                        boarding experiences. From room booking to fee payments — everything, digitized.</p>
                    <a href="#features"
                        class="px-6 py-2 bg-gradient-to-l from-indigo-700/80 to-teal-700 shadow hpver:shadow-xl text-white font-semibold rounded hover:bg-primary-500 transition">Explore
                        Features</a>
                </div>
                <img src="../../assets/images/phone_map.png" alt="Digital Map"
                    class="hidden md:block max-w-md self-center" />
            </div>
        </div>
    </section>

    <section id="features" class="py-16 bg-white text-center text-secondary-500">
        <h2 class="text-3xl font-bold mb-10 text-primary-500">Why Choose Us?</h2>
        <div class="grid md:grid-cols-3 gap-10 max-w-7xl mx-auto px-4 text-secondary-500">
            <div class="shadow p-6 rounded bg-gradient-to-r from-indigo-400/10 to-teal-100/30">
                <i class="fa-solid fa-bed text-4xl text-primary-500"></i>
                <h3 class="font-semibold mb-2">Room Management</h3>
                <p class="text-sm">Easily assign rooms, track availability, and manage capacities.</p>
            </div>
            <div class="shadow p-6 rounded bg-gradient-to-r from-indigo-400/10 to-teal-100/30">
                <i class="fa-solid fa-graduation-cap text-4xl text-primary-500"></i>
                <h3 class="font-semibold mb-2">Student Profiles</h3>
                <p class="text-sm">Manage student details, documents, payments, and more in one place.</p>
            </div>
            <div class="shadow p-6 rounded bg-gradient-to-r from-indigo-400/10 to-teal-100/30">
                <i class="fa-solid fa-credit-card text-4xl text-primary-500"></i>
                <div class="text-4xl mb-2">{{ icon }}</div>
                <h3 class="font-semibold mb-2">Online Payments</h3>
                <p class="text-sm">Collect fees through secure online channels, with automatic receipts.</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-indigo-400/10 to-teal-100/30 text-secondary-500">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8 items-center px-4">
            <img src="../../assets/images/img_2.jpg" alt="Students in hostel" class="w-full rounded shadow" />
            <div>
                <h3 class="text-2xl font-bold mb-4 text-primary-500">Designed for Students and Hostel Managers</h3>
                <p class="mb-4">Our platform connects students with verified boarding houses, while giving managers
                    powerful tools to run their facilities smoothly.</p>
                <p class="text-sm">From booking to move-out, everything is digitized and efficient.</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white text-center text-secondary-500">
        <h2 class="text-3xl font-bold mb-10 text-primary-500">More Capabilities</h2>
        <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
            <div>
                <img src="../../assets/images/ico_1.png" class="rounded mb-4 w-full object-cover h-48" />
                <h4 class="font-semibold mb-2 text-primary-500">Security & Access Logs</h4>
                <p class="text-sm">Track who enters and exits, integrate with smart locks and logs.</p>
            </div>
            <div>
                <img src="../../assets/images/ico_2.png" class="rounded mb-4 w-full object-cover h-48" />
                <h4 class="font-semibold mb-2 text-primary-500">Maintenance Requests</h4>
                <p class="text-sm">Students can report issues online; managers assign staff quickly.</p>
            </div>
            <div>
                <img src="../../assets/images/ico_3.png" class="rounded mb-4 w-full object-cover h-48" />
                <h4 class="font-semibold mb-2 text-primary-500">Reports & Analytics</h4>
                <p class="text-sm">Gain insights into occupancy, revenue, and performance metrics.</p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-indigo-400/10 to-teal-100/30 text-secondary-500" id="contact">
        <div class="md:flex max-w-7xl mx-auto text-center px-4 items-center space-x-4">
            <img src="../../assets/images/phone_msg.png" alt="Message us"
                class="max-w-sm self-center hidden md:block" />
            <div class="flex-auto sef-center p-4 rounded bg-white shadow">
                <h2 class="text-3xl text-primary-500 font-bold mb-8">Talk to Us</h2>
                <form class="space-y-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <input type="text" placeholder="Your Name"
                            class="flex-1 p-2 border border-primary-500 rounded" />
                        <input type="email" placeholder="Your Email"
                            class="flex-1 p-2 border border-primary-500 rounded" />
                    </div>
                    <textarea placeholder="How can we help you?"
                        class="w-full p-2 border border-primary-500 rounded"></textarea>
                    <div class="flex gap-4 justify-center">
                        <button type="submit"
                            class="bg-primary-100 hpver:shadow-xl text-primary-700 shadow px-6 py-2 rounded hover:bg-teal-500 hover:text-white transition">Send
                            Message</button>
                        <button type="reset" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400 hover:text-white">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <Footer />


</template>

<script setup>
import FeatureCard from "./FeatureCard.vue";
import ServiceCard from "./ServiceCard.vue";
import Footer from "@/Components/Footer.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";
import Navbar from './Navbar.vue'
</script>
<style>
.home-hero-section {
    background-image: url("../../assets/images/img_2.jpg");
}
</style>
