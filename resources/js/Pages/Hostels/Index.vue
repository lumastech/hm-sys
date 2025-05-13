<template>
    <Dashboard>

        <Head title="Hostels" />
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
                    <a href="#" class="text-gray-600">Hostels</a>
                </li>
            </ol>
        </nav>

        <div class="sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <div class="col-span-1 md:col-span-4">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <!-- Action Bar -->
                        <div class="flex justify-between items-center p-4 bg-white dark:bg-gray-900">
                            <input v-model="filters.search" type="text" placeholder="Search for hostels"
                                class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                            <button @click="createModal = true"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700">
                                <i class="fa fa-plus"></i> New Hostel
                            </button>
                        </div>

                        <!-- Table -->
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3">Name</th>
                                    <th class="px-6 py-3">Address</th>
                                    <th class="px-6 py-3">Vendor</th>
                                    <th class="px-6 py-3">Rooms</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="hostel in hostels.data" :key="hostel.id" @click="handleShow(hostel)"
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer">
                                    <td class="px-6 py-4">{{ hostel.name }}</td>
                                    <td class="px-6 py-4">{{ hostel.address }}</td>
                                    <td class="px-6 py-4">{{ hostel.vendor?.name }}</td>
                                    <td class="px-6 py-4">{{ hostel.rooms?.length || 0 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <button @click="handleEdit(hostel)" class="text-blue-600"><i
                                                    class="fa fa-pen-to-square"></i></button>
                                            <button @click="confirmDelete(hostel.id)" class="text-red-600"><i
                                                    class="fa fa-trash-can"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="mt-4">
                            <Pagination :links="hostels.links" />
                        </div>
                    </div>
                </div>
                <div class="">
                    <Show :hostel="showModal.item" v-if="showModal.show" />
                </div>
            </div>
        </div>

        <!-- Dialogs -->
        <DialogModal :show="deleteDialog.show" @close="closeModal">
            <template #title>Delete Hostel</template>
            <template #content>Are you sure you want to delete this hostel?</template>
            <template #footer>
                <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <Link @click="closeModal" :href="route('hostels.destroy', deleteDialog.id)" method="delete" as="button"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Confirm
                </Link>
            </template>
        </DialogModal>

        <Create :show="createModal" @close="closeModal" />

        <Edit :show="editModal.show" @close="closeModal" :hostel="editModal.item" />
    </Dashboard>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import { router, Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import Dashboard from '@/Layouts/Dashboard.vue';
import Create from './Create.vue';
import Edit from './Edit.vue';
import Show from './Show.vue';
import DialogModal from '@/Components/DialogModal.vue';
import { initFlowbite } from 'flowbite';

onMounted(() => {
    initFlowbite();
});

const props = defineProps({
    hostels: Object,
    filters: Object,
    venodrs: Object,
});

const filters = ref(props.filters);
const createModal = ref(false);
const editModal = ref({ show: false, item: {} });
const showModal = ref({ show: false, item: {} });
const deleteDialog = ref({ show: false, id: null });

const handleEdit = (hostel) => {
    editModal.value.item = { ...hostel };
    editModal.value.show = true;
};

const handleShow = (hostel) => {
    showModal.value.item = { ...hostel };
    if (hostel.id) {
        showModal.value.show = true;
    }
};

const confirmDelete = (id) => {
    deleteDialog.value.id = id;
    deleteDialog.value.show = true;
};

const closeModal = () => {
    createModal.value = false;
    editModal.value.show = false;
    deleteDialog.value.show = false;
};

watch(filters, (value) => {
    router.get('/hostels', { search: value.search }, { preserveState: true });
}, { deep: true });
</script>
