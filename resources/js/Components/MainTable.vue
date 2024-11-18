<script setup>
import { defineProps, ref } from "vue";
import TableHeader from "@/Components/Table/TableHeader.vue";
import TableRow from "@/Components/Table/TableRow.vue"; // الصف
import DynamicModal from "@/Components/Modal/DynamicModal.vue"; // استيراد الـ Modal
import InfoBody from "./Modal/InfoBody.vue";
import EditBody from "./Modal/EditBody.vue";
import DeleteBody from "./Modal/DeleteBody.vue";

const props = defineProps({
    tableData: {
        type: Array,
        required: true,
    },
    columns: {
        type: Array,
        required: true,
    },
    type: {
        type: String,
        default: null,
    },
    allRoles: {
        type: Array,
        default: null,
    },
});

// متغير لتحديد الصف الحالي والعملية الحالية
const selectedRow = ref(null);
const selecteColumns = ref(null);
const actionType = ref("");

// فتح الـ Modal
const openModal = ({ actionType: action, row, columns }) => {
    actionType.value = action;
    selectedRow.value = { ...row }; // نسخ البيانات بدلاً من الإشارة
    selecteColumns.value = [...columns]; // نسخ الأعمدة لتجنب التغييرات المباشرة
};


const closeModal = () => {
    selectedRow.value = null;
    actionType.value = "";
};
const handleConfirm = (data) => {
    console.log(data.target);
};
const updateRowInTable = (updatedRow) => {
    const index = props.tableData.findIndex((row) => row.id === updatedRow.id);
    if (index !== -1) {
        props.tableData[index] = updatedRow;
        console.log(updatedRow);

    }
    closeModal();
};
</script>

<template>
    <table
        class="table-auto w-full border border-gray-300 rounded-lg overflow-hidden"
    >
        <TableHeader :columns="columns" />
        <tbody
            class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600"
        >
            <TableRow
                v-for="(row, index) in tableData"
                :key="index"
                :row="row"
                :columns="columns"
                @action-click="openModal"

            />
        </tbody>
    </table>
    <DynamicModal
        v-if="selectedRow"
        :title="actionType"
        :confirmAction="handleConfirm"
        @close="closeModal"
        @confirmAction="updateRowInTable(selectedRow)"

    >
        <template #content>
            <InfoBody
                v-if="actionType == 'info'"
                :columns="selecteColumns"
                :row="selectedRow"
            />
            <EditBody
                v-if="actionType == 'edit'"
                :columns="selecteColumns"
                :row="selectedRow"
                :allRoles="allRoles"
                @updateRow="updateRowInTable"

            />
            <DeleteBody
                v-if="actionType == 'delete'"
                :columns="selecteColumns"
                :row="selectedRow"
                @close="closeModal"

            />
        </template>
    </DynamicModal>
</template>
