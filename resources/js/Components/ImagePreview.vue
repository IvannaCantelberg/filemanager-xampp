<script setup>
defineProps({
    src: {
        type: String,
        required: true,
        default: ''
    },
    title: {
        type: String,
        default: 'Preview image'
    }
})
</script>

<template>
    <section>
        <input type="image" :src="src" :alt="title" @click="$event.preventDefault()">
    </section>
</template>

<style scoped>
    input[type='image']{
        width: 100%;
    }
</style>
