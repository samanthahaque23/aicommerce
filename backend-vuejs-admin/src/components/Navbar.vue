<template>
  <header class="flex justify-between items-center p-3 h-14 shadow bg-white">
   <button @click="$emit('toggle-sidebar')"
            class="ml-10 flex items-center justify-center rounded transition-colors border-none bg-white h-8  hover:bg-gray-200 hover:border-none">
      <MenuIcon class="w-6 text-gray-700 "/>
    </button>
    <Menu as="div" class="relative inline-block text-left">
      <MenuButton class="flex items-center bg-white p-2 rounded hover:bg-gray-200 transition">
        <img src="https://randomuser.me/api/portraits/men/1.jpg" class="rounded-full w-8 mr-2">
        <small class="text-gray-700">{{currentUser.name}}</small>
        <ChevronDownIcon
          class="h-5 w-5 text-gray-700 hover:text-gray-500"
          aria-hidden="true"
        />
      </MenuButton> 

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute right-0 mt-2 w-36 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        >
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-indigo-600 text-white' : 'bg-white text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
              >
                <UserIcon
                  :class="[active ? 'text-white' : 'text-indigo-400']"
                  class="mr-2 h-5 w-5"
                  aria-hidden="true"
                />
                Profile
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                @click="logout"
                :class="[
                  active ? 'bg-indigo-600 text-white' : 'bg-white text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
              >
                <LogoutIcon
                  :class="[active ? 'text-white' : 'text-indigo-400']"
                  class="mr-2 h-5 w-5"
                  aria-hidden="true"
                />
                Logout
              </button>
            </MenuItem>
          </div>
        </MenuItems>
      </transition> 
    </Menu>
  </header>
</template>

<script setup>
import {MenuIcon, LogoutIcon, UserIcon} from '@heroicons/vue/outline'
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/solid'
import store from "../store";
import router from "../router";
import { computed } from "vue";

const emit = defineEmits(['toggle-sidebar'])

const currentUser = computed(() => store.state.user.data);

function logout() {
  store.dispatch('logout')
    .then(() => {
      router.push({ name: 'login' })
    })
}
</script>

<style scoped>
/* Add any additional styles if necessary */
</style>
