<script setup lang="ts">
import {useForm} from '@inertiajs/vue3';
import Datepicker from '@/pages/Components/Datepicker.vue';

const emit = defineEmits(['close']);

const form = useForm({
    user_id: null,
    category_id: null,
    vendor_id: null,
    amount: null,
    description: null,
    date: null,
    recurring: null
});
</script>

<template>
    <form @submit.prevent="submit">
        <v-card class="elevation-3">
            <v-card-title class="bg-blue-lighten-1">
                Add New Expense

                <v-btn
                    class="float-right"
                    density="compact"
                    variant="text"
                    icon="mdi-close-circle"
                    @click="emit('close')"
                />
            </v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12">
                        <v-card-subtitle>Transaction Details</v-card-subtitle>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <datepicker
                            label="Date"
                            :input-date="form.date"
                            @date-updated="form.date = $event"
                        />
                    </v-col>
                    <v-col cols="12" sm="6">
                        <v-autocomplete
                            v-model="form.category_id"
                            label="Category"
                            variant="underlined"

                        />
                    </v-col>
                    <v-col cols="12" sm="5">
                        <v-text-field
                            v-model="form.amount"
                            label="Amount"
                            variant="underlined"
                            prefix="£"
                            type="number"
                        />
                    </v-col>
                    <v-col cols="12" sm="7">
                        <v-text-field
                            v-model="form.description"
                            label="Description"
                            variant="underlined"
                        />
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    variant="tonal"
                    color="error"
                    prepend-icon="mdi-close"
                    text="Cancel"
                    @click="emit('close')"
                />
                <v-spacer/>
                <v-btn
                    variant="tonal"
                    color="success"
                    prepend-icon="mdi-check"
                    text="Add Expense"
                    @click="submit"
                    :loading="form.processing"
                />
            </v-card-actions>
        </v-card>
    </form>
</template>
