<template>
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            Edit Announcement
        </template>
        <template #content>
            <form @submit.prevent="submitForm">
                <div class="p-4 md:p-5 space-y-4">
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
            </form>
        </template>
        <template #footer>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button @click="submitForm" type="submit"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <i class="fa fa-check"></i>
                    Save</button>
                <button @click="$emit('close')" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            </div>
        </template>
    </DialogModal>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import DialogModal from '@/Components/DialogModal.vue';



const props = defineProps({
    announcement: Object,
    show: Boolean,
});
const form = ref({
    title: props.announcement.title,
    description: props.announcement.description,
    image: null,
    importance: props.announcement.importance,
    start_date: props.announcement.start_date,
    end_date: props.announcement.end_date,
    status: props.announcement.status,
});

const handleImageUpload = (event) => {
    form.value.image = event.target.files[0];
};

const submitForm = () => {
    router.post(`/announcements/${announcement.id}`, {
        _method: 'PUT',
        ...form.value,
    }, {
        forceFormData: true,
    }).then(() => {
        props.show = false;
    });
};

// on mounted fill the form with the data
// onMounted(() => {
//     form.value.title = this.announcement.title;
//     form.value.description = this.announcement.description;
//     form.value.importance = this.announcement.importance;
//     form.value.start_date = this.announcement.start_date;
//     form.value.end_date = this.announcement.end_date;
//     form.value.status = this.announcement.status;
// });

</script>