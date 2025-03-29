<template>
    <DashLayout>
        <!-- breadcrumb -->

        <Head title="Research" />
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
                    <a href="#" class="text-gray-600">Research</a>
                </li>
            </ol>
        </nav>
        <div class="max-w-7xl sm:px-6 lg:px-8">

            <!-- Research Table -->
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
                        <button @click="createModal = true"
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
                        <input v-model="filters.search" type="text" id="table-search-research"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for research" />
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
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Visibility</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="research in researches.data" :key="research.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input :id="`checkbox-table-search-${research.id}`" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label :for="`checkbox-table-search-${research.id}`"
                                        class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ research.category }}</td>
                            <td class="px-6 py-4">{{ research.description }}</td>
                            <td class="px-6 py-4">
                                <span :class="{
                                    'px-2 py-1 text-sm rounded-full': true,
                                    'bg-green-100 text-green-800': research.visibility === 'public',
                                    'bg-yellow-100 text-yellow-800': research.visibility === 'private',
                                }">
                                    {{ research.visibility }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span :class="{
                                    'px-2 py-1 text-sm rounded-full': true,
                                    'bg-green-100 text-green-800': research.status === 'active',
                                    'bg-red-100 text-red-800': research.status === 'inactive',
                                }">
                                    {{ research.status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 min-w-[100px]">
                                <div class="flex space-x-2">
                                    <button @click="handleEdit(research)" type="button"
                                        class="font-medium text-blue-600 dark:text-blue-500"><i
                                            class="fa fa-pen-to-square"></i></button>
                                    <button @click="deleteResearch(research.id)"
                                        class="font-medium text-red-600 dark:text-red-500"><i
                                            class="fa fa-trash-can"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    <Pagination :links="researches.links" />
                </div>
            </div>

            <!-- Main modal -->

        </div>
    </DashLayout>

    <DialogModal :show="deleteDialog.show" @close="closeModal">
        <template #title>
            Delete Research
        </template>
        <template #content>
            Are you sure?
            This action is not reversible!
        </template>
        <template #footer>
            <button @click="deleteDialog.show = false"
                class="font-medium mr-2 text-white bg-gray-500 px-2 py-1 rounded hover:bg-gray-700 transition dark:text-blue-500">Cancel</button>
            <Link @click="closeModal" :href="route('researches.destroy', deleteDialog.id)" method="delete" as="button"
                class="font-medium text-white bg-red-500 px-2 py-1 rounded hover:bg-red-700 transition dark:text-blue-500">
            <i class="fa fa-trash-can self-center"></i> Confirm
            </Link>
        </template>

    </DialogModal>
    <Create :show="createModal" @close="closeModal" />
    <Edit :show="editModal.show" @close="closeModal" :research="editModal.item" />

</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
import { ref, watch, computed } from 'vue';
import { router, Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import DashLayout from '@/Layouts/DashLayout.vue';
import Create from './Create.vue';
import Edit from './Edit.vue';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    researches: Object,
    filters: Object,
});

const createModal = ref(false);

const filters = ref(props.filters);
const deleteDialog = ref({
    show: false,
    id: null,
});

const editModal = ref({
    show: false,
    item: {
        category: '',
        description: '',
        visibility: 'public',
        status: 'active',
    },
});

const handleEdit = (research) => {
    editModal.value.item = { ...research };
    editModal.value.show = true;
};

const closeModal = () => {
    deleteDialog.value.show = false;
    editModal.value.show = false;
    createModal.value = false;
};

// delete research
const deleteResearch = (id) => {
    deleteDialog.value.id = id;
    deleteDialog.value.show = true;
};

// Watch for changes in filters and reload the page with new filters
watch(filters, (value) => {
    router.get('/researches', { search: value.search }, { preserveState: true });
}, { deep: true });
</script>