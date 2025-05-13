<template>
    <DialogModal :show="show" :closeable="true" @close="$emit('close')">
        <template #title>
            <h1 class="text-2xl font-semibold mb-6">Add New Room</h1>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label for="room_number" class="block text-sm font-medium text-gray-700">Room Number {{ h }}</label>
                    <input id="room_number" v-model="form.room_number" type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    <p v-if="form.errors.room_number" class="text-red-500 text-sm mt-1">{{ form.errors.room_number
                        }}</p>
                </div>

                <div class="mb-4">
                    <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                    <input id="capacity" v-model="form.capacity" type="number" min="1"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    <p v-if="form.errors.capacity" class="text-red-500 text-sm mt-1">{{ form.errors.capacity }}</p>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" v-model="form.status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                    <p v-if="form.errors.status" class="text-red-500 text-sm mt-1">{{ form.errors.status }}</p>
                </div>
            </form>
        </template>

        <template #footer>
            <button @click="$emit('close')"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700">
                Cancel
            </button>
            <button @click="submit"
                class="px-4 py-2 ms-3 bg-primary-600 text-white rounded-md hover:bg-primary-700">
                <i class="fa fa-plus"></i> Submit
            </button>
        </template>
    </DialogModal>
</template>

<script setup>
import DialogModal from '@/Components/DialogModal.vue';
import { useForm, Link } from '@inertiajs/vue3';

const emit = defineEmits(['close']);

const props = defineProps({
    hostelId: Number, // Passed from the parent or page route
    show: Boolean,
});

const form = useForm({
    room_number: '',
    capacity: '',
    status: 'available',
    hostel_id: props.hostelId,
});

const submit = () => {
    form.hostel_id = props.hostelId;
    form.post(route('rooms.store'), {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>
