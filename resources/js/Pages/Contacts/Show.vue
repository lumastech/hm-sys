<template>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-semibold mb-6">{{ contact.name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-lg font-medium text-gray-900 mb-3">Contact Information</h2>
                <div class="space-y-2">
                    <p><strong class="text-gray-700">Priority:</strong>
                        <span class="capitalize">{{ contact.priority }}</span>
                    </p>
                    <p><strong class="text-gray-700">Primary Phone:</strong> {{ contact.phone }}</p>
                    <p v-if="contact.phone_2"><strong class="text-gray-700">Secondary Phone:</strong> {{ contact.phone_2
                        }}</p>
                    <p v-if="contact.email"><strong class="text-gray-700">Email:</strong> {{ contact.email }}</p>
                </div>
            </div>

            <div>
                <h2 class="text-lg font-medium text-gray-900 mb-3">Address Information</h2>
                <div class="space-y-2">
                    <p v-if="contact.address"><strong class="text-gray-700">Address:</strong> {{ contact.address }}</p>
                    <div class="grid grid-cols-2 gap-2">
                        <p v-if="contact.city"><strong class="text-gray-700">City:</strong> {{ contact.city }}</p>
                        <p v-if="contact.district"><strong class="text-gray-700">District:</strong> {{ contact.district
                            }}</p>
                        <p v-if="contact.province"><strong class="text-gray-700">Province:</strong> {{ contact.province
                            }}</p>
                        <p v-if="contact.country"><strong class="text-gray-700">Country:</strong> {{ contact.country }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
            <Link :href="`/contacts/${contact.id}/edit`"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
            Edit Contact
            </Link>
            <Link :href="'/contacts'"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
            Back to Contacts
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    contact: {
        type: Object,
        required: true
    },
});
</script>

<style scoped>
strong {
    min-width: 120px;
    display: inline-block;
}
</style>