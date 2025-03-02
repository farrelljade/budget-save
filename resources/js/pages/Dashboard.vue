<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed, defineAsyncComponent, ref } from 'vue';
import { format } from 'date-fns';

const AddNewExpenseDialogComponent = defineAsyncComponent(() =>
    import('@/pages/Components/AddNewExpenseDialog.vue')
);
const AddNewIncomeDialogComponent = defineAsyncComponent(() =>
    import('@/pages/Components/AddNewIncomeDialog.vue')
);

const props = defineProps({
    userIncomes: {
        type: Object
    },
    userExpenses: {
        type: Object
    },
    categories: {
        type: Object
    }
});

const totalExpenses = computed(() => {
    if (!props.userExpenses || !props.userExpenses.length) return 0;

   return props.userExpenses.reduce((sum, expense) => {
       return sum + parseFloat(expense.amount);
   }, 0).toFixed(2);
});

const addNewExpenseDialog = ref(false);
const openAddNewExpensesDialog = () => {
    addNewExpenseDialog.value = true;
}

const addNewIncomeDialog = ref(false);
const openAddNewIncomeDialog = () => {
    addNewIncomeDialog.value = true;
}

const formatDate = (date) => {
    return format(new Date(date), 'MMMM d, yyyy')
}

</script>

<template>
    <AppLayout>
    <Head title="Dashboard" />

    <v-container fluid>
        <v-row class="mb-4">
            <v-col cols="12" md="4">
                <v-sheet
                    elevation="4"
                    color="primary"
                    rounded
                >
                    <v-card-title>Current Balance</v-card-title>
                    <v-card-text>
                        <div class="text-h5 font-weight-black">£2,540.65</div>
                        <div class="text-caption mt-2">Last updated: Today</div>
                    </v-card-text>
                </v-sheet>
            </v-col>
            <v-col cols="12" md="4">
                <v-sheet
                    elevation="4"
                    color="success"
                    rounded
                >
                    <v-card-title>Month's Income</v-card-title>
                    <v-card-text>
                        <div class="text-h5 font-weight-bold">£3,450.00</div>
                        <div class="d-flex align-center text-caption mt-2">
                            <v-icon size="small" class="mr-1">mdi-arrow-up</v-icon>
                            <span>12% from last month</span>
                        </div>
                    </v-card-text>
                </v-sheet>
            </v-col>
            <v-col cols="12" md="4">
                <v-sheet
                    elevation="4"
                    color="red"
                    rounded
                >
                    <v-card-title>Month's Expenses</v-card-title>
                    <v-card-text>
                        <div class="text-h5 font-weight-bold">£{{ totalExpenses }}</div>
                        <div class="d-flex align-center text-caption mt-2">
                            <v-icon size="small" class="mr-1">mdi-arrow-down</v-icon>
                            <span>8% from last month</span>
                        </div>
                    </v-card-text>
                </v-sheet>
            </v-col>
        </v-row>

        <v-card class="mb-3">
            <v-card-title class="bg-blue-lighten-1">
                Income and Expenses

                <v-btn
                    class="float-right"
                    prepend-icon="mdi-plus"
                    color="red-lighten-1"
                    @click="openAddNewExpensesDialog"
                >
                    Expense
                </v-btn>
                <v-btn
                    class="float-right mr-2"
                    prepend-icon="mdi-plus"
                    color="green-lighten-1"
                    @click="openAddNewIncomeDialog"
                >
                    Income
                </v-btn>
            </v-card-title>
            <v-table>
                <thead>
                <tr>
                    <th class="text-left">
                        Category
                    </th>
                    <th class="text-left">
                        Description
                    </th>
                    <th class="text-left">
                        Amount
                    </th>
                    <th class="text-left">
                        Date
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="item in userExpenses"
                    :key="item?.id"
                >
                    <td>{{ item?.category.name }}</td>
                    <td>{{ item?.description }}</td>
                    <td>£{{ item?.amount }}</td>
                    <td>{{ formatDate(item?.date) }}</td>
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
            :categories="categories"
            @close="addNewExpenseDialog = false"
        />
    </v-dialog>

    <v-dialog
        v-model="addNewIncomeDialog"
        width="50vw"
        persistent
    >
        <add-new-income-dialog-component
            :categories="categories"
            @close="addNewIncomeDialog = false"
        />
    </v-dialog>
    </AppLayout>
</template>
