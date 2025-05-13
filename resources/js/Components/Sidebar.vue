<template>
    <nav class="w-60 bg-primary-50 h-full overflow-y-auto fixed md:static z-50">
        <div class="navbar flex p-2 border-b border-primary-50">
            <img src="../../assets/images/logo.png" alt="sch" class="h-12">
        </div>
        <div class="nav p-4 text-secondary-800">
            <div class="flex mt-4 mb-2">
                <h1 class="font-bold flex-auto">Authorized Users</h1>
                <i class="fa fa-plus self-center"></i>
            </div>

            <Link href="/dashboard" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-chart-line text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Dashboard</span>
            </Link>

            <Link href="/announcements" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-bullhorn text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Announcements</span>
            </Link>
            <Link href="/hostels" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-building text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Hostels</span>
            </Link>


            <div class="flex mt-4 mb-2">
                <h1 class="font-bold flex-auto">Administrator</h1>
                <i class="fa fa-plus self-center"></i>
            </div>

            <Link href="/user" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-users text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Users</span>
            </Link>

            <Link href="/report" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-file text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Reports</span>
            </Link>
            <Link href="/issue" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-exclamation-circle text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Issues</span>
            </Link>
            <Link href="/help-desk" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-life-ring text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Help Desk</span>
            </Link>
            <Link href="/settings" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-cog text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Settings</span>
            </Link>

            <div class="flex mt-4 mb-2">
                <h1 class="font-bold flex-auto">Website</h1>
                <i class="fa fa-plus self-center"></i>
            </div>

            <Link href="/" class="flex py-1 px-2 rounded hover:bg-primary-200 bg-primary-100/50 my-1 transition-all">
            <div class="w-9">
                <i class="fa fa-globe text-xl mr-4 text-primary-900 drop-shadow-md"></i>
            </div>
            <span class="flex-auto">Home</span>
            </Link>
        </div>
    </nav>
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