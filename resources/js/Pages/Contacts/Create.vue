<template>
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            <h1>New Contact</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name" type="text" id="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                        <select v-model="form.priority" id="priority"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Primary Phone</label>
                        <input v-model="form.phone" type="tel" id="phone"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="phone_2" class="block text-sm font-medium text-gray-700">Secondary Phone</label>
                        <input v-model="form.phone_2" type="tel" id="phone_2"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input v-model="form.email" type="email" id="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input v-model="form.address" type="text" id="address"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input v-model="form.city" type="text" id="city"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                        </div>
                        <div>
                            <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                            <input v-model="form.district" type="text" id="district"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                            <input v-model="form.province" type="text" id="province"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <input v-model="form.country" type="text" id="country"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                        </div>
                    </div>
                </form>
            </div>
        </template>
        <template #footer>
            <button @click="$emit('close')"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            <button @click="submitForm"
                class="px-4 py-2 ms-3 bg-primary-600 text-white rounded-md hover:bg-primary-700">
                <i class="fa fa-plus"></i> Submit
            </button>
        </template>
    </DialogModal>
</template>

<script setup>
import { ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    show: Boolean,
});

const emit = defineEmits(['close']);

const form = useForm({
    user_id: '',
    priority: 'medium',
    name: '',
    phone: '',
    phone_2: '',
    email: '',
    address: '',
    city: '',
    district: '',
    province: '',
    country: '',
});

const submitForm = () => {
    form.post('/contacts', {  // Changed endpoint to /contacts
        onSuccess: () => {
            props.show = false;
            form.reset();
            emit('close');
        },
    });
};
</script>