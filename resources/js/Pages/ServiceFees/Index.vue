<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, usePage } from '@inertiajs/vue3';

defineProps(['serviceFees']);

const { props } = usePage();
const flashMessage = ref(props.flash ? props.flash.success : '');
</script>

<template>
    <Head title="Service Fees" />

    <!-- Flash message -->
    <div v-if="flashMessage" class="alert alert-success">
        {{ flashMessage }}
    </div>

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1 class="text-3xl font-bold text-center text-gray-600 mt-7">Service Fees</h1>

                    <div class="flex justify-end w-[98%]">
                        <a :href="route('service-fees.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Add Fee
                        </a>
                    </div>

                    <div class="flex justify-center items-center mb-7">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-[95%]">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Min Amount</th>
                                        <th scope="col" class="px-6 py-3">Max Amount</th>
                                        <th scope="col" class="px-6 py-3">Fee</th>
                                        <th scope="col" class="px-6 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="service_fee in serviceFees" :key="service_fee.id"
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                                    >
                                        <td class="px-6 py-4">
                                            {{ service_fee.min_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ service_fee.max_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ service_fee.fee }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>