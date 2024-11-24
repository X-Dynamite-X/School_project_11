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
const subjectForm = [
    { label: "Name Subject", field: "name"  ,name: "name",type: "text" },
    { label: "Success Mark", field: "success_mark",name: "success_mark",type: "number",},
    { label: "Full Mark", field: "full_mark",name: "full_mark",type: "number" },
 ];
 const subjectUserModelColumns = [
    { label: "ID", field: "id",name: "id"},
    { label: "Stoudant Name", field: "name" ,name:"user_ids", type:"select" },
    { label: "Mark", field: "pivot.mark" ,name: "mark",type: "number"},
    { label: "Actions", isAction: true },
];
const subjectUserModelForm =[
    { label: "ID", field: "id",name: "id"},
    { label: "Subjects", field: "name" ,name: "subject_id",type:"text"},
    { label: "Stoudant Name", field: "Stoudant Name",name:"user_ids", type:"select" ,multiple:true },
    { label: "Mark", field: "Mark",name:"user_ids", type:"number"  },

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
                    :formsFeldData="subjectForm"
                    :formsFeldModelData="subjectUserModelForm"
                    :columnsModal="subjectUserModelColumns"
                    nameRouteModel="subjectUsers"
                    nameRoute="subject"

                ></MainTable>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
