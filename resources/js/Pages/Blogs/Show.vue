<template>
    <DashLayout>

        <Head :title="blog.title" />

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold mb-4">{{ blog.title }}</h1>

            <div v-if="blog.image" class="mb-6">
                <img :src="`/storage/${blog.image}`" :alt="blog.title" class="w-full rounded-lg">
            </div>

            <div class="prose max-w-none mb-6" v-html="blog.description"></div>

            <div v-if="blog.video" class="mb-6">
                <div class="aspect-w-16 aspect-h-9">
                    <iframe :src="blog.video" class="w-full h-96" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="flex justify-between items-center mt-6 pt-6 border-t border-gray-200">
                <div>
                    <span class="text-sm text-gray-600">Posted by: {{ blog.user.name }}</span>
                </div>
                <div class="flex space-x-4">
                    <Link :href="route('blogs.edit', blog.id)"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Edit
                    </Link>
                    <Link :href="route('blogs.index')"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                    Back to Blogs
                    </Link>
                </div>
            </div>
        </div>
    </DashLayout>
</template>

<script setup>
defineProps({
    blog: Object
});
</script>