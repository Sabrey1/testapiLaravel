<template>
  <div class="relative inline-block text-left">
   

    <!-- Button -->
    <button 
      @click="toggleDropdown" 
      class="btnSwitchLang inline-flex justify-center items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
    >
      <span :class="['fi', selected.flag, 'mr-2', 'rounded-sm']"></span>
      <span>{{ selected.label }}</span>
      <svg 
        class="ml-2 h-4 w-4 text-gray-500" 
        xmlns="http://www.w3.org/2000/svg" 
        viewBox="0 0 20 20" 
        fill="currentColor"
      >
        <path 
          fill-rule="evenodd" 
          d="M5.23 7.21a.75.75 0 011.06.02L10 10.939l3.71-3.71a.75.75 0 111.06 1.061l-4.24 4.25a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" 
          clip-rule="evenodd" 
        />
      </svg>
    </button>

    <!-- Dropdown -->
    <div 
      v-if="isOpen" 
      class="absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20"
    >
      <div class="py-1">
        <button 
          v-for="lang in languages" 
          :key="lang.code" 
          @click="selectLang(lang)" 
          class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
        >
          <span :class="['fi', lang.flag, 'mr-2', 'rounded-sm']"></span>
          <span>{{ lang.label }}</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue"
import { useI18n } from "vue-i18n"

const { locale } = useI18n()
const isOpen = ref(false)

const languages = [
  { code: "en", label: "English", flag: "fi-gb" }, 
  { code: "kh", label: "ភាសាខ្មែរ", flag: "fi-kh" }  
]

const selected = ref(languages[0])

function toggleDropdown() {
  isOpen.value = !isOpen.value
}

function selectLang(lang) {
  selected.value = lang
  locale.value = lang.code   
  localStorage.setItem("lang", lang.code) 
  isOpen.value = false
}

// Load saved language on mount
onMounted(() => {
  const savedLang = localStorage.getItem("lang")
  if (savedLang) {
    const found = languages.find(l => l.code === savedLang)
    if (found) {
      selected.value = found
      locale.value = found.code
    }
  }
})
</script>

<style scoped>
.btnSwitchLang {
  min-width: 140px;
}
.fi {
  width: 20px;
  height: 15px;
}
</style>
