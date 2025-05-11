<template>
    <section class="m-5">
        <h1>System Configurations</h1>

        <form
            class="flex flex-col max-w-[500px] border p-5"
            @submit.prevent="handleUpdateSubmit"
        >
            <div
                v-for="setting in allSettings" :key="setting.name"
            >
                <label :for="setting.name">{{ setting.name }}</label>
                <input
                    v-model="updatedSettings[setting.name]"
                    type="number"
                    class="border ml-5"
                    :id="setting.name"
                    :placeholder="setting.value"
                >
            </div>
            <button type="submit">Submit</button>
        </form>
    </section>
</template>

<script lang="ts" setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { InertiaLink } from '@inertiajs/inertia-vue3';

type ConfigSetting = {
    name: string;
    value: string;
};

const props = defineProps<{
    allSettings: Array<ConfigSetting>,
}>();

const updatedSettings = ref<Record<string, string>>({});

const handleUpdateSubmit = (): void => {
    // Basically Array.filter() to filter out updated entries that are the same as the existing values
    updatedSettings.value = Object.fromEntries(
        Object.entries(updatedSettings.value).filter(([key, value]) => value != props.allSettings.find(setting => setting.name === key)?.value)
    ) as Record<string, string>;

    console.log(updatedSettings.value);
    

    useForm(updatedSettings.value).post('/config');
}
</script>