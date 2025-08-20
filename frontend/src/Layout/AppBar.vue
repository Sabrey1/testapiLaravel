<!-- src/Layout/AppBar.vue -->
<template>
  <header class="h-16 bg-white shadow-md flex items-center px-4 relative z-10">
    <!-- Hamburger Button -->
    <button 
      class="hamburger-btn p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200"
      @click="$emit('toggle-sidebar')"
      :class="{ 'hamburger-active': sidebarOpen }"
    >
      <div class="hamburger-icon">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </div>
    </button>

    <!-- Dynamic App Title -->
    <h1 class="text-2xl font-bold text-gray-800 ml-4 ">{{ currentPageTitle }}</h1>

    <!-- Right side content (optional) -->
    <div class="ml-auto flex items-center space-x-4">
      <!-- You can add user profile, notifications, etc. here -->
      <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
        <span class="text-white text-sm font-medium">U</span>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "AppBar",
  props: {
    sidebarOpen: {
      type: Boolean,
      default: true
    }
  },
  emits: ['toggle-sidebar'],
  computed: {
    currentPageTitle() {
      // Define page titles based on route paths
      const pageTitles = {
        '/': 'Dashboard',
        '/product-list': 'Products',
        '/about': 'About',
        '/contact': 'Contact'
      };
      
      // Return the title for current route, or default to 'Dashboard'
      return pageTitles[this.$route.path] || 'Dashboard';
    }
  }
};
</script>

<style scoped>
/* Hamburger Menu Styles */
.hamburger-btn {
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hamburger-icon {
  width: 20px;
  height: 16px;
  position: relative;
  transform: rotate(0deg);
  transition: 0.3s ease-in-out;
}

.hamburger-line {
  display: block;
  position: absolute;
  height: 2px;
  width: 100%;
  background: #374151;
  border-radius: 1px;
  opacity: 1;
  left: 0;
  transform: rotate(0deg);
  transition: 0.3s ease-in-out;
}

.hamburger-line:nth-child(1) {
  top: 0px;
}

.hamburger-line:nth-child(2) {
  top: 7px;
}

.hamburger-line:nth-child(3) {
  top: 14px;
}

/* Animation for hamburger to X */
.hamburger-active .hamburger-line:nth-child(1) {
  top: 7px;
  transform: rotate(135deg);
}

.hamburger-active .hamburger-line:nth-child(2) {
  opacity: 0;
  left: -20px;
}

.hamburger-active .hamburger-line:nth-child(3) {
  top: 7px;
  transform: rotate(-135deg);
}
</style>