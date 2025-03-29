<template>
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            <h1>New Research</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="business_id" class="block text-sm font-medium text-gray-700">Business</label>
                        <select v-model="form.business_id" id="business_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">Select a business</option>
                            <!-- Options should be dynamically populated from a list of businesses -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                        <select v-model="form.user_id" id="user_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">Select a user</option>
                            <!-- Options should be dynamically populated from a list of users -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <input v-model="form.category" type="text" id="category"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="image" @change="handleImageUpload" class="mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="visibility" class="block text-sm font-medium text-gray-700">Visibility</label>
                        <select v-model="form.visibility" id="visibility"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="public">Public</option>
                            <option value="private">Private</option>
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
                </form>
            </div>
        </template>
        <template #footer>
            <button @click="$emit('close')"
                class="py-2.5 px-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            <button @click="submitForm"
                class="px-4 py-2 ms-3 bg-primary-600 text-white rounded-md hover:bg-primary-700">
                <i class="fa fa-plus "></i> Submit
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
    business_id: '',
    user_id: '',
    category: '',
    image: null,
    description: '',
    visibility: 'public',
    status: 'active',
});

const handleImageUpload = (event) => {
    form.image = event.target.files[0];
};

const submitForm = () => {
    form.post('/researches', {
        onSuccess: () => {
            props.show = false;
            form.reset();
            emit('close');
        },
    });
};
</script>