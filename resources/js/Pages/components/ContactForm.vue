<template>
    <div>
        <Card>
            <template #title>Send us an Email</template>
            <template #content>
                <form action="" @submit.prevent="sendMsg">
                    <TextInput name="name" type="text" placeholder="Enter your name" v-model="form.name" />
                    <p v-if="form.errors.name" class="text-red-500 text-sm"></p>
                    <TextInput type="email" placeholder="Enter your email" v-model="form.email" />
                    <p v-if="form.errors.email" class="text-red-500 text-sm"></p>
                    <Textarea class="w-full" v-model="form.msg" placeholder="Write your queries here" rows="5"
                        cols="10" />
                    <p v-if="form.errors.msg" class="text-red-500 text-sm"></p>
                    <div class="flex items-center justify-between mt-2">
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                        <Button type="submit" :disabled="form.processing">Send Now</Button>
                    </div>
                </form>
            </template>
        </Card>
    </div>
</template>

<script setup>
import Card from 'primevue/card';
import Button from 'primevue/button';
import TextInput from './TextInput.vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    showSpinner: false
})

const form = useForm({
    name: null,
    email: null,
    msg: null
});



function sendMsg() {
    
}

</script>