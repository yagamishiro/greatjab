<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head, usePage } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import ServiceTypes from '../../enums/ServiceTypes';

defineProps(['transactions']);

const { props } = usePage();
const flashMessage = ref(props.flash ? props.flash.success : '');

const getServiceTypeText = (type) => {
    switch (type) {
        case ServiceTypes.CASH_IN.value:
            return ServiceTypes.CASH_IN.text;
        case ServiceTypes.CASH_OUT.value:
            return ServiceTypes.CASH_OUT.text;
        case ServiceTypes.LOAD.value:
            return ServiceTypes.LOAD.text;
        default:
            return 'Unknown';
    }
};
</script>

<template>
    <Head title="Transactions" />

    <!-- Flash message -->
    <div v-if="flashMessage" class="alert alert-success">
        {{ flashMessage }}
    </div>

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <h3 class="text-3xl font-bold text-gray-600 text-center mt-7">Transaction List</h3>

                    <br>
                    <div class="flex justify-end w-[98%]">
                        <a :href="route('transactions.create')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            New Transaction
                        </a>
                    </div>
                    <div class="flex justify-center items-center mb-7">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-[95%]"> 
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Transaction Date
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Mobile Number
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Service Type
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Amount
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Service Fee
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Net Amount
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Balance
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="transaction in transactions" :key="transaction.id"
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                                    >
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ dayjs(transaction.created_at).format('MMMM D, YYYY (dddd)') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ transaction.mobile_number }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ getServiceTypeText(transaction.service_type) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ transaction.amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ transaction.service_fee }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ transaction.net_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ transaction.balance }}
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