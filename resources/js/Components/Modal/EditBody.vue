<script setup>
import { ref, reactive, onMounted } from "vue";
import TextInput from "@/Components/Form/TextInput.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";

const props = defineProps({
    row: { type: Object, required: true },
    columns: { type: Array, required: true },
    allRoles: { type: Array, required: true },
});

const emit = defineEmits(["close", "updateRow"]);

// نموذج البيانات
const form = reactive({ ...props.row });
const isVisible = ref(true);

// تجهيز النموذج عند التحميل
onMounted(() => {
    props.columns.forEach((column) => {
        if (column.name && props.row[column.name] !== undefined) {
            if (column.type === "select" && Array.isArray(props.row[column.name])) {
                const role = props.row[column.name][0];
                form[`${column.name}_id`] = role?.id || null; // role_id
                form[`${column.name}_name`] = role?.name || ""; // role_name
            } else {
                form[column.name] = props.row[column.name];
            }
        }
    });
});

// إرسال البيانات المحدثة
const sendUpdatedRow = () => {
    emit("updateRow", { ...form }); // إرسال النموذج المحدث
};

// تحديث الحقل عند تغييره
const updateField = ({ field, value }) => {
    if (field === "roles") {
        form[`${field}_id`] = value.id; // تخزين role_id
        form[`${field}_name`] = value.name; // تخزين role_name
    } else {
        form[field] = value;
    }
};

// إغلاق النموذج
const closeModal = () => {
    isVisible.value = false;
    emit("close");
};
</script>

<template>
    <div v-for="(column, index) in columns" :key="index">
        <TextInput
            v-if="column.field !== 'id' && column.field !== 'roles' && !column.isAction"
            v-bind="{
                value: form[column.name],
                column: column
            }"
            @update="value => updateField({ field: column.name, value })"
        />
        <SelectInput
            v-if="column.field === 'roles'"
            v-bind="{
                value: form[`${column.field}_id`], // الربط مع role_id
                field: column.name,
                label: column.label,
                options: allRoles
            }"
            @update="value => updateField({ field: column.field, value })"
        />
    </div>
    <footer class="mt-4 flex justify-end space-x-2">
        <button @click="sendUpdatedRow" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Save
        </button>
        <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Close
        </button>
    </footer>
</template>
