<script setup>
import { ref, defineEmits, defineProps } from "vue";

defineProps({
    title: { type: String, default: "title" },
    confirmAction: { type: Function, default: null }
});

const emit = defineEmits(["close", "confirmAction"]);

const isVisible = ref(true);

const closeModal = () => {
    isVisible.value = false;
    emit("close");
};

const confirmActionModel = () => {
    if (typeof confirmAction === "function") {
        emit("confirmAction");
    }
};
</script>

<template>
    <div v-if="isVisible" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-all">
        <div class="bg-white dark:bg-gray-800 dark:text-gray-200 rounded-lg shadow-lg p-6 max-w-lg w-full border border-gray-300 dark:border-gray-700">
            <!-- Header -->
            <header class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 pb-2 mb-4">
                <h2 class="text-lg font-semibold m-auto">{{ title }}</h2>
                <button @click="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
            </header>

            <!-- Content -->
            <main class="space-y-4">
                <slot name="content" />
            </main>

            <!-- Footer -->
            <!-- <footer class="mt-4 flex justify-end space-x-2">
                <button @click="confirmActionModel" v-if="title === 'edit'" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Save
                </button>
                <button @click="confirmActionModel" v-if="title === 'delete'" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Delete
                </button>
                <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Close
                </button>
            </footer> -->
        </div>
    </div>
</template>
