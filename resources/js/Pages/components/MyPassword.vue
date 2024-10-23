<template>
    <div class="my-2">
        <InputGroup class="!w-full">
            <InputGroupAddon>
                <i v-show="icon" :class="icon"></i>
            </InputGroupAddon>
            <Password
                v-model="model"
                weakLabel="Too simple"
                mediumLabel="Average complexity"
                strongLabel="Complex password"
                :placeholder="placeholder"
                toggleMask
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
import Password from 'primevue/password';


const model = defineModel({
    type:null,
    required: true
})

defineProps({
    name: {
        type: String,
        required: true
    },
    icon: {
        type: String,
    },
    placeholder: String,
    msg:String
})
</script>
