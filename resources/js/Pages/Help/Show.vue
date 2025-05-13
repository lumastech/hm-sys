<template>
    <Dashboard>

        <Head :title="helpdesk.subject" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ helpdesk.subject }}</h1>
                        <p class="text-gray-600">Ticket #{{ helpdesk.id }}</p>
                    </div>
                    <span :class="{
                        'px-3 py-1 text-sm rounded-full capitalize': true,
                        'bg-blue-100 text-blue-800': helpdesk.status === 'open',
                        'bg-yellow-100 text-yellow-800': helpdesk.status === 'in_progress',
                        'bg-green-100 text-green-800': helpdesk.status === 'resolved',
                    }">
                        {{ helpdesk.status.replace('_', ' ') }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Requester Information</h2>
                        <div class="space-y-2">
                            <p><strong>Name:</strong> {{ helpdesk.name }}</p>
                            <p><strong>Phone:</strong> {{ helpdesk.phone }}</p>
                            <p v-if="helpdesk.email"><strong>Email:</strong> {{ helpdesk.email }}</p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Ticket Details</h2>
                        <div class="space-y-2">
                            <p><strong>Assigned To:</strong> {{ helpdesk.attended_by?.name || 'Unassigned' }}</p>
                            <p><strong>Created:</strong> {{ formatDate(helpdesk.created_at) }}</p>
                            <p><strong>Last Updated:</strong> {{ formatDate(helpdesk.updated_at) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Description</h2>
                    <div class="prose max-w-none bg-gray-50 p-4 rounded" v-html="helpdesk.description"></div>
                </div>

                <div v-if="helpdesk.image" class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Attachment</h2>
                    <img :src="`/storage/${helpdesk.image}`" :alt="helpdesk.subject"
                        class="max-w-full h-auto rounded border">
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <Link :href="route('helpdesks.edit', helpdesk.id)"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit Ticket
                    </Link>
                    <Link :href="route('helpdesks.index')"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Back to Tickets
                    </Link>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<script setup>
import { format } from 'date-fns';

defineProps({
    helpdesk: Object
});

const formatDate = (dateString) => {
    return format(new Date(dateString), 'MMM d, yyyy h:mm a');
};
</script>