<template>
    <div class="navbar flex p-2 border-b border-primary-50">
        <div class="rounded-full w-10 h-10 bg-secondary-200 border-2 border-primary-300"></div>
        <p class="self-center ml-4 font-bold text-secondary-800">User Name</p>
    </div>
    <div class="nav p-4 text-secondary-800">
        <Link href="/users" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-users text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Users</span>
        </Link>
        <Link href="/announcements" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-bullhorn text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Announcements</span>
        </Link>
        <Link href="/businesses" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-building text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Businesses</span>
        </Link>
        <Link href="/services-products" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-cubes text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Services/Products</span>
        </Link>
        <Link href="/connections" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-link text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Connections</span>
        </Link>
        <Link href="/projects" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-tasks text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Projects</span>
        </Link>
        <Link href="/events" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-calendar text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Events</span>
        </Link>
        <Link href="/forum" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-comments text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Forum</span>
        </Link>
        <Link href="/research" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-search text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Research</span>
        </Link>
        <Link href="/blogs" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="far fa-edit text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Blogs</span>
        </Link>
        <Link href="/reports" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-file text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Reports</span>
        </Link>
        <Link href="/issues" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-exclamation-circle text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Issues</span>
        </Link>
        <Link href="/help-desk" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-life-ring text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Help Desk</span>
        </Link>
        <Link href="/settings" class="flex py-1 px-2 rounded-md hover:bg-primary-200 transition-all">
            <div class="w-9">
                <i class="fa fa-cog text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Settings</span>
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';


export default {
    name: 'Sidebar',
    components: {
        Link
    },
    computed: {
    }
}
</script>