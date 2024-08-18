<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
 
const form = useForm({
    mobile_number: '',
    service_type: '',
    amount: '',
    service_fee: '',
    balance: '',
});

const limitInputTo11Digits = () => {
    if (form.mobile_number.length > 11) {
        form.mobile_number = form.mobile_number.slice(0, 11);
    }
};
</script>

<template>
    <Head title="Create Transaction" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-white mt-4">
            <h3 class="text-2xl font-bold text-gray-800 text-center">Transaction Registration</h3>
            <form class="mt-4" @submit.prevent="form.post(route('transactions.store'), { onSuccess: () => form.reset() })">
                <!-- Mobile number -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Mobile Number</span>
                    </div>
                    <input 
                        type="text" 
                        placeholder="09123456789" 
                        class="input input-bordered w-full !max-w-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-500 text-black" 
                        v-model="form.mobile_number"
                        @input="limitInputTo11Digits"
                    />
                </label>

                <!-- Service Type -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Service Type</span>
                    </div>
                    <select class="select select-bordered bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-500 text-black" v-model="form.service_type" >
                        <option value="" selected>Pick one</option>
                        <option value="1">Cash-in</option>
                        <option value="2">Cash-out</option>
                        <option value="3">Load</option>
                    </select>
                </label>

                <!-- Amount -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Amount</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full !max-w-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-500 text-black" v-model="form.amount"  />
                </label>

                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Register</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>

</template>