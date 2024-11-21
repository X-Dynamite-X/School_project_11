<
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , router} from '@inertiajs/vue3';

const subjectUserColumns = [
    { label: "ID", field: "id",name: "id"},
    { label: "Subjects", field: "name" ,name: "name",type:"text"},
    { label: "Stoudant Name", field: "Stoudant Name"},
    { label: "Mark", field: "mark" ,name: "mark",type: "number"},
    { label: "Actions", isAction: true },
];
const subjectUserForm =[
    { label: "ID", field: "id",name: "id"},
    { label: "Subjects", field: "name" ,name: "name",type:"text"},
    { label: "Stoudant Name", field: "Stoudant Name",name:"user_ids", type:"select" ,multiple:true },
  ];
import MainTable from "@/Components/MainTable.vue";
defineProps({
    users: {
        type: Array,
    },
    allRoles:{
        type: Array,
    }
});

// console.log(users);


</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout >
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <MainTable
                    :tableData ="subjectUsers"
                    :columns="subjectUserColumns"
                     nameRoute="subjectUsers"
                    :formsFeldData="subjectUserForm"
                     ></MainTable>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
