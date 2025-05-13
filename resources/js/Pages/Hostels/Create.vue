<template>
    <DialogModal :show="show" :closeable="true" @close="$emit('close')">
        <template #title>
            <h1>New Hostel</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name" type="text" id="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                        <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                        </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input v-model="form.address" type="text" id="address"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                        <p v-if="form.errors.address" class="text-red-500 text-sm mt-1">{{ form.errors.address }}</p>
                        </div>

                    <div class="mb-4">
                        <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendor</label>
                        <select v-model="form.vendor_id" id="vendor_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="" disabled>Select Vendor</option>
                            <option v-for="vendor in vendors" :key="vendor.id" :value="vendor.id">
                                {{ vendor.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select v-model="form.status" id="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <!-- description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3"></textarea>
                        <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
                    </div>
                </form>
            </div>
        </template>

        <template #footer>
            <button @click="$emit('close')"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700">
                Cancel
            </button>
            <button @click="submitForm"
                class="px-4 py-2 ms-3 bg-primary-600 text-white rounded-md hover:bg-primary-700">
                <i class="fa fa-plus"></i> Submit
            </button>
        </template>
    </DialogModal>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    show: Boolean,
    vendors: Array,
});

const emit = defineEmits(['close']);

const form = useForm({
    name: '',
    address: '',
    description: '',
    vendor_id: '',
    status: 'active',
});

const submitForm = () => {
    form.post(route('hostels.store'), {
        onSuccess: () => {
            form.reset();
            emit('close');
        },
    });
};
</script>
