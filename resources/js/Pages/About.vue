<script setup>
import { Head } from "@inertiajs/vue3";
import HomeLayout from "./layouts/HomeLayout.vue"
import Button from "primevue/button";
import Card from "primevue/card";
</script>

<template>
    <Head title="Home" />
    <HomeLayout>
        <div class="p-4">
        <Card style="width: 25rem; overflow: hidden">
            <template #header>
                <img
                    alt="user header"
                    src="https://primefaces.org/cdn/primevue/images/usercard.png"
                />
            </template>
            <template #title>About Card</template>
            <template #subtitle>Card subtitle</template>
            <template #content>
                <p class="m-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Inventore sed consequuntur error repudiandae numquam
                    deserunt quisquam repellat libero asperiores earum nam
                    nobis, culpa ratione quam perferendis esse, cupiditate neque
                    quas!
                </p>
            </template>
            <template #footer>
                <div class="flex gap-4 mt-1">
                    <Button
                        label="Cancel"
                        severity="secondary"
                        outlined
                        class="w-full"
                    />
                    <Button label="Save" class="w-full" />
                </div>
            </template>
        </Card>
    </div>
    </HomeLayout>
</template>