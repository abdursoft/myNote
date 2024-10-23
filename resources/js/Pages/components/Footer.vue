<template>
    <div class="w-full mt-5">
        <div class="flex flex-wrap items-center justify-center gap-5 w-full min:h-30">
            <Link href="/who-we-are">Who we are</Link>
            <Link href="/privacy">Privacy</Link>
            <Link href="Contact">Facebook</Link>
            <Link href="Contact">Instagram</Link>
        </div>
        <p class="text-center text-sm">Develop by AbdurSoft</p>
    </div>
</template>

<script setup> 
import { Link } from "@inertiajs/vue3";
</script>