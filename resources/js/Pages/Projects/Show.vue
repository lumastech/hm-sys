<template>
    <DashLayout>

        <Head :title="project.name" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ project.name }}</h1>
                        <p class="text-gray-600">{{ project.business?.name }}</p>
                    </div>
                    <span :class="{
                        'px-3 py-1 text-sm rounded-full capitalize': true,
                        'bg-blue-100 text-blue-800': project.status === 'planning',
                        'bg-yellow-100 text-yellow-800': project.status === 'in_progress',
                        'bg-green-100 text-green-800': project.status === 'completed',
                        'bg-gray-100 text-gray-800': project.status === 'on_hold',
                    }">
                        {{ project.status.replace('_', ' ') }}
                    </span>
                </div>

                <div v-if="project.image" class="mb-6">
                    <img :src="`/storage/${project.image}`" :alt="project.name"
                        class="w-full h-64 object-cover rounded-lg">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Project Details</h2>
                        <div class="space-y-2">
                            <p><strong>Category:</strong> {{ project.category }}</p>
                            <p><strong>Created By:</strong> {{ project.user?.name }}</p>
                            <p><strong>Collaborators:</strong> {{ project.collaborations?.length || 0 }}</p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-lg font-medium text-gray-900 mb-2">Timeline</h2>
                        <div class="space-y-2">
                            <p><strong>Created:</strong> {{ formatDate(project.created_at) }}</p>
                            <p><strong>Last Updated:</strong> {{ formatDate(project.updated_at) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Description</h2>
                    <div class="prose max-w-none" v-html="project.description"></div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <Link :href="route('projects.edit', project.id)"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit Project
                    </Link>
                    <Link :href="route('projects.index')"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Back to Projects
                    </Link>
                </div>
            </div>
        </div>
    </DashLayout>
</template>

<script setup>
import { format } from 'date-fns';

defineProps({
    project: Object
});

const formatDate = (dateString) => {
    return format(new Date(dateString), 'MMM d, yyyy h:mm a');
};
</script>