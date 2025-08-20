<!-- src/Layout/Sidebar.vue -->
<template>
  <aside 
    class="sidebar bg-gray-900 text-white flex-shrink-0 h-screen transition-transform duration-300 ease-in-out relative z-20"
    :class="{ 'sidebar-closed': !sidebarOpen }"
  >
    <!-- App Logo/Brand -->
    <div class="p-6 border-b border-gray-700">
      <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
          <span class="text-white font-bold text-sm">MA</span>
        </div>
        <span class="text-xl font-bold sidebar-text text-white">My App</span>
      </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-6 px-3">
      <ul class="space-y-2">
        <li>
          <router-link 
            to="/" 
            class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 group text-white"
            active-class="bg-blue-600 hover:bg-blue-700"
          >
            <svg class="w-5 h-5 mr-3 text-white group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="sidebar-text text-white">Home</span>
          </router-link>
        </li>
        
        <li>
          <router-link 
            to="/product-list" 
            class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 group text-white"
            active-class="bg-blue-600 hover:bg-blue-700"
          >
            <svg class="w-5 h-5 mr-3 text-white group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="sidebar-text text-white">Products</span>
          </router-link>
        </li>
        
        <li>
          <router-link 
            to="/about" 
            class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 group text-white"
            active-class="bg-blue-600 hover:bg-blue-700"
          >
            <svg class="w-5 h-5 mr-3 text-white group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="sidebar-text text-white">About</span>
          </router-link>
        </li>
        
        <li>
          <router-link 
            to="/contact" 
            class="nav-link flex items-center px-4 py-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 group text-white"
            active-class="bg-blue-600 hover:bg-blue-700"
          >
            <svg class="w-5 h-5 mr-3 text-white group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="sidebar-text text-white">Contact</span>
          </router-link>
        </li>
      </ul>
    </nav>

    <!-- Footer Section (Optional) -->
    <div class="mt-auto p-4 border-t border-gray-700">
      <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
          <span class="text-white text-xs">U</span>
        </div>
        <div class="sidebar-text">
          <p class="text-sm font-medium text-white">John Doe</p>
          <p class="text-xs text-gray-300">Administrator</p>
        </div>
      </div>
    </div>
  </aside>

  <!-- Mobile Overlay -->
  <div 
    v-if="sidebarOpen" 
    class="fixed inset-0 bg-black bg-opacity-50 z-10 md:hidden"
    @click="$emit('close-sidebar')"
  ></div>
</template>

<script>
export default {
  name: "Sidebar",
  props: {
    sidebarOpen: {
      type: Boolean,
      default: true
    }
  },
  emits: ['close-sidebar']
};
</script>

<style scoped>
.sidebar {
  width: 280px;
}

.sidebar-closed {
  transform: translateX(-100%);
}

/* Force white text color */
.nav-link {
  color: white !important;
}

.nav-link:hover {
  color: white !important;
}

.nav-link.router-link-active {
  color: white !important;
}

.sidebar-text {
  color: white !important;
}

/* Show sidebar on larger screens even when closed */
@media (min-width: 768px) {
  .sidebar-closed {
    width: 80px;
    transform: translateX(0);
  }
  
  .sidebar-closed .sidebar-text {
    opacity: 0;
    pointer-events: none;
  }
  
  .sidebar-closed .nav-link {
    justify-content: center;
    padding-left: 1rem;
    padding-right: 1rem;
  }
  
  .sidebar-closed .nav-link svg {
    margin-right: 0;
  }
}

/* Mobile responsiveness */
@media (max-width: 767px) {
  .sidebar {
    position: fixed;
    left: 0;
    top: 0;
    z-index: 20;
  }
}
</style> 