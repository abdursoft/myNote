<template>
    <div class="flex items-center justify-center h-screen w-screen">
        <div class="flex items-center justify-center w-full p-4">
            <Card class="!bg-blue-50 shadow p-3 w-full md:w-70 lg:w-2/4">
                <template #title>
                    <h4 class="text-center text-teal-500 text-2xl">Create your myNote account!</h4>
                </template>
                <template #content>
                    <form action="" @submit.prevent="login">
                        <MyInput name="name" type="text" v-model="form.name" placeholder="Username" :msg="form.errors.name" icon="pi pi-user" />
                        <MyInput name="email" type="email" v-model="form.email" placeholder="Email address" :msg="form.errors.email" icon="pi pi-at" />
                        <MyPassword name="password" v-model="form.password" placeholder="Password" :msg="form.errors.password" icon="pi pi-lock" />
                        <div class="mt-3 flex items-center justify-between">
                            <Button
                                type="submit"
                                class="!w-full"
                                label="Create"
                                :disabled="form.processing"
                            />
                        </div>
                        <div class="text-center">
                            <p class="mt-2">Already have an account? <Link class="text-green-500" :href="route('login')">Login Here</Link></p>
                        </div>
                    </form>
                </template>
            </Card>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import Button from "primevue/button";
import Card from "primevue/card";
import MyInput from "./components/MyInput.vue";
import MyPassword from "./components/MyPassword.vue";
import { route } from "../../../vendor/tightenco/ziggy/src/js";

const form = useForm({
    email: null,
    password: null,
    name: null,
});

function login(){
    form.post(route('registerAction'),{
        onError: ()=> form.reset('password')
    })
}
</script>
