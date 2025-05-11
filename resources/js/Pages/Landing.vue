<template>
    <section class="m-5">
        <div>
            <h1>Welcome to Down N Out!</h1>
            <InertiaLink
                href="/config"
                class="text-blue-500 underline hover:cursor-pointer"
            >
                Configurations
            </InertiaLink>
        </div>

        <InertiaLink
            href="/"
        >
            &#x21bb;
        </InertiaLink>
        <table class="w-full border border-collapse">
            <thead>
                <tr class="[&>th]:text-left">
                    <th>Alert Channel</th>
                    <th>Notification Route (sent to)</th>
                    <th>Description</th>
                    <th>Sent</th>
                </tr>
            </thead>
            <tbody class="[&>tr:nth-child(odd)]:bg-[#f2f2f2]">
                <tr
                    v-for="alert in latestAlerts" :key="alert.id"
                    class="[&>td]:border [&>td]:px-[5px]"
                >
                    <td>{{ alert.channel }}</td>
                    <td>{{ alert.notification_route }}</td>
                    <td>{{ alert.alert_description }}</td>
                    <td>{{ alert.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </section>
</template>

<script lang="ts" setup>
import { InertiaLink } from '@inertiajs/inertia-vue3';

const props = defineProps<{
    latestAlerts: Array<any>,
}>();
</script>