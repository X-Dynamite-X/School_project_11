<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , ref } from '@inertiajs/vue3';
import MainTable from "@/Components/MainTable.vue";
const subjectColumns = [
  { label: "ID", field: "id" },
  { label: "Name Subject", field: "name" },
  { label: "Success Mark", field: "success_mark" },
  { label: "Full Mark", field: "full_mark" },
  { label: "Actions", isAction: true },
];
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
                <MainTable
                    :tableData ="subjects"
                    :columns="subjectColumns"
                    type="subject" ></MainTable>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
