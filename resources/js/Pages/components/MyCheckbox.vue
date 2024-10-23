
<template>
    <div>
        <Checkbox v-model="model" inputId="rememberMe" :binary="true" />
        <label for="rememberMe" class="ml-2"> {{ label }} </label>
    </div>
</template>

<script setup>
import Checkbox from 'primevue/checkbox';

const model = defineModel({
    type: null,
    required: true,
    default: false
})
defineProps({
    label : {
        type: String,
        required:true
    }
})
</script>
