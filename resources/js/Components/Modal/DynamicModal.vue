<script setup>
    import { ref, defineEmits, defineProps } from "vue";
    defineProps({
        title: { type: String, default: "title" },
        confirmAction: { type: Function, default: null },
        style:{type:String,default:null},
        nameRouteModel:{type:String,default:null},
        titleModel:{type:String,default:null},
    });
    const emit = defineEmits(["close", "confirmAction"]);
    const isVisible = ref(true);
    const closeModal = () => {
        isVisible.value = false;
        emit("close");
    };

</script>
<template>
    <div v-if="isVisible" class="fixed  inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-all">
        <div :class="[style &&nameRouteModel && title==='info' ? style:'max-w-lg  w-full ']" class="bg-white dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg p-6 border border-gray-300 dark:border-gray-700">
            <!-- Header -->
            <header class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 pb-2 mb-4">
                <h2 class="text-lg font-semibold m-auto"> {{ titleModel ? titleModel : title }} </h2>
                <button @click="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
            </header>
            <!-- Content -->
            <main class="space-y-4">
                <slot name="content" />
            </main>
         </div>
         {{ titleModel }}
    </div>
</template>
