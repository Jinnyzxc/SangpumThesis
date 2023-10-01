<template>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="flex justify-center
                px-5 py-3">
                    <img src="./../assets/system/sangpum-logo.png" alt="">
                </div>
                <form method="post" @submit.prevent="submit">
                    <div class="px-5 py-3">
                        <h1 class="font-bold text-center text-2xl mb-5"> Add New Category </h1>
                        <span class=" flex justify-center text-center"></span>
                    </div>
                    <div class="px-5 py-3">
                        <input type="text" name="category-name" placeholder="Category Name" id="category-name" v-model="formInput.categoryname"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input type="text" name="category-description" placeholder="Category Description" id="category-description" v-model="formInput.categorydescription"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />                       
                        <button type="button" @click="submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">Submit
                        </button>
                    </div>
                    {{ result }}
                </form>
            </div>
        </div>
    </div>
</template>



<script>
import axios from 'axios';

export default {
    data() {
        return {
            formInput: {
                categoryname: '',
                categorydescription: '',
            },
            result: '',
            validationErrors: {},
        };
    },
    methods: {
        async submit() {
            try {
                const result = await axios.post('/api/category/add', this.formInput);
                if (result.data.status) {
                    localStorage.setItem('APP_DEMO_USER_TOKEN', result.data.token);
                    alert('Successfully Created');
                }
                this.result = result.data;
            } catch (ex) {
                if (ex.response && ex.response.data && ex.response.data.errors) {
                    this.validationErrors = ex.response.data.errors;
                    alert('Validation error: ' + Object.values(this.validationErrors).flat().join(', '));
                } else {
                    alert('An error occurred while creating the account.');
                }
            }
        },
    },
};
</script>
 