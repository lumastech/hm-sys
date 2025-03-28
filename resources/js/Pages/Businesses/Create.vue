<template>
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            <h1>New Business</h1>
        </template>
        <template #content>
            <div class="p-4 md:p-5 space-y-4">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input v-model="form.name" type="text" id="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select v-model="form.type" id="type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">Select Type</option>
                            <option value="retail">Retail</option>
                            <option value="service">Service</option>
                            <option value="manufacturing">Manufacturing</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select v-model="form.category" id="category" @change="updateSubcategories"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">Select Category</option>
                            <option v-for="category in categories" :key="category.id" :value="category.value">
                                {{ category.label }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="subcategory" class="block text-sm font-medium text-gray-700">Subcategory</label>
                        <select v-model="form.subcategory" id="subcategory"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            :disabled="!form.category || !filteredSubcategories.length">
                            <option value="">Select Subcategory</option>
                            <option v-for="subcategory in filteredSubcategories" :key="subcategory.id"
                                :value="subcategory.value">
                                {{ subcategory.label }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" id="description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                        <input type="file" id="logo" @change="handleLogoUpload" class="mt-1 block w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select v-model="form.status" id="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </form>
            </div>
        </template>
        <template #footer>
            <button @click="$emit('close')"
                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
            <button @click="submitForm"
                class="px-4 py-2 ms-3 bg-primary-600 text-white rounded-md hover:bg-primary-700">
                <i class="fa fa-plus"></i> Submit
            </button>
        </template>
    </DialogModal>
</template>

<script setup>
import { ref, computed } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import DialogModal from '@/Components/DialogModal.vue';

const props = defineProps({
    show: Boolean,
});

const emit = defineEmits(['close']);

// Sample category data - replace with your actual categories
const categories = ref([
    { id: 1, value: 'food', label: 'Food & Beverage' },
    { id: 2, value: 'fashion', label: 'Fashion & Apparel' },
    { id: 3, value: 'technology', label: 'Technology' },
    { id: 4, value: 'health', label: 'Health & Wellness' },
]);

// Sample subcategory data - replace with your actual subcategories
const allSubcategories = ref([
    { id: 1, category: 'food', value: 'restaurant', label: 'Restaurant' },
    { id: 2, category: 'food', value: 'cafe', label: 'Cafe' },
    { id: 3, category: 'food', value: 'bakery', label: 'Bakery' },
    { id: 4, category: 'fashion', value: 'clothing', label: 'Clothing' },
    { id: 5, category: 'fashion', value: 'footwear', label: 'Footwear' },
    { id: 6, category: 'fashion', value: 'accessories', label: 'Accessories' },
    { id: 7, category: 'technology', value: 'electronics', label: 'Electronics' },
    { id: 8, category: 'technology', value: 'software', label: 'Software' },
    { id: 9, category: 'health', value: 'fitness', label: 'Fitness' },
    { id: 10, category: 'health', value: 'pharmacy', label: 'Pharmacy' },
]);

// Compute filtered subcategories based on selected category
const filteredSubcategories = computed(() => {
    if (!form.category) return [];
    return allSubcategories.value.filter(sub => sub.category === form.category);
});

// Reset subcategory when category changes
const updateSubcategories = () => {
    form.subcategory = '';
};

const form = useForm({
    user_id: '',
    contact_id: '',
    name: '',
    type: '',
    category: '',
    subcategory: '',
    description: '',
    logo: null,
    image_id: null,
    status: 'active',
});

const handleLogoUpload = (event) => {
    form.logo = event.target.files[0];
};

const submitForm = () => {
    form.post('/business', {
        onSuccess: () => {
            props.show = false;
            form.reset();
            emit('close');
        },
    });
};
</script>