<template>
    <div class="my-2">
        <InputGroup class="!w-full">
            <InputGroupAddon v-show="icon">
                <i :class="icon"></i>
            </InputGroupAddon>
            <InputText
                v-model="model"
                class="w-full"
                :type="type"
                :placeholder="placeholder"
            />
        </InputGroup>
        <small class="text-red-500" v-if="msg">
            {{ msg }}
        </small>
    </div>
</template>

<script setup>
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import InputText from 'primevue/inputtext';


const model = defineModel({
    type:null,
    required: true
})

defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    icon: {
        type: String,
    },
    placeholder: String,
    msg:String
})
</script>
