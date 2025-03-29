<template>
    <DashLayout>

        <Head :title="`Edit ${forum.title}`" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold mb-6">Edit Forum</h1>

            <form @submit.prevent="submitForm">
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Forum Title</label>
                        <input v-model="form.title" type="text" id="title" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select v-model="form.type" id="type" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="discussion">Discussion</option>
                                <option value="qna">Q&A</option>
                                <option value="announcement">Announcement</option>
                            </select>
                        </div>

                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <input v-model="form.category" type="text" id="category" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description" rows="6" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Forum Image</label>
                        <input type="file" id="image" @change="form.image = $event.target.files[0]"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <div v-if="forum.image" class="mt-2">
                            <p class="text-sm text-gray-500">Current image:</p>
                            <img :src="`/storage/${forum.image}`" class="h-20 mt-1 rounded">
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select v-model="form.status" id="status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="button" @click="$inertia.visit(route('forums.show', forum.id))"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Update Forum
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </DashLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    forum: Object
});

const form = useForm({
    title: props.forum.title,
    type: props.forum.type,
    category: props.forum.category,
    description: props.forum.description,
    image: null,
    status: props.forum.status,
    business_id: props.forum.business_id,
});

const submitForm = () => {
    form.put(route('forums.update', props.forum.id), {
        onSuccess: () => {
            // Optional success handling
        }
    });
};
</script>