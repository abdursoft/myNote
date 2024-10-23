<template>
    <div class="container">
        <Navbar v-show="openMenu" />
        <div class="py-2">
            <slot />
            <Footer />
        </div>
    </div>
</template>

<script setup>
import Navbar from '../components/Navbar.vue';
import Footer from '../components/Footer.vue';
defineProps({
    openMenu : {
        Boolean,
        default: true
    }
})
</script>