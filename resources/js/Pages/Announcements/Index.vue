<template>
    <DashLayout>
        <!-- breadcrumb -->

        <Head title="Announcements" />
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
                    <a href="#" class="text-gray-600">Users</a>
                </li>
            </ol>
        </nav>
        <div class="max-w-7xl sm:px-6 lg:px-8">

            <!-- Users Table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex space-x-2 flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                    <div class="flex-auto">
                        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button">
                            <span class="sr-only">Action button</span>
                            Action
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownAction"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownActionButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark
                                        as Important</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </div>
                        </div>
                    </div>
                    <div class="self-center space-x-2">
                        <!-- Modal toggle -->
                        <button data-modal-target="create-announcement" data-modal-toggle="create-announcement"
                            class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="button">
                            <i class="fa fa-plus"></i> New
                        </button>
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input v-model="filters.search" type="text" id="table-search-announcements"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for announcements" />
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">Title</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Importance</th>
                            <th scope="col" class="px-6 py-3">Start Date</th>
                            <th scope="col" class="px-6 py-3">End Date</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="announcement in announcements.data" :key="announcement.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input :id="`checkbox-table-search-${announcement.id}`" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label :for="`checkbox-table-search-${announcement.id}`"
                                        class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ announcement.title }}</td>
                            <td class="px-6 py-4">{{ announcement.description }}</td>
                            <td class="px-6 py-4">
                                <span :class="{
                                    'px-2 py-1 text-sm rounded-full': true,
                                    'bg-green-100 text-green-800': announcement.importance === 'high',
                                    'bg-yellow-100 text-yellow-800': announcement.importance === 'medium',
                                    'bg-red-100 text-red-800': announcement.importance === 'low',
                                }">
                                    {{ announcement.importance }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ announcement.start_date }}</td>
                            <td class="px-6 py-4">{{ announcement.end_date }}</td>
                            <td class="px-6 py-4">
                                <span :class="{
                                    'px-2 py-1 text-sm rounded-full': true,
                                    'bg-green-100 text-green-800': announcement.status === 'active',
                                    'bg-red-100 text-red-800': announcement.status === 'inactive',
                                }">
                                    {{ announcement.status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 min-w-[100px]">
                                <div class="flex space-x-2">
                                    <button @click="handleEdit(announcement)" data-modal-target="edit-modal"
                                        data-modal-toggle="edit-modal" type="button"
                                        class="font-medium text-blue-600 dark:text-blue-500"><i
                                            class="fa fa-pen-to-square"></i></button>
                                    <Link :href="route('announcements.destroy', announcement.id)" method="delete" as="button"
                                        class="font-medium text-blue-600 dark:text-blue-500"><i
                                        class="fa fa-trash-can self-center"></i></Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    <Pagination :links="announcements.links" />
                </div>
            </div>

            <!-- Main modal -->

        </div>
    </DashLayout>
    <Create />
    <form @submit.prevent="submitForm">
        <!-- Main modal -->
        <div id="edit-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Static modal
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="edit-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <h1 class="text-2xl font-semibold mb-4">Edit Announcement</h1>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input v-model="form.title" type="text" id="title"
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
                            <label for="importance" class="block text-sm font-medium text-gray-700">Importance</label>
                            <select v-model="form.importance" id="importance"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start
                                Date</label>
                            <input v-model="form.start_date" type="date" id="start_date"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input v-model="form.end_date" type="date" id="end_date"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
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
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="edit-modal" type="submit"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <i class="fa fa-check"></i>
                            Save</button>
                        <button data-modal-hide="edit-modal" type="submit"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
import Edit from './Edit.vue';

const props = defineProps({
    announcements: Object,
    filters: Object,
});

const filters = ref(props.filters);
const anc = ref(null);
const ancEdit = ref(true);
const form = ref({
    title: null,
    description: null,
    image: null,
    importance: null,
    start_date: null,
    end_date: null,
    status: null,
});

const handleEdit = (announcement) => {
    form.value.title = announcement.title ?? '',
    form.value.description = announcement.description ?? '',
    form.value.image = null,
    form.value.importance = announcement.importance ?? '',
    form.value.start_date = announcement.start_date ?? '',
    form.value.end_date = announcement.end_date ?? '',
    form.value.status = announcement.status ?? '',
    anc.value = announcement;
    ancEdit.value = true;
};

const handleImageUpload = (event) => {
    form.value.image = event.target.files[0];
};

const submitForm = () => {
    router.post(`/announcements/${anc.value.id}`, {
        _method: 'PUT',
        ...form.value,
    }, {
        forceFormData: true,
    });
};

// Watch for changes in filters and reload the page with new filters
watch(filters, (value) => {
    router.get('/announcements', { search: value.search }, { preserveState: true });
}, { deep: true });
</script>