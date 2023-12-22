<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PostCard from '@/Pages/Post/Partials/PostCard.vue';
import { Head, Link } from '@inertiajs/vue3';


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link
                v-if="$page.props.auth.user"
                :href="route('post.index')"
                class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-lg text-white"
                >Create Post</Link>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    <PostCard :post="post" v-for="post in $attrs.posts.data" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
