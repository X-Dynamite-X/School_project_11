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
        <!-- <THeader  >ID</THeader>

        <THeader>Name Subject</THeader>
        <THeader>Success Mark</THeader>
        <THeader>Full Mark</THeader>
        <THeader>Action</THeader> -->
        <THeader   v-for="(column, index) in columns" :key="index" :column="column" >
            {{ column.label }}
        </THeader>

      </tr>
    </thead>
  </template>
