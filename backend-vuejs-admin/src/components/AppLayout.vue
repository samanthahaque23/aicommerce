<template>
    <div class="flex h-full">
            <div class="w-[200px] bg-blue-700">
                <p>sidebar</p>
            </div>
            <div class="flex-1">
                <header class="h-8 shadow ">
                    <p>header</p>
                </header>
                <main>
                   <p>ma</p>
                </main>
            </div>
    </div>
</template>

<script setup>
const props = defineProps({
    title: String,
});
</script>
