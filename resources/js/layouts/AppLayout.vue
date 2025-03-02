<script setup>

import { router, usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;

const logout = () => {
    router.post(route('logout'));
}
</script>

<template>
    <v-card>
        <v-layout>
            <v-navigation-drawer
                image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg"
                theme="dark"
                permanent
            >
                <v-list>
                    <v-list-item
                        prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
                        :subtitle="user.email"
                        :title="user.name"
                    ></v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list nav>
                    <v-list-item prepend-icon="mdi-email" title="Inbox" value="inbox"></v-list-item>
                    <v-list-item prepend-icon="mdi-account-supervisor-circle" title="Supervisors" value="supervisors"></v-list-item>
                    <v-list-item prepend-icon="mdi-clock-start" title="Clock-in" value="clockin"></v-list-item>
                </v-list>

                <template v-slot:append>
                    <v-btn
                        block
                        @click="logout"
                    >
                        Log out
                    </v-btn>
                </template>
            </v-navigation-drawer>
            <v-main>
                <slot/>
            </v-main>
        </v-layout>
    </v-card>
</template>
