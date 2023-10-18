<template>
    <div class="min-h-screen bg-gradient-to-tl from-slate-600 to-emerald-400  flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-7xl ">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="px-5 py-5">
                    <ol class="flex items-center justify-center pl-28">
                        <li class="relative w-full grid grid-cols-4 pl-28">
                            <div class="flex items-center " v-for="(step, index) in signUpSteps" key="index">
                                <div v-if="stepFunc(index) === true"
                                    class="z-10 flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-900 shrink-0">
                                    <svg class="w-2.5 h-2.5 text-blue-100 dark:text-blue-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                    </svg>
                                </div>
                                <div v-if="stepFunc(index) === false"
                                    class="z-10 flex items-center justify-center w-6 h-6 bg-gray-200 rounded-full ring-0 ring-white dark:bg-gray-700 sm:ring-8 dark:ring-gray-900 shrink-0">
                                    <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                    </svg>
                                </div>
                                <div v-if="index < 3" class=" flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                            </div>
                        </li>
                    </ol>
                </div>
                <button v-if="currentPage !== 1" @click="back()"><span><font-awesome-icon :icon="['fas', 'arrow-left']" />
                        back</span></button>
                <form method="post" @submit.prevent="submit()" class="m-8">
                    <h1><span class="m-10 flex justify-center text-center"> {{ title }} </span> </h1>
                    <div class="flex justify-center grid grid-cols-2">
                        <div class="items-center " v-for="(field, fieldKey) in fields">
                            <div v-show="currencyPageField.indexOf(field.fieldCode) > -1" class="px-2 m-2">
                                <input :type="field.properties.type" :id="field.fieldCode"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="dataForm[field.fieldCode]" :minlength="field.properties.minChar"
                                    :maxlength="field.properties.maxChar" :placeholder="field.properties.placeholder"
                                    required>
                                <span>{{ fieldErrors[field.fieldCode] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="m-6 py-5">
                        <button v-if="currentPage !== 4" type="button" @click="next()"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            Next</button>
                        <input v-if="currentPage === 4" type="submit" @click="submit()" value="Submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios';
import signupConfig from '../../js/config/signupConfig'

export default {
    data() {
        return {
            title: "Personal Information",
            fields: signupConfig.sellerConfig.signupFields,
            signUpSteps: signupConfig.sellerConfig.signupSteps,
            currentPage: 1,
            sellerField: signupConfig.sellerConfig.sellerField,
            dataForm: {},
            fieldErrors: {},
            formattedData: [],
            validatedData: []
        };
    },
    created() {
    },
    computed: {
        currencyPageField() {
            if (this.currentPage === 2) {
                return this.sellerField.personalInfo.secondPersonalIn;
            }
            if (this.currentPage === 3) {
                return this.sellerField.shopInfo;
            }
            if (this.currentPage === 4) {
                return this.sellerField.credentials;
            }
            return this.sellerField.personalInfo.firstPersonalInfo;
        },
    },
    watch: {
        
    },
    methods: {
        formatData() {
           
        },
        validateData() {
            console.log(this.dataForm)
            console.log(test.length)
            console.log(this.currencyPageField.length)

            if( Object.key(this.dataForm).length !== this.currencyPageField.length)
            {
                console.log("There is field that is not filled up")
            }
            else {
                console.log("Complete Filled Field")
            }
            for (const data in this.formattedData) {
                if (data.data === '') {
                    var prop = data.propField
                    console.log("This field "+ {prop} +"is required")
                }
            }
        },
        stepFunc(index, currentPageFilled) {
            if (index == 1) {
                this.signUpSteps[index] = true;
                return true;
            }
            if (index == 0) {
                this.signUpSteps[index] = true;
                return true;
            }
            return false;
        },
        async submit() {
            if (this.validatedData.length === this.currencyPageField.length) {
                this.currentPage += 1;
            }
            if (this.currentPage === 5) {
                console.log(this.formattedData);
                try {
                    const response = await axios.post('/api/signup/seller', this.formattedData);
                    if (response.status === 200 && response.data.status === true) {
                        localStorage.setItem('APP_DEMO_USER_TOKEN', response.data.token);
                        alert('Successfuly Login')
                        this.$router.push(response.url); // Use the named route
                    } else {
                        // Authentication failed, handle error
                        alert(response.data.error_data[0]);
                    }
                } catch (ex) {
                    alert('An error occurred while logging in.');
                }
            }
        },
        back() {
            this.currentPage -= 1;
        },
        next() {
            this.formatData()
            this.validateData()
            this.currentPage += 1;
        }
    },
}
</script>