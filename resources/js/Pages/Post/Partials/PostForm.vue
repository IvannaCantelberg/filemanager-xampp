<script setup>

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextAreaInput from '@/Components/TextAreaInput.vue';
import ImageUpload from '@/Components/ImageUpload.vue';
import ImagePreview from '@/Components/ImagePreview.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const imageUrl = ref('');

const form = useForm({
    title: '',
    description: '',
    imageUrl: ''
});



const savePost = () => {

    // form.imageUrl = imageUrl.value;
    form.post(route('post.store'), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: () => {
            form.reset();

        },
    });


}

const onImageUpload = (url) => {
    imageUrl.value = URL.createObjectURL(url);
    // formImage.imageUrl = url;
    form.imageUrl = url;
}

</script>

<template>
    <form @submit.prevent="savePost" class="mt-6 space-y-6">
            <div>
                <InputLabel for="title" value="Title" />
                <TextInput
                    id="title"
                    ref="currentPasswordInput"
                    v-model="form.title"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="title"
                />
                <InputError :message="form.errors.title" class="mt-2" />
            </div>

            <div>
                <InputLabel for="description" value="Description" />
                <TextAreaInput
                    id="description"
                    ref="currentPasswordInput"
                    v-model="form.description"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="description"
                />
                <InputError :message="form.errors.description" class="mt-2" />
            </div>

            <div>
                <ImageUpload @upload="onImageUpload($event)" class="mt-1 block w-full"/>
                <ImagePreview :src="imageUrl" class="mt-1 block w-28"/>
            </div>



            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
</template>
