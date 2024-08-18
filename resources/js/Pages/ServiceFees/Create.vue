<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
 
const form = useForm({
    min_amount: '',
    max_amount: '',
    fee: '',
});
</script>

<template>
    <Head title="Add Fee" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-white mt-4">
            <h3 class="text-2xl font-bold text-gray-800 text-center">Create Service Fee</h3>

            <form class="mt-4" @submit.prevent="form.post(route('service-fees.store'), { onSuccess: () => form.reset() })">
                <!-- Minimum amount -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Minimum Amount</span>
                    </div>
                    <input 
                        type="number"
                        step="1"
                        class="input input-bordered w-full !max-w-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-500 text-black" 
                        v-model="form.min_amount"
                    />
                </label>

                <!-- Maximum amount -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Maximum Amount</span>
                    </div>
                    <input 
                        type="number"
                        step="1"
                        class="input input-bordered w-full !max-w-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-500 text-black" 
                        v-model="form.max_amount"
                    />
                </label>

                <!-- Fee -->
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Fee</span>
                    </div>
                    <input 
                        type="number"
                        step="1"
                        class="input input-bordered w-full !max-w-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-500 text-black" 
                        v-model="form.fee"
                    />
                </label>

                <PrimaryButton class="mt-4">Save</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>