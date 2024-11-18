<script setup>
import THeader from './THeader.vue';
defineProps({
  columns: {
    type: Array,
    required: true,
  },
});
</script>
<template>
    <thead class="bg-gray-100 dark:bg-gray-700">
      <tr>
        <THeader   v-for="(column, index) in columns" :key="index" :column="column" >
            {{ column.label }}
        </THeader>
      </tr>
    </thead>
  </template>
