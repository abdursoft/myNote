
<template>
    <div class="card p-0">
        <div class="flex flex-wrap">
            <div v-if="$page.props.notes == undefined"  v-for="(index,item) in 15" :key="index" class="w-full py-2">
                <Skeleton class="mb-1"></Skeleton>
                <Skeleton width="10rem" class="mb-1"></Skeleton>
            </div>
            <div class="mb-1.5 w-full" v-for="(item, index) in $page.props.notes" :key="index">
                <p>{{ item.title }}</p>
                <small>{{ item.privacy }}</small>
            </div>
        </div>
    </div>
</template>

<script setup>
import Skeleton from 'primevue/skeleton';
</script>
