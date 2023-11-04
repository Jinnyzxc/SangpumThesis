<template>
    <div class="min-h-screen bg-gradient-to-tl from-slate-600 to-emerald-400  flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="flex justify-center
                px-5 py-3">
                    <img src="./../../assets/system/sangpum-logo.png" alt="">
                </div>
                <button @click="backPreviousPage()">
                    back
                </button>
                <form method="post" @submit.prevent="submit" action="" class="no-line">
                    <div class="px-5 py-3">
                        <h1 class="font-bold text-center text-2xl mb-5"> {{ title }} </h1>
                    </div>
                    <div class="">
                        <div class="item-center" v-for="(field, fieldKey) in fields" key="field">
                            <div v-show="currencyPageField.indexOf(field.fieldCode) > -1" class="px-2 m-2">
                                <label :for="field.fieldCode"> {{ field.properties.label }}</label>
                                <input :name="field.fieldCode" :type="field.properties.type"
                                    v-model="dataForm[field.fieldCode]" :placeholder="field.properties.placeholder"
                                    :id="field.fieldCode" class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full"
                                    @input="validateInput(field.fieldCode, dataForm[field.fieldCode], field.properties.type)"
                                    @keydown="handleKeydown($event, field.fieldCode)" required />
                                <span class="text-red-600">{{ fieldErrors[field.fieldCode] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3">
                        <button v-if="currentPage !== 3" type="button" @click="next()"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Next</span>
                        </button>
                        <button v-if="currentPage === 3" type="button" @click="submit()"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import signupConfig from '../../js/config/signupConfig'

const currentDate = new Date();

export default {
    data() {
        return {
            title: "Personal Information",
            fields: signupConfig.buyerConfig.signupFields,
            buyerField: signupConfig.buyerConfig.buyerField,
            dataForm: signupConfig.buyerConfig.dataForm,
            currentPage: 1,
            fieldErrors: {},
            minMaxValidation: signupConfig.sellerConfig.minMaxValidation
        }
    },
    computed: {
        currencyPageField() {
            if (this.currentPage === 2) {
                return this.buyerField.secondPersonalIn;
            }
            if (this.currentPage === 3) {
                this.title = 'Address & Billing'
                return this.buyerField.addressBilling;
            }
            return this.buyerField.firstPersonalInfo;
        },
    },
    methods: {
        handleKeydown(event, fieldCode) {
            const allowedKeys = signupConfig.allowKeys
            const fieldNumberType = signupConfig.fieldNumberType
            if (!allowedKeys.includes(event.key) && fieldNumberType.includes(fieldCode)) {
                event.preventDefault(); // Prevent input of non-numeric keys
            }
        },
        validateInput(fieldCode, fieldInput, feildType) {
            if (feildType === 'file') {
                this.validateFile(fieldCode, fieldInput)
            }
            if (fieldCode === 'birthDate') {
                this.validateBirthday(fieldCode, fieldInput)
            }
            if (feildType === 'text') {
                this.validateMinMax(fieldCode, fieldInput)
            }
        },
        validateMinMax(fieldCode, fieldInput) {
            var data = this.minMaxValidation[fieldCode]
            if (fieldInput.length < data.minChar) {
                this.fieldErrors[fieldCode] = data.minCharValidationMessage
            }
            else if (fieldInput.length > data.maxChar) {
                this.fieldErrors[fieldCode] = data.maxCharValidationMessage
            }
            else {
                this.fieldErrors[fieldCode] = ''
            }
        },
        validateBirthday(fieldCode, birthdate) {
            if (this.is15YearsOld(birthdate) <= 14) {
                this.fieldErrors[fieldCode] = "Minimum age required (15 years)"
            } else {
                this.fieldErrors[fieldCode] = ''
            }
        },
        is15YearsOld(birthdate) {
            const birthDate = new Date(birthdate);
            let age = currentDate.getFullYear() - birthDate.getFullYear();
            const currentMonth = currentDate.getMonth();
            const birthMonth = birthDate.getMonth();
            if (
                currentMonth < birthMonth ||
                (currentMonth === birthMonth &&
                    currentDate.getDate() < birthDate.getDate())
            ) {
                age--;
            }
            return age;
        },
        validateFile(fieldCode, fieldInput) {
            if (!!fieldInput) {
                this.fieldErrors[fieldCode] = ''
            }
        },
        hasNonFieldErrors() {
            for (let key in this.fieldErrors) {
                if (this.fieldErrors.hasOwnProperty(key) && this.fieldErrors[key] !== '') {
                    return false;
                }
            }
            return true;
        },
        backPreviousPage() {
            this.currentPage -= 1;
        },
        validateData() {
            for (var key in this.dataForm) {
                let value = this.dataForm[key];
                if (this.currencyPageField.indexOf(key) > -1 && value == '') {
                    this.fieldErrors[key] = 'This field is required'
                }
            }
        },
        hasAlreadyData() {
            for (let key in this.dataForm) {
                if (this.currencyPageField.indexOf(key) > -1 &&
                    this.dataForm.hasOwnProperty(key) &&
                    this.dataForm[key] === '') {
                    return false;
                }
            }
            return true;
        },
        next() {
            this.validateData()
            if (this.hasNonFieldErrors()) {
                this.currentPage += 1;
            }
        },
        async submit() {
            this.validateData()
            const commonSignupData = JSON.parse(localStorage.getItem('commonSignupData'))
            const param = {...this.dataForm, ...commonSignupData}
            if (this.currentPage === 3) {
                try {
                    const result = await axios.post('/api/buyer/add', param);
                    if (result.data.status) {
                        alert('Account Successfully Created');
                        this.$router.push('/login');
                    }
                }
                catch (ex) {
                    if (ex.response && ex.response.data && ex.response.data.errors) {
                        this.validationErrors = ex.response.data.errors;
                        alert('Validation error: ' + Object.values(this.validationErrors).flat().join(', '));
                    } else {
                        alert('An error occurred while creating the account.');
                    }
                }
            }
        }
    }
}
</script>