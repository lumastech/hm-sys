<template>
    <div class="p-4 bg-white shadow-md rounded-lg">
        <!-- Hostel image -->
        <div class="flex items-center mb-4">
            <img src="../../../assets/images/img_1.png" alt="Hostel Image" class="aspect-video w-full rounded-md" />
        </div>

        <!-- Hostel details -->
        <h1 class="text-2xl font-semibold mb-4">{{ hostel.name }}</h1>

        <div class="mb-4">
            <p class="text-gray-700"><strong>Address:</strong> {{ hostel.address }}</p>
        </div>

        <div class="mb-4">
            <p><strong>Status:</strong>
                <span :class="{
                    'text-green-600 font-semibold': hostel.status === 'active',
                    'text-red-600 font-semibold': hostel.status === 'inactive',
                }">
                    {{ hostel.status }}
                </span>
            </p>
            <p><strong>Vendor:</strong> {{ hostel.vendor?.name || 'N/A' }}</p>
        </div>

        <!-- Add Room Button -->
        <div class="flex justify-end mb-4">
            <button @click="createRoomModal = true"
                class="px-4 py-2 bg-primary-500 text-white rounded-md hover:bg-primary-700 trasition">
                <i class="fa fa-plus"></i> Add Room
            </button>
        </div>

        <!-- List of Rooms -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">Rooms</h2>
            <div v-if="hostel.rooms && hostel.rooms.length" class="text-sm">
                <div v-for="room in hostel.rooms" :key="room.id" class="flex shadow px-2 py-1 rounded mb-2 cursor-pointer hover:bg-primary-500 hover:text-white transition">
                    <span class="font-semibold">R:{{ room.room_number }}</span>
                    <span class="flex-auto px-2 text-center">B: {{ room.capacity }}</span>
                    <span class="w-2 h-2 rounded-full self-center mx-3 bg-green-500"></span>
                    <button><i class="fas fa-trash-can px-2"></i></button>
                    <button><i class="fas fa-pen"></i></button>
                </div>
            </div>
            <p v-else class="text-gray-600">No rooms have been added to this hostel yet.</p>
        </div>
    </div>
    <CreateRoom :show="createRoomModal" :hostelId="hostel.id" @close="closeModal" />
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import CreateRoom from './CreateRoom.vue';

defineProps({
    hostel: Object,
});
const createRoomModal = ref(false);
const deleteDialog = ref({ show: false, id: null });
const closeModal = () => {
    createRoomModal.value = false;
    deleteDialog.value.show = false;
};

// watch(filters, (value) => {
//     router.get('/hostels', { search: value.search }, { preserveState: true });
// }, { deep: true });
</script>

