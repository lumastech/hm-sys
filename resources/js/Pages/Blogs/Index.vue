<template>
    <DashLayout>

        <Head title="Blogs" />
        <nav class="text-sm font-semibold mb-6" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center text-blue-500">
                    <a href="#" class="text-gray-700">Home</a>
                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path
                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>
                <li class="flex items-center">
                    <a href="#" class="text-gray-600">Blogs</a>
                </li>
            </ol>
        </nav>

        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <!-- Table and search header (similar to blog index) -->
                <!-- Modify columns to show blog-specific fields -->
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">#</th>
                            <th scope="col" class="px-6 py-3">Title</th>
                            <th scope="col" class="px-6 py-3">Author</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="blog in blogs.data" :key="blog.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                            <td class="px-6 py-4">{{ blog.id }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ blog.title }}
                            </td>
                            <td class="px-6 py-4">{{ blog.user?.name }}</td>
                            <td class="px-6 py-4">
                                <span :class="{
                                    'px-2 py-1 text-sm rounded-full': true,
                                    'bg-green-100 text-green-800': blog.status === 'active',
                                    'bg-red-100 text-red-800': blog.status === 'inactive',
                                }">
                                    {{ blog.status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <Link :href="route('blogs.show', blog.id)"
                                        class="text-blue-600 hover:text-blue-900">
                                    <i class="fa fa-eye"></i>
                                    </Link>
                                    <Link :href="route('blogs.edit', blog.id)"
                                        class="text-yellow-600 hover:text-yellow-900">
                                    <i class="fa fa-pen-to-square"></i>
                                    </Link>
                                    <button @click="deleteBlog(blog.id)" class="text-red-600 hover:text-red-900">
                                        <i class="fa fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="blogs.links" />
            </div>
        </div>
    </DashLayout>
</template>
<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})

import { ref, watch } from 'vue';
import { router, Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import DashLayout from '@/Layouts/DashLayout.vue';
import Create from './Create.vue';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    blogs: Object,
    filters: Object,
});

const createModal = ref(false);
const filters = ref(props.filters);
const deleteDialog = ref({
    show: false,
    id: null,
});

const deleteBlog = (id) => {
    deleteDialog.value.id = id;
    deleteDialog.value.show = true;
};

const confirmDelete = () => {
    router.delete(route('blogs.destroy', deleteDialog.value.id), {
        preserveScroll: true,
        onSuccess: () => {
            deleteDialog.value.show = false;
        },
    });
};

const closeModal = () => {
    deleteDialog.value.show = false;
    createModal.value = false;
};

// Watch for changes in filters and reload the page with new filters
watch(filters, (value) => {
    router.get('/blogs', { search: value.search }, { preserveState: true });
}, { deep: true });
</script>