<script setup>

const emit = defineEmits(['upload'])

const onFileUpload = (event) => {
    event.stopPropagation();
    event.preventDefault();

    const outputUrl = URL.createObjectURL(event.target.files[0]);

    emit('upload', outputUrl);

}

</script>


<template>
   <section>
     <input
        @change="onFileUpload($event)"
        class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
        type="file"
        accept="image/jpeg, image/png, image/jpg">
   </section>
</template>
