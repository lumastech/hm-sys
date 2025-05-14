<template>
    <footer class="bg-teal-700 text-white py-8 px-4">
        <div class="max-w-6xl mx-auto px-2 md:px-0 py-6 lg:flex justify-between items-center">
            <p class="mb-2 lg:mb-0">© {{ new Date().getFullYear() }} Smart Hostel Manager. All rights reserved.</p>
            <div class="flex flex-wrap gap-4">
                <Link href="#" class="hover:text-gray-200">Terms of Service</Link>
                <Link href="#" class="hover:text-gray-200">Privacy Policy</Link>
                <Link href="#" class="hover:text-gray-200">Help Center</Link>
                <Link href="#contact" class="hover:text-gray-200">Contact</Link>
            </div>
        </div>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-6 text-sm">
            <div>
                <h5 class="font-semibold mb-2">About Smart Hostel Manager</h5>
                <p>We provide a modern solution to streamline hostel operations and improve student boarding
                    experiences. From room booking to fee payments — everything, digitized.</p>
            </div>

            <div>
                <h5 class="font-semibold mb-2">For Students & Vendors</h5>
                <ul class="space-y-1">
                    <li><Link href="/login" class="hover:underline">Student Dashboard</Link></li>
                    <li><Link href="/login" class="hover:underline">Vendor Portal</Link></li>
                    <li><Link href="#" class="hover:underline">How It Works</Link></li>
                    <li><Link href="#" class="hover:underline">FAQs</Link></li>
                </ul>
            </div>

            <div>
                <h5 class="font-semibold mb-2">Subscribe to our newsletter</h5>
                <p class="mb-2">Stay updated on new features and platform tips.</p>
                <div class="flex shadow-md rounded overflow-hidden">
                    <input type="email" class="w-full p-2 text-black rounded-l border border-sky-500 bg-white/70" placeholder="Your email" />
                    <button class="bg-white hover:bg-white/70 transition text-primary-500 px-4">OK</button>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
// import Link from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>