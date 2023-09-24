<template>
    <div class="min-h-screen bg-gradient-to-tl from-slate-600 to-emerald-400  flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="flex justify-center
                px-5 py-3">
                    <img src="./../assets/system/sangpum-logo.png" alt="">
                </div>
                <form method="post" @submit.prevent="submit">
                    <div class="px-5 py-3">
                        <h1 class="font-bold text-center text-2xl mb-5"> Login </h1>
                        <span class=" flex justify-center text-center"> as  {{ userIdentifier }} </span>
                    </div>
                    <div class="px-5 py-3">
                        <input name ="username" type="text" placeholder="Username"  id="username" v-model="formInput.username"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required/>
                        <input name = "password" type="password" placeholder="Password" id="password" v-model="formInput.password"
                             class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <div class="py-2 flex gap-2">
                            <div class="flex flex-row gap-8">
                                <div class="">
                                    <input type="checkbox">
                                    <label class="" for="flexCheckIndeterminate">
                                        Remember Password
                                    </label>
                                </div>
                                <div class="">
                                    <a href="http://127.0.0.1:8000/forgot"> <span class="no-underline hover:underline hover:decoration-blue-400">Forgot
                                            Password?</span></a>
                                </div>
                            </div>     
                        </div>
                        <button type="button" @click="submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Login</span>
                        </button>
                    </div>
                    <div class="px-5 py-2">
                        <a href="/signup" class="no-underline hover:underline" @click="setUserAsIs(userIdentifier)">
                            <span class="flex justify-center text-center">Don't Have an Account? Sign Up</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script >
import axios from 'axios';
import {vuex} from './../js/store/store'

export default {
    data() {
        return {
            formInput: {
                username: '',
                password: ''
            },
            errorMessage: ''
        }
    },
    computed:{
        userIdentifier(){
           return  vuex.state.userIdentifier
        }
    },
    methods: {
        async submit() {
            try {
                const response = await axios.post('/api/auth/login', this.formInput);
                if (response.status === 200 && response.data.status === true) {
                    localStorage.setItem('APP_DEMO_USER_TOKEN', response.data.token);
                    alert ('Successfuly Login')
                    this.$router.push({ name: 'home' }); // Use the named route
                } else {
                    // Authentication failed, handle error
                    alert(response.data.error_data[0]);
                }
            } catch (ex) {
                // Handle other errors here
                alert('An error occurred while logging in.');
            }
        },
    }
}
</script>