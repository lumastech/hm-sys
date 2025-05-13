<template>
    <Dashboard>

        <Head :title="forum.title" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
            <div v-if="forum.image" class="h-64 w-full overflow-hidden">
                <img :src="`/storage/${forum.image}`" :alt="forum.title" class="w-full h-full object-cover">
            </div>

            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ forum.title }}</h1>
                        <div class="flex items-center space-x-2 mt-1">
                            <span class="text-sm text-gray-600">{{ forum.type }}</span>
                            <span class="text-sm text-gray-500">•</span>
                            <span class="text-sm text-gray-600">{{ forum.category }}</span>
                        </div>
                    </div>
                    <span :class="{
                        'px-3 py-1 text-sm rounded-full': true,
                        'bg-green-100 text-green-800': forum.status === 'active',
                        'bg-red-100 text-red-800': forum.status === 'inactive',
                    }">
                        {{ forum.status }}
                    </span>
                </div>

                <div class="mb-6">
                    <div class="prose max-w-none" v-html="forum.description"></div>
                </div>

                <div v-if="forum.business" class="mb-6">
                    <h2 class="text-lg font-medium text-gray-900 mb-2">Associated Business</h2>
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <img v-if="forum.business.logo" :src="`/storage/${forum.business.logo}`"
                                class="h-10 w-10 rounded-full" :alt="forum.business.name">
                            <div v-else class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fa fa-building text-gray-400"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ forum.business.name }}</p>
                            <p class="text-sm text-gray-500">Business</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <Link :href="route('forums.edit', forum.id)"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit Forum
                    </Link>
                    <Link :href="route('forums.index')"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Back to Forums
                    </Link>
                </div>
            </div>
        </div>
    </Dashboard>
</template>

<script setup>
defineProps({
    forum: Object
});
</script>