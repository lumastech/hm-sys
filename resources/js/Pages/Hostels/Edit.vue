<template v-if="props.show">
    <DialogModal :show="props.show" :closeable="true" @close="$emit('close')">
        <template #title>
            Edit Hostel
        </template>

        <template #content>
            <form @submit.prevent="submitForm">
                <div class="p-4 md:p-5 space-y-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name" type="text" id="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input v-model="form.address" type="text" id="address"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
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
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" rows="3"></textarea>
                        <p v-if="form.errors.description" class="text-red-500 text-sm mt-1">{{ form.errors.description }}</p>
                    </div>
                </div>
            </form>
        </template>

        <template #footer>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button @click="submitForm" type="submit"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <i class="fa fa-check"></i> Save
                </button>
                <button @click="$emit('close')" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700">
                    Cancel
                </button>
            </div>
        </template>
    </DialogModal>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    show: Boolean,
    hostel: {
        type: Object,
        default: () => ({}),
    },
    vendors: {
        type: Array,
        default: () => [],
    },
});

const emit = defineEmits(['close']);

const form = useForm({
    name: props.hostel?.name || '',
    address: props.hostel?.address || '',
    description: props.hostel?.description || '',
    vendor_id: props.hostel?.vendor_id || '',
    status: props.hostel?.status || 'active',
});

// Watch for hostel prop changes (if modal is reused)
watch(
    () => props.hostel,
    (newHostel) => {
        form.name = newHostel?.name || '';
        form.address = newHostel?.address || '';
        form.vendor_id = newHostel?.vendor_id || '';
        form.status = newHostel?.status || 'active';
    }
);

const submitForm = () => {
    form.put(route('hostels.update', props.hostel.id), {
        preserveScroll: true,
        onSuccess: () => {
            emit('close');
        },
    });
};
</script>
