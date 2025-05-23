<template>
    <Dashboard>

        <Head title="Helpdesk Tickets" />
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
                    <a href="#" class="text-gray-600">Helpdesk</a>
                </li>
            </ol>
        </nav>

        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="flex space-x-2 flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                    <div class="self-center space-x-2">
                        <button @click="createModal = true"
                            class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="button">
                            <i class="fa fa-plus"></i> New Ticket
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
                        <input v-model="filters.search" type="text" id="table-search-helpdesks"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search tickets..." />
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Ticket ID</th>
                            <th scope="col" class="px-6 py-3">Subject</th>
                            <th scope="col" class="px-6 py-3">Requester</th>
                            <th scope="col" class="px-6 py-3">Contact</th>
                            <th scope="col" class="px-6 py-3">Assigned To</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="ticket in helpdesks.data" :key="ticket.id"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                #{{ ticket.id }}
                            </td>
                            <td class="px-6 py-4">{{ ticket.subject }}</td>
                            <td class="px-6 py-4">{{ ticket.name }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span>{{ ticket.phone }}</span>
                                    <span v-if="ticket.email" class="text-xs text-gray-500">{{ ticket.email }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{ ticket.attended_by?.name || 'Unassigned' }}
                            </td>
                            <td class="px-6 py-4">
                                <span :class="{
                                    'px-2 py-1 text-sm rounded-full capitalize': true,
                                    'bg-blue-100 text-blue-800': ticket.status === 'open',
                                    'bg-yellow-100 text-yellow-800': ticket.status === 'in_progress',
                                    'bg-green-100 text-green-800': ticket.status === 'resolved',
                                }">
                                    {{ ticket.status.replace('_', ' ') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <Link :href="route('helpdesks.show', ticket.id)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class="fa fa-eye"></i>
                                    </Link>
                                    <Link :href="route('helpdesks.edit', ticket.id)"
                                        class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">
                                    <i class="fa fa-pen-to-square"></i>
                                    </Link>
                                    <button @click="deleteTicket(ticket.id)"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <i class="fa fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :links="helpdesks.links" />
            </div>
        </div>

        <DialogModal :show="deleteDialog.show" @close="closeModal">
            <template #title>
                Delete Helpdesk Ticket
            </template>
            <template #content>
                Are you sure you want to delete this ticket?
                This action cannot be undone.
            </template>
            <template #footer>
                <button @click="deleteDialog.show = false"
                    class="font-medium mr-2 text-white bg-gray-500 px-4 py-2 rounded hover:bg-gray-700 transition">
                    Cancel
                </button>
                <button @click="confirmDelete"
                    class="font-medium text-white bg-red-500 px-4 py-2 rounded hover:bg-red-700 transition">
                    <i class="fa fa-trash-can self-center"></i> Confirm Delete
                </button>
            </template>
        </DialogModal>

        <Create :show="createModal" @close="closeModal" :staff="staff" />
    </Dashboard>
</template>

<script setup>
import { ref, watch } from 'vue';
import { router, Head, Link } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';
import Dashboard from '@/Layouts/Dashboard.vue';
import Create from './Create.vue';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    helpdesks: Object,
    filters: Object,
    staff: Array,
});

const createModal = ref(false);
const filters = ref(props.filters);
const deleteDialog = ref({
    show: false,
    id: null,
});

const deleteTicket = (id) => {
    deleteDialog.value.id = id;
    deleteDialog.value.show = true;
};

const confirmDelete = () => {
    router.delete(route('helpdesks.destroy', deleteDialog.value.id), {
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

watch(filters, (value) => {
    router.get('/helpdesks', { search: value.search }, { preserveState: true });
}, { deep: true });
</script>