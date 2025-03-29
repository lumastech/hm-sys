<template v-if="props.show">
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            Edit Research
        </template>
        <template #content>
            <form @submit.prevent="submitForm">
                <div class="p-4 md:p-5 space-y-4">
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <input v-model="form.category" type="text" id="category"
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
                </div>
            </form>
        </template>
        <template #footer>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button @click="submitForm" type="submit"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <i class="fa fa-check"></i>
                    Save</button>
                <button @click="$emit('close')" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            </div>
        </template>
    </DialogModal>
</template>

<script setup>
import { ref, watch } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    show: Boolean,
    research: {
        type: Object,
        default: () => ({}),
    },
});

const emit = defineEmits(['close']);

const form = useForm({
    category: props.research?.category || '',
    description: props.research?.description || '',
    image: null,
    visibility: props.research?.visibility || 'public',
    status: props.research?.status || 'active',
});

const handleImageUpload = (event) => {
    form.image = event.target.files[0];
};

watch(
    () => props.research,
    (newResearch) => {
        form.category = newResearch?.category || '';
        form.description = newResearch?.description || '';
        form.image = null;
        form.visibility = newResearch?.visibility || 'public';
        form.status = newResearch?.status || 'active';
    },
    { deep: true, immediate: true }
);

const submitForm = () => {
    form.put(`/researches/${props.research.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            props.show = false;
            emit('close');
        },
    });
};
</script>