
<template>
    <div class="card">
        <Carousel :value="items" :numVisible="1" :showNavigators="0" autoplayInterval="3000" :numScroll="1" orientation="horizontal" containerClass="flex items-center">
            <template #item="slotProps">
                <div class="w-full">
                    <div class="mb-4">
                        <div class="relative mx-auto">
                            <img :src="slotProps.data.image" :alt="slotProps.data.name" class="w-full items-center rounded contentClass" />
                            <div class="absolute bottom-2 sm:bottom-[50px] m-auto z-10 flex items-center justify-center flex-col w-full">
                                <div class="text-center w-auto  p-4 bg-teal-700 rounded !animate-slidedown">
                                    <h1 class="text-xl sm:text-2xl font-serif text-white">{{ slotProps.data.name }}</h1>
                                    <p class="text-justify font-sm sm:font-medium font-mono text-white">{{ slotProps.data.desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </Carousel>
    </div>
</template>

<style lang="scss">
.contentClass{
    max-height: 440px !important;
    position: relative;
    
    &*{
        max-height: 100% !important;
    }
}
</style>

<script setup>
import { ref, onMounted } from "vue";
import Carousel from 'primevue/carousel';
// import { ProductService } from '@/service/ProductService';

// onMounted(() => {
//     ProductService.getProductsSmall().then((data) => (products.value = data.slice(0, 9)));
// })

const products = ref();

const getSeverity = (status) => {
    switch (status) {
        case 'INSTOCK':
            return 'success';

        case 'LOWSTOCK':
            return 'warn';

        case 'OUTOFSTOCK':
            return 'danger';

        default:
            return null;
    }
};

const items = [
    {
        name: "Write what ever on your mind",
        image: "https://images.pexels.com/photos/9433151/pexels-photo-9433151.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        desc : "Halka text will be here"
    },
    {
        name: "Now you can add your example image in your note",
        image: "https://images.pexels.com/photos/7176076/pexels-photo-7176076.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        desc : "Halka text will be here"
    },
    {
        name: "Don't need to copy, Just share the link",
        image: "https://images.pexels.com/photos/6149095/pexels-photo-6149095.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
        desc : "Halka text will be here"
    },
    {
        name: "Hand note 4",
        image: "/images/pexels-karolina-grabowska-8947024.jpg",
        desc : "Halka text will be here"
    },
]

</script>
