<template>
    <Dashboard>

        <Head title="Create Event" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold mb-6">Create New Event</h1>

            <form @submit.prevent="submitForm">
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Event Title</label>
                        <input v-model="form.title" type="text" id="title" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <input v-model="form.category" type="text" id="category" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="access" class="block text-sm font-medium text-gray-700">Access Type</label>
                            <select v-model="form.access" id="access" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="invite-only">Invite Only</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date &
                                Time</label>
                            <input v-model="form.start_date" type="datetime-local" id="start_date" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date &
                                Time</label>
                            <input v-model="form.end_date" type="datetime-local" id="end_date"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price (leave empty for free
                            event)</label>
                        <input v-model="form.price" type="number" id="price" min="0" step="0.01"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Event
                            Description</label>
                        <textarea v-model="form.description" id="description" rows="6" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Event Image</label>
                        <input type="file" id="image" @change="form.image = $event.target.files[0]"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
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
                        <button type="button" @click="$inertia.visit(route('events.index'))"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Create Event
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </Dashboard>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    category: '',
    access: 'public',
    description: '',
    image: null,
    start_date: '',
    end_date: '',
    price: null,
    status: 'active',
    business_id: null,
});

const submitForm = () => {
    form.post(route('events.store'), {
        onSuccess: () => {
            form.reset();
        }
    });
};
</script>