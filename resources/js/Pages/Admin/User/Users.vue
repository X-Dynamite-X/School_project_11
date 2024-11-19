<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const userColumns = [
  { label: "ID", field: "id",name: "id"},
  { label: "Name", field: "name" ,name: "name",type: "text"},
  { label: "Email", field: "email" ,name: "email",type: "email"},
  { label: "Role", field: "roles" ,name: "roles",type: "select"},
  { label: "Actions", isAction: true },
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
                <MainTable :tableData ="users" :columns="userColumns" :allRoles="allRoles" type="user"></MainTable>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
