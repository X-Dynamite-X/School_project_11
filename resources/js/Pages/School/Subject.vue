<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
// import InfoIcon from "@/Components/IconSvg/InfoIcon.vue"
// import EditIcon from "@/Components/IconSvg/EditIcon.vue"
// import DeleteIcon from "@/Components/IconSvg/DeleteIcon.vue"
// import BouttonSvg from "@/Components/BouttonSvg.vue"
const subjectColumns = [
  { label: "ID", field: "id" },
  { label: "Name Subject", field: "name" },
  { label: "Success Mark", field: "success_mark" },
  { label: "Full Mark", field: "full_mark" },
  { label: "Actions", isAction: true },
];
import MainTable from "@/Components/MainTable.vue";
defineProps({
    subjects: {
        type: Array,
    },
});

</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout >
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <MainTable :tableData ="subjects" :columns="subjectColumns" ></MainTable>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
