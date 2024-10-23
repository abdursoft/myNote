<template>
    <div class="flex items-center justify-center h-screen w-screen">
        <div class="flex items-center justify-center w-full p-4">
            <Card class="!bg-blue-50 shadow p-3 w-full md:w-70 lg:w-2/4">
                <template #title>
                    <h4 class="text-center text-teal-500 text-2xl">Login to your myNote</h4>
                </template>
                <template #content>
                    <Toast message="error" v-show="error" />
                    <form action="" @submit.prevent="login">
                        <MyInput name="email" type="email" v-model="form.email" placeholder="Email address" :msg="form.errors.email" icon="pi pi-at" />
                        <MyPassword name="password" v-model="form.password" placeholder="Password" :msg="form.errors.passowrd" icon="pi pi-lock" />
                        <div class="sm:flex-none lg:flex items-center lg:justify-between gap-3">
                            <MyCheckbox class="text-sm"v-model="form.remember" label="Remember Me" />
                            <p class="mt-2 text-sm">Forgot password? <Link class="text-green-500" :href="route('register')">Retrieve Here</Link></p>
                        </div>
                        <div class="mt-3 flex items-center justify-between">
                            <Button
                                type="submit"
                                class="!w-full"
                                label="Login"
                                :disabled="form.processing"
                            />
                        </div>
                        <div class="text-center">
                            <p class="mt-2 text-sm">Don't have an account? <Link class="text-green-500" :href="route('register')">Register Here</Link></p>
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
import Toast from "primevue/toast";
import MyCheckbox from "./components/MyCheckbox.vue";

defineProps({
    error: {
        type: String,
        default: null
    }
})

const form = useForm({
    email: null,
    password: null,
    remember: null
});

function login(){
    form.post(route('loginAction'),{
        onError: ()=> form.reset('password')
    })
}
</script>
