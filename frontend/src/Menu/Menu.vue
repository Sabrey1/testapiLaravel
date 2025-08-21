<template>
  <DashboardLayout>
    <div class="container">
      
      <!-- Loading state -->
      <div v-if="loading" class="flex justify-center items-center py-12">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
      </div>

      <!-- Error state -->
      <div v-else-if="error" class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
        <div class="flex">
          <svg class="w-5 h-5 text-red-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <div>
            <h3 class="text-red-800 font-medium">Error loading products</h3>
            <p class="text-red-700 text-sm mt-1">{{ error }}</p>
            <button 
              @click="fetchProducts" 
              class="mt-2 text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition-colors"
            >
              Try Again
            </button>
          </div>
        </div>
      </div>

      <!-- Product DataTable -->
      <div v-else class="card">
        <DataTable 
          :value="menus" 
          v-model:selection="selectedProduct" 
          stripedRows 
          selectionMode="single" 
          :metaKeySelection="metaKey" 
          dataKey="id" 
          tableStyle="min-width: 50rem"
          class="custom-datatable"
        >
          <Column sortable field="menuid" header="ID" style="width: 100px">
            <template #body="slotProps">
              <span class="font-semibold text-blue-600">{{ slotProps.data.menuid }}</span>
            </template>
          </Column>
          
          <Column sortable field="menuname" header="Menu Name">
            <template #body="slotProps">
              <span class="font-medium text-gray-900">{{ slotProps.data.menuname }}</span>
            </template>
          </Column>
          <Column sortable field="saleprice" header="Sale Price">
            <template #body="slotProps">
              <span class="font-medium text-gray-900">${{ slotProps.data.saleprice }}</span>
            </template>
          </Column>
           
          <Column field="price" header="Action" style="width: 150px">
            <template #body="slotProps">
              <div class="flex space-x-2">
              <button class="btnEdit">Edit</button>
              <button class="btnDelete">Delete</button>
              </div>
            </template>
          </Column>
        
        </DataTable>
      </div>
        
    </div>
   
  </DashboardLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import DashboardLayout from '../Layout/DashboardLayout.vue'
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const menus = ref([])
const selectedProduct = ref();
const metaKey = ref(true);
const loading = ref(true)
const error = ref(null)

const fetchProducts = async () => {
  loading.value = true
  error.value = null
  
  try {
    const res = await axios.get('http://127.0.0.1:8000/api/menus')
    menus.value = res.data
  } catch (err) {
    console.error('Error fetching products:', err)
    error.value = err.response?.data?.message || 'Failed to load products. Please try again.'
  } finally {
    loading.value = false
  }
}

 

onMounted(() => {
  fetchProducts()
})
</script>

<style scoped>
.container {
  padding: 0;
}

.card {
  background: white;
  border-radius: 12px;
  border: 1px solid #e5e7eb;
  padding: 1.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}
.btnEdit{
  background-color: #6ed340;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  font-size: 0.875rem;
  transition: background-color 0.2s ease;
}
.btnEdit:hover {
  background-color: #408525;
}
.btnDelete{
  background-color: #ff0000;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 0.375rem;
  font-size: 0.875rem;
  transition: background-color 0.2s ease;
}
.btnDelete:hover {
  background-color: #e90606;
}
/* Loading animation */
@keyframes spin {
  to { transform: rotate(360deg); }
}

.animate-spin {
  animation: spin 1s linear infinite;
}

/* Custom DataTable Styling */
:deep(.custom-datatable) {
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid #e5e7eb;
}

:deep(.custom-datatable .p-datatable-thead > tr > th) {
  background-color: #f8fafc;
  color: #374151;
  font-weight: 600;
  padding: 1rem;
  border-bottom: 2px solid #e5e7eb;
  font-size: 0.875rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

:deep(.custom-datatable .p-datatable-tbody > tr) {
  transition: background-color 0.2s ease;
}

:deep(.custom-datatable .p-datatable-tbody > tr:hover) {
  background-color: #f8fafc;
}

:deep(.custom-datatable .p-datatable-tbody > tr.p-highlight) {
  background-color: #dbeafe;
  color: #1e40af;
}

:deep(.custom-datatable .p-datatable-tbody > tr.p-highlight:hover) {
  background-color: #bfdbfe;
}

:deep(.custom-datatable .p-datatable-tbody > tr > td) {
  padding: 1rem;
  border-bottom: 1px solid #f1f5f9;
  vertical-align: middle;
}

:deep(.custom-datatable .p-datatable-tbody > tr:last-child > td) {
  border-bottom: none;
}

/* Striped rows styling */
:deep(.custom-datatable .p-datatable-striped .p-datatable-tbody > tr:nth-child(even)) {
  background-color: #f9fafb;
}

:deep(.custom-datatable .p-datatable-striped .p-datatable-tbody > tr:nth-child(even):hover) {
  background-color: #f3f4f6;
}

/* Sort icons */
:deep(.custom-datatable .p-sortable-column-icon) {
  color: #6b7280;
  margin-left: 0.5rem;
}

:deep(.custom-datatable .p-sortable-column:hover .p-sortable-column-icon) {
  color: #374151;
}

:deep(.custom-datatable .p-sortable-column.p-highlight .p-sortable-column-icon) {
  color: #3b82f6;
}

/* Responsive design */
@media (max-width: 768px) {
  .card {
    padding: 1rem;
    margin: 0 -0.5rem;
  }
  
  :deep(.custom-datatable .p-datatable-thead > tr > th),
  :deep(.custom-datatable .p-datatable-tbody > tr > td) {
    padding: 0.75rem 0.5rem;
    font-size: 0.875rem;
  }
}
</style>