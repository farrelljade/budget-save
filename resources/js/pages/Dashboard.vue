<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineAsyncComponent, ref } from 'vue';

const AddNewExpenseDialogComponent = defineAsyncComponent(() =>
    import('@/pages/Components/AddNewExpenseDialog.vue')
);

const props = defineProps({
    userIncomes: {
        type: Object
    },
    userExpenses: {
        type: Object
    }
});

const addNewExpenseDialog = ref(false);
const openExpensesDialog = () => {
    addNewExpenseDialog.value = true;
}

</script>

<template>
    <AppLayout>
    <Head title="Dashboard" />

    <v-container fluid>
        <v-card class="mb-3 pa-1">
            <v-card-title class="bg-blue-lighten-1">
                Income and Expenses

                <v-btn
                    class="float-right"
                    prepend-icon="mdi-plus"
                    color="red-lighten-1"
                    @click="openExpensesDialog"
                >
                    Expense
                </v-btn>
                <v-btn
                    class="float-right mr-2"
                    prepend-icon="mdi-plus"
                    color="green-lighten-1"
                >
                    Income
                </v-btn>
            </v-card-title>
            <v-table>
                <thead>
                <tr>
                    <th class="text-left">
                        Description
                    </th>
                    <th class="text-left">
                        Amount
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="item in userExpenses"
                    :key="item.id"
                >
                    <td>{{ item.description }}</td>
                    <td>£{{ item.amount }}</td>
                </tr>
                </tbody>
            </v-table>
        </v-card>
    </v-container>

    <v-dialog
        v-model="addNewExpenseDialog"
        width="50vw"
        persistent
    >
        <add-new-expense-dialog-component
            @close="addNewExpenseDialog = false"
        />
    </v-dialog>
    </AppLayout>
</template>
