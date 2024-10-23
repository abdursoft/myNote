<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import HomeLayout from "./layouts/HomeLayout.vue";
import Slider from "./components/HomePage/Slider.vue";
import Content from "./components/HomePage/Content.vue";
</script>

<template>
    <Head title="Home Page" />
    <HomeLayout>
        <Slider />
        <Content />
    </HomeLayout>
</template>
