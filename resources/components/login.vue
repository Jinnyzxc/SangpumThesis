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
                        <h1 class="font-bold text-center text-2xl mb-5"> Login </h1>
                        <span class=" flex justify-center text-center"> as buyer </span>
                    </div>
                    <div class="px-5 py-3">
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Username</label>
                        <input type="text" placeholder="Username"  id="password" v-model="formInput.username"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required/>
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                        <input type="password" placeholder="Password" id="password" v-model="formInput.password"
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
                                    <a href=""> <span class="no-underline hover:underline hover:decoration-blue-400">Forgot
                                            Password</span></a>
                                </div>
                            </div>
                        </div>
                        <button type="button" @click="submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Login</span>
                        </button>
                    </div>
                    {{ result }}
                    <div class="px-5 py-2">
                        <a href="" class="no-underline hover:underline">
                            Don't Have an Account? Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script >
//imports 

export default {
    //data
    // methods
    // created
    // mounted 

    data() {
        return {
            formInput: {
                username: '',
                password: ''
            },
            result:""
        }
    },
    created() {

    },
    methods: {
        async submit() {
            try {
                const result = await axios.post('/api/auth/login', formInput)
                if (result.status === 200 && result.data){
                    localStorage.setItem('APP_DEMO_USER_TOKEN', result.data.token)
                    await router.push('home')
                }
                this.result = result
            }
            catch (ex) {
                if(ex && ex.reponse.data && e.response.data.errors){

                }
            }
        }
    }
}
</script>