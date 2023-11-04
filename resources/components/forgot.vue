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
                        <h1 class="font-bold text-center text-2xl mb-5"> Forgot Password </h1>
                        <p class="text-center mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Remember your password?
                            <a class="text-blue-600 decoration-2 hover:underline font-medium" href="/login">
                                Login here
                            </a>
                        </p>
                    </div>
                    <div class="px-5 py-3">
                        <input name="email" type="text" placeholder="Email" id="email" v-model="formInput.email"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <button type="button" @click="submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Reset password</span>
                        </button>
                    </div>
                    {{ result }}
                </form>
            </div>
        </div>
    </div>
</template>

<script >
import axios from 'axios';

export default {
    data() {
        return {
            formInput: {
                email: ''
            },
            errorMessage: ''
        }
    },
    methods: {
        async submit() {
            try {
                const response = await axios.post('/api/auth/login', this.formInput);
                if (response.status === 200 && response.data.status === true) {
                    localStorage.setItem('APP_DEMO_USER_TOKEN', response.data.token);
                    alert('Reset Password sent to your Email')
                    this.$router.push({ name: 'reset' }); // Use the named route
                } else {
                    // Authentication failed, handle error
                    alert(response.data.error_data[0]);
                }
            } catch (ex) {
                // Handle other errors here
                alert('An error occurred while logging in.');
            }
        }
    }
}
</script>