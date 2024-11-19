<script setup>
import { defineProps, ref } from "vue";
import TableHeader from "@/Components/Table/TableHeader.vue";
import TableRow from "@/Components/Table/TableRow.vue";
import DynamicModal from "@/Components/Modal/DynamicModal.vue";
import InfoBody from "./Modal/InfoBody.vue";
import EditBody from "./Modal/EditBody.vue";
import DeleteBody from "./Modal/DeleteBody.vue";

const props = defineProps({
    tableData: { type: Array, required: true },
    columns: { type: Array, required: true },
    type: { type: String, default: null },
    allRoles: { type: Array, default: null }
});

const selectedRow = ref(null);
const selectedColumns = ref(null);
const actionType = ref("");

const openModal = ({ actionType: action, row, columns }) => {
    actionType.value = action;
    selectedRow.value = { ...row };
    selectedColumns.value = [...columns];
};

const closeModal = () => {
    selectedRow.value = null;
    actionType.value = "";
};

const handleConfirm = () => {
    updateRowInTable(selectedRow.value);
};

const updateRowInTable = (updatedRow) => {
    console.log(updatedRow);

    const index = props.tableData.findIndex(row => row.id === updatedRow.id);
    if (index !== -1) {
        props.tableData[index] = updatedRow;
    }
    closeModal();
};
</script>

<template>
    <table class="table-auto w-full border border-gray-300 rounded-lg overflow-hidden">
        <TableHeader :columns="columns" />
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
            <TableRow v-for="(row, index) in tableData" :key="index" :row="row" :columns="columns" @action-click="openModal" />
        </tbody>
    </table>
    <DynamicModal v-if="selectedRow" :title="actionType" @close="closeModal" @confirmAction="handleConfirm" >
        <template #content>
            <InfoBody v-if="actionType === 'info'" :columns="selectedColumns" :row="selectedRow" />
            <EditBody v-if="actionType === 'edit'" :columns="selectedColumns" :row="selectedRow" :allRoles="allRoles" @updateRow="updateRowInTable" @close="closeModal" />
            <DeleteBody v-if="actionType === 'delete'" :columns="selectedColumns" :row="selectedRow" />
        </template>
    </DynamicModal>
</template>
