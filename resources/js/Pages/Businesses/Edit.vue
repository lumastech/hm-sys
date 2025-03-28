<template v-if="props.show">
    <DialogModal :show="props.show" :closeable="true" @close="props.show = false">
        <template #title>
            Edit Business
        </template>
        <template #content>
            <form @submit.prevent="submitForm">
                <div class="p-4 md:p-5 space-y-4">
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
                        <div v-if="props.business?.logo" class="mt-2">
                            <span class="text-sm text-gray-500">Current logo: {{ props.business.logo }}</span>
                        </div>
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
import { ref, computed, watch } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import DialogModal from '@/Components/DialogModal.vue';

// Sample category data - should match your create component
const categories = ref([
    { id: 1, value: 'food', label: 'Food & Beverage' },
    { id: 2, value: 'fashion', label: 'Fashion & Apparel' },
    { id: 3, value: 'technology', label: 'Technology' },
    { id: 4, value: 'health', label: 'Health & Wellness' },
]);

// Sample subcategory data - should match your create component
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

const props = defineProps({
    show: Boolean,
    business: {
        type: Object,
        default: () => ({}),
    },
});

const emit = defineEmits(['close']);

const form = useForm({
    user_id: props.business?.user_id || '',
    contact_id: props.business?.contact_id || '',
    name: props.business?.name || '',
    type: props.business?.type || '',
    category: props.business?.category || '',
    subcategory: props.business?.subcategory || '',
    description: props.business?.description || '',
    logo: null,
    image_id: props.business?.image_id || null,
    status: props.business?.status || 'active',
});

const handleLogoUpload = (event) => {
    form.logo = event.target.files[0];
};

watch(
    () => props.business,
    (newBusiness) => {
        if (newBusiness) {
            form.name = newBusiness.name || '';
            form.type = newBusiness.type || '';
            form.category = newBusiness.category || '';
            form.subcategory = newBusiness.subcategory || '';
            form.description = newBusiness.description || '';
            form.status = newBusiness.status || 'active';
            form.image_id = newBusiness.image_id || null;
        }
    },
    { immediate: true }
);

const submitForm = () => {
    form.put(`/business/${props.business.id}`, {
        preserveScroll: true,
        onSuccess: () => {
            props.show = false;
            emit('close');
        },
    });
};
</script>