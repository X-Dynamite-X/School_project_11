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

const emit = defineEmits(["updateRow"]);

const sendUpdatedRow = () => {
    emit("updateRow", updateRowValue.value);
};

const updateField = ({ field, value }) => {
    console.log(value);

    updateRowValue.value[field] = value.value; // تحديث القيم في updateRowValue
};
</script>

<template>
    <div v-for="(column, index) in columns" :key="index">
        <TextInput
            v-if="column.field !== 'id' && column.field !== 'roles' && !column.isAction"
            :value="updateRowValue[column.field]"
            :label="column.label || column.field"
            :field="column.label || column.field"
            @update="value => updateField({ field: column.field, value })"
        />

        <SelectInput
            v-if="column.field === 'roles'"
            :value="updateRowValue.roles[0]?.name"
            :field="column.label || column.field"
            :label="column.label || column.field"
            :options="allRoles"
            @update="value => updateField({ field: column.field, value })"
        />
    </div>
</template>
