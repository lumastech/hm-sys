<template>
    <DialogModal :show="show" :closeable="true" @close="close">
        <template #title>
            <h1>Edit Project</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="business_id" class="block text-sm font-medium text-gray-700">Business</label>
                        <select v-model="form.business_id" id="business_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Select Business</option>
                            <option v-for="business in businesses" :key="business.id" :value="business.id">
                                {{ business.name }}
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input v-model="form.name" type="text" id="name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <input v-model="form.category" type="text" id="category" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Project Image</label>
                        <input type="file" id="image" @change="form.image = $event.target.files[0]"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <div v-if="project.image" class="mt-2">
                            <p class="text-sm text-gray-500">Current image:</p>
                            <img :src="`/storage/${project.image}`" class="h-20 mt-1 rounded">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select v-model="form.status" id="status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="planning">Planning</option>
                            <option value="in_progress">In Progress</option>
                            <option value="on_hold">On Hold</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </form>
            </div>
        </template>
        <template #footer>
            <button @click="close"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Cancel
            </button>
            <button @click="submitForm"
                class="px-4 py-2 ms-3 bg-primary-600 text-white rounded-md hover:bg-primary-700">
                <i class="fa fa-save"></i> Update Project
            </button>
        </template>
    </DialogModal>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    show: Boolean,
    project: Object,
    businesses: Array,
});

const emit = defineEmits(['close']);

const form = useForm({
    business_id: props.project.business_id,
    name: props.project.name,
    category: props.project.category,
    description: props.project.description,
    image: null,
    status: props.project.status,
});

const submitForm = () => {
    form.put(route('projects.update', props.project.id), {
        onSuccess: () => {
            emit('close');
        },
    });
};

const close = () => {
    emit('close');
};
</script>