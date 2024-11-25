<script setup>
import { defineProps, ref } from "vue";
import { router, useForm } from "@inertiajs/vue3";
import TableHeader from "@/Components/Modal/Tabel/TableHeader.vue";
import TableRow from "@/Components/Modal/Tabel/TableRow.vue";
import DynamicModal from "@/Components/Modal/DynamicModal.vue";
import InfoBody from "@/Components/Modal/Tabel/Modal/InfoBody.vue";
import EditBody from "@/Components/Modal/Tabel/Modal/EditBody.vue";
import DeleteBody from "@/Components/Modal/Tabel/Modal/DeleteBody.vue";
import CreateBody from "@/Components/Modal/Tabel/Modal/CreateBody.vue";
import CreateIcon from "@/Components/IconSvg/CreateIcon.vue";

const props = defineProps({
    tableData: { type: Array, required: true },
    columns: { type: Array, required: true },
    nameRoute: { type: String, default: null },
    formsFeldData: { type: Array, default: null },
    formsFeldModelData:{type:Array,default:null},
    listData:{type:Array,default:null},
    columnsModal:{type:Array,default:null}


});

const selectedRow = ref(null);
const selectedColumns = ref(null);
const actionType = ref("");
const selectedForms = ref(null);
const selectedFormsModel = ref(null);
const openModal = ({ actionType: action, row, columns }) => {
    actionType.value = action;
    selectedRow.value = { ...row };
    selectedColumns.value = [...columns];
  };
const openCreateModal = ({ actionType: action, row, columns ,formsFeldData ,listsData }) => {
    console.log(listsData);

    actionType.value = action;
    selectedRow.value = { ...row };
    selectedColumns.value = [...columns];
    selectedForms.value = [...formsFeldData];
    selectedFormsModel.value = [...listsData];

};
const closeModal = () => {
    selectedRow.value = null;
    actionType.value = "";
};
const updateRowInTable = (updatedRow) => {
    const formCreate = useForm({ ...updatedRow });
    const editRoute = `${props.nameRoute}.update`;
    router.put(route(editRoute, formCreate.id),updatedRow,{
        onSuccess: () => closeModal(),
    });
 };
const createRowInTable = (createRow) => {
    const createRoute = `${props.nameRoute}.store`;
    const formCreate = useForm({ ...createRow });
    formCreate.post(route(createRoute), {
        onSuccess: () => formCreate.reset(),
        onSuccess: () => closeModal(),
    });

};
const deleteRowInTable = (rowId) => {
     const deleteRoute = `${props.nameRoute}.destroy`;
    router.delete(route(deleteRoute, rowId.value), {
        onSuccess: () => closeModal(),
    });
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
                v-for="(row, index) in tableData.users"
                :key="index"
                :row="row"
                :rowName="tableData.name"
                :columns="columns"
                @action-click="openModal"
            />
        </tbody>
    </table>
    <DynamicModal
        v-if="selectedRow"
        :title="actionType"
        @close="closeModal"
    >
        <template #content>
            <InfoBody
                v-if="actionType === 'info'  "
                :columns="selectedColumns"
                :rowList="selectedRow.users"
                :row="selectedRow"
                :rowName="selectedRow.name"
            />
             <CreateBody
                v-if="actionType === 'create'"
                :columns="selectedColumns"
                :allRoles="selectedFormsModel"
                :formFeld="selectedForms"
                @createRow="createRowInTable"
                @close="closeModal"
            />
            <EditBody
                v-if="actionType === 'edit'"
                :columns="selectedColumns"
                :row="selectedRow"
                :allRoles="allRoles"
                @updateRow="updateRowInTable"
                @close="closeModal"
            />
            <DeleteBody
                v-if="actionType === 'delete'"
                :row="selectedRow"
                @close="closeModal"
                @deleteRow="deleteRowInTable"
                :type="nameRoute"
            />
        </template>
    </DynamicModal>

    <button
        @close="closeModal"
        @click="
            openCreateModal({
                actionType: 'create',
                row: null,
                columns: columns,
                formsFeldData: formsFeldData,
                listsData:listData
            })
        "
        class="fixed bottom-4 right-4 flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        style="position: fixed; bottom: 16px; right: 16px"
    >
        <CreateIcon />
    </button>
</template>
