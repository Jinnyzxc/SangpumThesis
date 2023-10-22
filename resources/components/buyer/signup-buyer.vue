<template>
    <div class="min-h-screen bg-gradient-to-tl from-slate-600 to-emerald-400  flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="flex justify-center
                px-5 py-3">
                    <img src="./../../assets/system/sangpum-logo.png" alt="">
                </div>
                <button v-if="!pages.zeroPage" @click="backPreviousPage(pages)">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                    </svg>
                </button>
                <form method="post" @submit.prevent="submit" action="" class="no-line">
                    <div class="px-5 py-3">
                        <h1 class="font-bold text-center text-2xl mb-5"> {{ title }} </h1>
                    </div>
                    <div v-if="pages.firstPage">
                        <div class="px-5 py-3" v-for="field in fields">
                            <input :name="field.fieldCode" :type="field.properties.type"
                                v-model="buyerInfo.firstPageData.firstName" :placeholder="field.properties.placeholder"
                                :id="field.fieldCode" class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full"
                                required />
                        </div>
                        <div class="px-5 py-3">
                            <button type="button" @click="nextThirdPage()"
                                class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                                <span class="inline-block mr-2">Next</span>
                            </button>
                        </div>
                    </div>
                    <div v-if="pages.secondPage">
                        <div class="px-5 py-3">
                            <input name="nickName" type="text" v-model="buyerInfo.secondPageData.nickname"
                                placeholder="What is your Nickname?" id="username"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input name="zodiacSign" type="text" v-model="buyerInfo.secondPageData.zodiacSign"
                                placeholder="What is your astrological sign?" id="password"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input name="kpopGroup" type="text" v-model="buyerInfo.secondPageData.kpopGroup"
                                placeholder="What is your favorite k-pop group?" id="username"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input name="kpopBias" type="date" v-model="buyerInfo.secondPageData.kpopBias"
                                placeholder="Who is your first k-pop bias?" id="password"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        </div>
                    </div>
                    <div v-if="pages.thirdPage">
                        <div class="px-5 py-3">
                            <input name="address" type="text" v-model="buyerInfo.thirdPageData.personalInfoAddress"
                                placeholder="Address" id="username"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input name="zipCode" type="text" v-model="buyerInfo.thirdPageData.zipCode"
                                placeholder="BRGY / ZIP code" id="password"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input name="accountNumber" v-model="buyerInfo.thirdPageData.bankAccNum" type="text"
                                placeholder="Bank /E-wallet Account No." id="username"
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input name="bday" type="text" placeholder="Type of Govt. ID" v-model="combine_id" id=""
                                class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                            <input id="fileUpload" type="file" required>
                            <button @click="chooseFiles()">
                                <div class="w-64 h-8 relative">
                                    <div class="w-64 h-8 left-0 top-0 absolute bg-gray-200 rounded-3xl"></div>
                                    <div
                                        class="w-36 h-3 left-[46px] top-[10px] absolute text-center text-slate-800 text-xs font-normal font-['Montserrat']">
                                        {{ buyerInfo.govermentId2 }} </div>
                                    <div class="w-4 h-3.5 left-[18.79px] top-[8px] absolute">
                                        <div class="opacity-40 w-1 h-1 left-[4.25px] top-[6.72px] absolute">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <input id="fileUpload2" type="file" required>
                            <button @click="chooseFiles2()">
                                <div class="w-64 h-8 relative">
                                    <div class="w-64 h-8 left-0 top-0 absolute bg-gray-200 rounded-3xl"></div>
                                    <div
                                        class="w-36 h-3 left-[46px] top-[10px] absolute text-center text-slate-800 text-xs font-normal font-['Montserrat']">
                                        {{ buyerInfo.govermentId1 }}</div>
                                    <div class="w-4 h-3.5 left-[18.79px] top-[8px] absolute">
                                        <div class="opacity-40 w-1 h-1 left-[4.25px] top-[6.72px] absolute">
                                        </div>
                                    </div>
                                </div>
                            </button>
                            <button type="button" @click="submit"
                                class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                                <span class="inline-block mr-2">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import signupConfig from '../../js/config/signupConfig'

export default {
    data() {
        return {
            title: "Personal Information",
            fields: signupConfig.buyerConfig.signupFields,
            dataForm: signupConfig.buyerConfig.dataForm
        }
    },
    watch() {

    },
    computed: {
        commonSignUpData() {
            return vuex.state.commonSignUpData
        }
    },
    methods: {
        chooseFiles() {
            this.buyerInfo.govermentId1 = document.getElementById("fileUpload").click()
        },
        chooseFiles2() {
            this.buyerInfo.govermentId2 = document.getElementById("fileUpload2").click()
        },
        nextSecondPage() {
            console.log('hello')
            var items = this.buyerInfo.zeroPageData
            let hasNullValue = this.checkIfFeildWithNull(items)

            if (!hasNullValue) {
                this.pages.zeroPage = false
                this.pages.firstPage = true
            }
            else {
                alert('You need to fill inputs fields ')
            }
        },
        nextThirdPage() {
            this.title = 'Personal Information'
            var items = this.buyerInfo.firstPageData
            let hasNullValue = this.checkIfFeildWithNull(items)

            if (!hasNullValue) {
                this.pages.firstPage = false
                this.pages.secondPage = true
            }
            else {
                alert('You need to fill inputs fields ')
            }
        },
        nextFourthPage() {
            this.title = 'Biiling'
            var items = this.buyerInfo.secondPageData
            let hasNullValue = this.checkIfFeildWithNull(items)

            if (!hasNullValue) {
                this.pages.secondPage = false
                this.pages.thirdPage = true
            }
            else {
                alert('You need to fill inputs fields ')
            }
        },
        checkIfFeildWithNull(items) {
            for (const key in items) {
                if (items.hasOwnProperty(key) && (items[key] === null || typeof items[key] === 'undefined')) {
                    return true;
                }
            }
            return false;
        },
        backPreviousPage(pages) {
            // Find the page with a value of true

            Object.keys(myObject).forEach((key, value) => {

                console.log(key, value);
            });
            for (const key in pages) {
                if (pages.hasOwnProperty(key)) {
                    if (pages[key] === true) {
                        previousPage = key;
                        pages[key] = false;
                    } else {
                        currentPage = key;
                    }
                }
            }

            // Set the previous page to true
            pages[previousPage] = true;
        },
        async submit() {
            let params = { ...this.commonSignUpData, ...this.buyerInfo }
            try {
                const result = await axios.post('/api/buyer/add', params);
                if (result.data.status) {
                    alert('Successfully Created');
                    vuex.dispatch('setUserIdentifier', this.commonSignUpData.user_type)
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
</script>