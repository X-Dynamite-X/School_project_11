<script setup>
import { ref } from "vue";
import TextInput from "@/Components/Form/TextInput.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";

const props = defineProps({
    row: {
        type: Object,
        required: true,
    },
    columns: {
        type: Array,
        required: true,
    },
    allRoles: {
        type: Array,
        required: true,
    },
});

const updateRowValue = ref({ ...props.row });

const updateField = (field, value) => {
    updateRowValue.value[field] = value;
};

// إرسال البيانات المعدلة للمكون الأب عند الطلب
const emit = defineEmits(["updateRow"]);
const sendUpdatedRow = () => {
    emit("updateRow", updateRowValue.value);
};
</script>

<template>
    <div v-for="(column, index) in columns" :key="index">
        <TextInput
            v-if="column.field !== 'id' && column.field !== 'roles' && !column.isAction"
            :value="updateRowValue[column.field]"
            :label="column.label || column.field"
            @update="updateField(column.field, $event)"
        />

        <SelectInput
            v-if="column.field === 'roles'"
            :value="updateRowValue.roles[0]?.name"
            :label="column.label || column.field"
            :options="allRoles"
            @update="updateField(column.field, $event)"
        />
    </div>
</template>
