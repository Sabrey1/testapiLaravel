<template>
  <div class="flex min-h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-sm bg-white p-8 rounded-2xl shadow-lg">
      <!-- Header -->
      <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h1>
      <!-- Form -->
      <form @submit.prevent="handleLogin" class="space-y-5">
        <!-- Username -->
        <div>
          <input
            v-model="username"
            type="text"
            placeholder="Username"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
          />
        </div>
        <!-- Password -->
        <div>
          <input
            v-model="password"
            type="password"
            placeholder="Password"
            required
            class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:outline-none"
          />
        </div>
        <!-- Remember Me -->
        <div class="flex items-center gap-2">
          <input
            type="checkbox"
            id="rememberMe"
            v-model="rememberMe"
            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
          />
          <label for="rememberMe" class="text-sm text-gray-600">Remember Me</label>
        </div>
        <!-- don't have account -->
        <p class="text-sm text-gray-500">
          Don't have an account? <router-link to="/register" class="text-blue-600 hover:underline">Register</router-link>
        </p>
        <!-- Button -->
        <button
          type="submit"
          class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors"
          style="background-color: aquamarine; color: black; font-weight: 500;"
        >
          Login
        </button>
        <!-- Message -->
        <p
          v-if="message"
          class="mt-3 text-center text-sm font-medium"
          :class="{ 'text-green-600': success, 'text-red-600': !success }"
        >
          {{ message }}
        </p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const username = ref("");
const password = ref("");
const rememberMe = ref(false);
const message = ref("");
const success = ref(false);

// Default credentials
const defaultUser = {
  username: "admin",
  password: "123456",
};

// Check localStorage when component loads
onMounted(() => {
  const savedUsername = localStorage.getItem("username") || "";
  const savedPassword = localStorage.getItem("password") || "";

  // If missing username & password → go to /login
  if (savedUsername == "" || savedPassword == "") {
    router.push("/login");
  }
});

function handleLogin() {
  if (
    username.value === defaultUser.username &&
    password.value === defaultUser.password
  ) {
    message.value = "✅ Login successful!";
    success.value = true;

    // Save to localStorage
    localStorage.setItem("isLoggedIn", "true");
    localStorage.setItem("username", username.value);
    localStorage.setItem("password", password.value);

    if (rememberMe.value) {
      localStorage.setItem("rememberMe", "true");
    } else {
      localStorage.removeItem("rememberMe");
    }

    // Redirect after login
    setTimeout(() => {
      router.push("/");
    }, 800);
  } else {
    message.value = "❌ Invalid username or password";
    success.value = false;
  }
}
</script>

