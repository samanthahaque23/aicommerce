<template>
    <div class="flex min-h-full bg-gray-200">
           <Sidebar :class="{ '-ml-[185px]' : !sidebarOpened}"/>
            <div class="flex-1">
               <Navbar @toggle-sidebar="toggleSidebar"/>
                <main class="p-6">
                  <div class="rounded p-4 bg-white">
                    <router-view></router-view>
                  </div>
                </main>
            </div>
    </div>
</template>

<script setup>
import {ref,onMounted,onUnmounted} from "vue";
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
const props = defineProps({
    title: String,
});

const sidebarOpened =ref(true)
function toggleSidebar(){
    sidebarOpened.value = !sidebarOpened.value;
}
onMounted(()=>{
    console.log("resized");
handleSidebarOpened();
window.addEventListener('resize',handleSidebarOpened)
})
onUnmounted(()=>{
window.removeEventListener('resize',handleSidebarOpened)

})

function handleSidebarOpened(){
   if(window.outerWidth <= 768){
    sidebarOpened.value = false;
}
}
</script>
