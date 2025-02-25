<template>
    <div class="nav p-4">
        <Link href="users" class="flex">
            <i class="fa fa-users  text-xl mr-4"></i>
            <span class="flex-auto">USERS</span>
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