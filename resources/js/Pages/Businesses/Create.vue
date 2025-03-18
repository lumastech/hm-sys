<template>
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            <h1>New Business</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input v-model="form.title" type="text" id="title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <input type="file" id="image" @change="handleImageUpload" class="mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="importance" class="block text-sm font-medium text-gray-700">Importance</label>
                        <select v-model="form.importance" id="importance"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input v-model="form.start_date" type="date" id="start_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input v-model="form.end_date" type="date" id="end_date"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
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
    title: '',
    description: '',
    image: null,
    importance: 'medium',
    start_date: '',
    end_date: '',
    status: 'active',
});

const handleImageUpload = (event) => {
    form.value.image = event.target.files[0];
};

const submitForm = () => {
    form.post('/business', {
        onSuccess: () => {
            props.show = false;
            form.reset();
            emit('close');
        },
    });
};
</script>