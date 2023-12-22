<script setup>
    defineProps({
        post: {
            required: true,
            default: {
                title: '',
                description: '',
                imageUrl: '',
                createdAt: new Date()
            }
        }
    })

</script>

<template>
    <div>{{ post.title }}</div>
    <div>{{ post.description }}</div>
    <img :src="post.imageUrl"/>
    <time>{{ post.createdAt }}</time>
</template>
