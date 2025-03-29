<template>
    <DashLayout>

        <Head :title="event.title" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <div v-if="event.image" class="h-64 w-full overflow-hidden">
                <img :src="`/storage/${event.image}`" :alt="event.title" class="w-full h-full object-cover">
            </div>

            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ event.title }}</h1>
                        <p class="text-gray-600">{{ event.category }}</p>
                    </div>
                    <span :class="{
                        'px-3 py-1 text-sm rounded-full': true,
                        'bg-green-100 text-green-800': event.status === 'active',
                        'bg-red-100 text-red-800': event.status === 'inactive',
                    }">
                        {{ event.status }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Event Details</h2>
                        <div class="space-y-2">
                            <p><strong>Start:</strong> {{ formatDateTime(event.start_date) }}</p>
                            <p v-if="event.end_date"><strong>End:</strong> {{ formatDateTime(event.end_date) }}</p>
                            <p><strong>Access:</strong> {{ event.access }}</p>
                            <p><strong>Price:</strong> {{ event.price ? `$${event.price}` : 'Free' }}</p>
                        </div>
                    </div>

                    <div v-if="event.business">
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Hosted By</h2>
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <img v-if="event.business.logo" :src="`/storage/${event.business.logo}`"
                                    class="h-10 w-10 rounded-full" :alt="event.business.name">
                                <div v-else class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                    <i class="fa fa-building text-gray-400"></i>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ event.business.name }}</p>
                                <p class="text-sm text-gray-500">Business</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Description</h2>
                    <div class="prose max-w-none" v-html="event.description"></div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <Link :href="route('events.edit', event.id)"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit Event
                    </Link>
                    <Link :href="route('events.index')"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Back to Events
                    </Link>
                </div>
            </div>
        </div>
    </DashLayout>
</template>

<script setup>
import { format } from 'date-fns';

defineProps({
    event: Object
});

const formatDateTime = (dateString) => {
    const date = new Date(dateString);
    return format(date, 'MMM d, yyyy h:mm a');
};
</script>