<template>
    <DialogModal :show="show" :closeable="true" @close="close">
        <template #title>
            <h1>Create New Helpdesk Ticket</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Requester Name</label>
                            <input v-model="form.name" type="text" id="name" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input v-model="form.phone" type="tel" id="phone" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email (optional)</label>
                        <input v-model="form.email" type="email" id="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input v-model="form.subject" type="text" id="subject" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="attended_by" class="block text-sm font-medium text-gray-700">Assign To
                                (optional)</label>
                            <select v-model="form.attended_by" id="attended_by"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Select Staff</option>
                                <option v-for="staffMember in staff" :key="staffMember.id" :value="staffMember.id">
                                    {{ staffMember.name }}
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select v-model="form.status" id="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="open">Open</option>
                                <option value="in_progress">In Progress</option>
                                <option value="resolved">Resolved</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Attachment (optional)</label>
                        <input type="file" id="image" @change="form.image = $event.target.files[0]"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
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
                <i class="fa fa-plus"></i> Create Ticket
            </button>
        </template>
    </DialogModal>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    show: Boolean,
    staff: Array,
});

const emit = defineEmits(['close']);

const form = useForm({
    name: '',
    phone: '',
    email: '',
    subject: '',
    description: '',
    attended_by: null,
    status: 'open',
    image: null,
});

const submitForm = () => {
    form.post(route('helpdesks.store'), {
        onSuccess: () => {
            form.reset();
            emit('close');
        },
    });
};

const close = () => {
    emit('close');
};
</script>