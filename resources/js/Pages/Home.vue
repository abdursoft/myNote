<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import HomeLayout from "./layouts/HomeLayout.vue";
import Button from "primevue/button";
import Skeleton from "./components/Skeleton.vue";
import ScrollPanel from "primevue/scrollpanel";
import MyInput from "./components/MyInput.vue";
import Editor from "primevue/editor";
import { route } from "../../../vendor/tightenco/ziggy/src/js";
import { useToast } from "primevue/usetoast";

const form = useForm({
    title: null,
    text: null,
    success: null
})
const toast = useToast();

const showError = (msg) => {
    toast.add({ severity: 'error', summary: 'Error Message', detail: msg, life: 3000 });
};

function submitNote() {
    form.post(route('new-note'),{
        onSuccess: (e) => {
            console.log(e);
            toast.add({ severity: 'success', summary: 'Success Message', detail: "Note successfully saved", life: 3000 });
        }
    });
}

</script>

<template>

    <Head title="Dashboard" />
    <HomeLayout>
        <div class="md:flex justify-between sm:justify-start sm:flex-1 sm:flex-row-reverse w-full">
            <div class="w-full md:w-30 lg:w-1/4 overflow-y">
                <ScrollPanel class="w-full h-screen">
                    <Skeleton />
                </ScrollPanel>
            </div>
            <div class="w-full md:w-70 lg:w-3/4 py-4 pr-4">
                <div v-show="$page.props.flash.message" class="bg-green-500 text-white flex items-center justify-center rounded p-1">
                    <p class="text-center p-3">{{ $page.props.flash.message }}</p>
                </div>
                <form @submit.prevent="submitNote()">
                    <MyInput name="Title" v-model="form.title" :msg="form.errors.title" type="text"
                        placeholder="Enter Note Title" icon="pi pi-bookmark-fill
" />
                    <Editor v-model="form.text" editorStyle="height: 420px" placeholder="Type your note" />
                    <span v-show="form.errors.text" class="text-red-500">{{ form.errors.text }}</span>
                    <span v-show="form.errors.success" class="text-green-500">{{ form.errors.success }}</span>
                    <Button type="submit" label="Save Note and Continue" class="mt-2 float-right" />
                </form>

                {{ notes }}
            </div>
        </div>
    </HomeLayout>
</template>
