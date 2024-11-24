<script setup>
import { ref, reactive, onMounted } from "vue";
import TextInput from "@/Components/Form/TextInput.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";

const props = defineProps({
    row: { type: Object, required: true },
    columns: { type: Array, required: true },
    allRoles: { type: Array, required: true },
    formFeld: { type: Array, required: true },

});

const emit = defineEmits(["close", "updateRow"]);

// نموذج البيانات
const form = reactive({ ...props.row });
const isVisible = ref(true);

// تجهيز النموذج عند التحميل
onMounted(() => {
    props.formFeld.forEach((column) => {
        if (column.name) {
            form[column.name] = ""; // تعيين القيم الافتراضية
        }
    });
});

 const sendCreateRow = () => {
    const sanitizedData = JSON.parse(JSON.stringify(form));

    emit("createRow", form);
};

const updateField = ({ field, value }) => {
    if (field === "roles") {
        if (!Array.isArray(form.roles)) {
            form.roles = []; // تأكد أن الحقل `roles` هو مصفوفة
        }
        form.roles.push(value); // إضافة العنصر الجديد إلى المصفوفة
    } else {
        form[field] = value.value; // تحديث الحقول الأخرى
    }
};


// إغلاق النموذج
const closeModal = () => {
    isVisible.value = false;
    emit("close");
};
</script>

<template>
    <div v-for="(column, index) in formFeld" :key="index">
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
                multiple: column.multiple,
                options: allRoles
            }"
            @update="value => updateField({ field: column.field, value })"
        />
    </div>
    <footer class="mt-4 flex justify-end space-x-2">
        <button @click="sendCreateRow" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Save
        </button>
        <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Close
        </button>
    </footer>
</template>
