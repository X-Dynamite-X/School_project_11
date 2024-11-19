<script setup>
import { ref ,reactive, onMounted} from "vue";
import TextInput from "@/Components/Form/TextInput.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";
// import { router } from '@inertiajs/vue3'

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
const form = reactive({});

onMounted(() => {
  // ملء form باستخدام البيانات الموجودة في row وفقًا للأعمدة (columns)
  props.columns.forEach((column) => {
    if (column.name && props.row[column.name] !== undefined) {
      form[column.name] = props.row[column.name];
    }
  });
});


const updateRowValue = ref({ ...props.row });

const emit = defineEmits(["updateRow"]);

const sendUpdatedRow = () => {
    emit("updateRow", updateRowValue.value);
};

// دالة لتحديث القيم في النموذج
const updateField = ({ field, value }) => {
  form[field] = value; // تحديث قيمة الحقل في الـ form
  console.log(form); // طباعة الشكل النهائي للنموذج بعد التحديث
};


</script>

<template>
    <div v-for="(column, index) in columns" :key="index">
        <TextInput
            v-if="column.field !== 'id' && column.field !== 'roles' && !column.isAction"
            :value="updateRowValue[column.field]"
            :column="column"
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
