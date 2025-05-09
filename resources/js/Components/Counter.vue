<script lang="ts" setup>
import { ref, defineProps, defineEmits } from 'vue'

// 1. Define props with types
const props = defineProps<{
    initial: number,
}>()

// 2. Define emits with type safety
const emit = defineEmits<{
    (e: 'update', value: number): void
}>()

// 3. Reactive state
const count = ref(props.initial)

// 4. Event handler
const increment = (): void => {
    count.value++
    emit('update', count.value)
}
</script>

<template>
    <div>
        <p>Count: {{ count }}</p>
        <button @click="increment">Increment</button>
    </div>
</template>

<style scoped>
button {
    padding: 0.5rem 1rem;
    font-size: 1rem;
}
</style>
