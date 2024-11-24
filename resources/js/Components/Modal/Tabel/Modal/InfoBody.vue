<script setup>
defineProps({
  row: {
    type: Object,
    required: true,
  },
  columns: {
    type: Array,
    required: true,
  },

});
</script>
<template>
    <div  v-for="(column, index) in columns"
    :key="index">
        <p v-if="column.field === 'roles'">
            <ul>
          <li
            v-for="role in row.roles"
            :key="role.id"
          >
          <span class="font-bold">
          {{ column.field }}:
          </span>
            <span :class="role.name === 'admin' ? 'text-green-500 ' : 'text-yellow-500 '">
                {{ role.name }}
            </span>
          </li>
        </ul>
        </p>

        <p v-else-if="!column.isAction &&  column.name === 'mark' ">
            <span class="font-bold">
                {{ column.name }}:
            </span>
             {{ row.pivot.mark }}
        </p>
        <p v-else-if="!column.isAction  ">
            <span class="font-bold">
                {{ column.field }}:
            </span>
            {{ row[column.field] }}
        </p>
    </div>
</template>
