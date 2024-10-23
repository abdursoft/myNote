<template>
    <Head title="Contact"></Head>
    <HomeLayout>
        <div class="wrapper px-4 py-5 min-h-40 flex items-center justify-center">
            <h2 class="text-2xl font-bold text-white">Get In Touch Today</h2>
        </div>

        <div class="flex flex-wrap gap-10 px-4 py-5 items-center justify-center">
            <div class="w-full sm:w-1/4 rounded shadow py-5 my-2 text-center">
                <div class="!h-30">
                    <i class="pi pi-at text-2xl"></i>
                    <p class="text-sm">support@abdursoft.com</p>
                </div>
            </div>
            <div class="w-full sm:w-1/4 rounded shadow py-5 my-2 text-center">
                <div class="!h-30">
                    <i class="pi pi-phone text-2xl"></i>
                    <p class="text-sm">+8801892311511</p>
                </div>
            </div>
            <div class="w-full sm:w-1/4 rounded shadow py-5 my-2 text-center">
                <div class="!h-30">
                    <i class="pi pi-whatsapp text-2xl"></i>
                    <p class="text-sm">+8801892311511</p>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <div class="flex flex-wrap justify-between">
            <div class="w-full sm:w-2/4 px-4 my-1">
                <ContactForm class="w-full"/>
            </div>
            <div class="w-full sm:w-2/4 px-4 my-1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57496.25689172757!2d89.21548916684569!3d25.753512860618375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e32de6fca6019b%3A0x9fa496e687f818c8!2z4Kaw4KaC4Kaq4KeB4Kaw!5e0!3m2!1sbn!2sbd!4v1728195700672!5m2!1sbn!2sbd" class="w-full" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </HomeLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import ContactForm from './components/ContactForm.vue';
import HomeLayout from './layouts/HomeLayout.vue';

</script>

<style lang="scss">
.wrapper{
    background: linear-gradient(45deg, rgba(96, 200, 207, 0.7), rgba(91, 168, 199, 0.829)), url('/images/contact.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;

}
</style>