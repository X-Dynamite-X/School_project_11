<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head  } from '@inertiajs/vue3';
import MainTable from "@/Components/MainTable.vue";
const subjectColumns = [
  { label: "ID", field: "id",name: "id" },
  { label: "Name Subject", field: "name"  ,name: "name",type: "text" },
  { label: "Success Mark", field: "success_mark",name: "success_mark",type: "number" },
  { label: "Full Mark", field: "full_mark",name: "full_mark",type: "number" },
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
