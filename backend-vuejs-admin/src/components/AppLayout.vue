<template>
    <div class="flex h-full">
           <Sidebar/>
            <div class="flex-1">
              <Navbar/>
                <main>
                   <p>ma</p>
                </main>
            </div>
    </div>
</template>

<script setup>
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
const props = defineProps({
    title: String,
});
</script>
