<!-- src/Layout/DashboardLayout.vue -->
<template>
  <div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <Sidebar 
      :sidebar-open="sidebarOpen" 
      @close-sidebar="closeSidebar"
    />

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">
      <AppBar 
        :sidebar-open="sidebarOpen"
        @toggle-sidebar="toggleSidebar" 
      />

      <!-- Main Content Area - This is where page content will be injected -->
      <main class="flex-1 p-6 bg-gray-50 overflow-auto">
        <div class="max-w-7xl mx-auto">
          <slot></slot>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue';
import Sidebar from './Sidebar.vue';
import AppBar from './AppBar.vue';

export default {
  name: 'DashboardLayout',
  components: { Sidebar, AppBar },
  setup() {
    const sidebarOpen = ref(window.innerWidth >= 768);

    function toggleSidebar() {
      sidebarOpen.value = !sidebarOpen.value;
    }

    function closeSidebar() {
      sidebarOpen.value = false;
    }

    function handleResize() {
      if (window.innerWidth >= 768) {
        sidebarOpen.value = true;
      } else {
        sidebarOpen.value = false;
      }
    }

    onMounted(() => {
      window.addEventListener('resize', handleResize);
    });

    onUnmounted(() => {
      window.removeEventListener('resize', handleResize);
    });

    return { 
      sidebarOpen, 
      toggleSidebar, 
      closeSidebar 
    };
  }
};
</script>