<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['transaction']);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg !h-[500px]">
                    <div class="card bg-gray-50 w-96 shadow-xl mx-auto mt-4">
                        <div class="card-body">
                            <h2 class="card-title text-2xl text-black">Balance</h2>
                            <p class="text-black">{{ transaction.balance }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
