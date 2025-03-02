<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import Datepicker from '@/pages/Components/Datepicker.vue';

const emit = defineEmits(['close']);

const user = usePage().props.auth.user;

// eslint-disable-next-line @typescript-eslint/no-unused-vars
const props = defineProps({
    categories: {
        type: Object
    }
});

const form = useForm({
    user_id: user.id,
    category_id: null,
    amount: null,
    description: null,
    date: null,
    recurring: false
});

const submit = () => {
    form.post(route('income.store'), {
        onSuccess: () => {
            emit('close');
        }
    });
};
</script>

<template>
    <form @submit.prevent="submit">
        <v-card class="elevation-3">
            <v-card-title class="bg-blue-lighten-1">
                Add New Income

                <v-btn
                    class="float-right"
                    density="compact"
                    variant="text"
                    icon="mdi-close-circle"
                    @click="emit('close')"
                />
            </v-card-title>
        </v-card>
    </form>
</template>
