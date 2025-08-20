<template>
  <div class="container">
    <h2>Product List</h2>

    <!-- product cards -->
    <div v-if="products.length" class="card-flex">
      <div
        v-for="product in products"
        :key="product.id"
        class="card"
      >
        <h3>{{ product.name }}</h3>
        <p class="description">{{ product.description }}</p>
        <p class="price">${{ product.price }}</p>
      </div>
    </div>

    <!-- loading text -->
    <p v-else>Loading products...</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const products = ref([])

onMounted(async () => {
  try {
    const res = await axios.get('http://127.0.0.1:8000/api/products')
    products.value = res.data
  } catch (err) {
    console.error('Error fetching products:', err)
  }
})
</script>

<style scoped>
.container {
  padding: 20px;
}

h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.card-flex {
  display: flex;
  flex-wrap: wrap;   /* allow wrapping */
  gap: 20px;         /* space between cards */
}

.card {
  background: #fff;
  border-radius: 12px;
  padding: 15px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  flex: 1 1 calc(25% - 20px); /* 4 cards per row on large screen */
  min-width: 220px;           /* prevent shrinking too much */
  max-width: 300px;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card h3 {
  margin-bottom: 10px;
  font-size: 18px;
  color: #333;
}

.card .description {
  font-size: 14px;
  color: #666;
  margin-bottom: 8px;
}

.card .price {
  font-weight: bold;
  font-size: 16px;
  color: #0077cc;
}
</style>
