<template>
    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <!-- <div class="flex justify-between"><img src="./../assets/system/logoSangpum.png" alt=""></div> -->
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <div class="flex justify-between items-center pb-3">
                        <p class="flex justify-between items-center text-2xl font-bold er" v-if="isLogin == true">
                        <h1>Login</h1>
                        </p>
                        <p class=" flex justify-between items-center text-2xl font-bold content-center" v-if="isLogin == false">
                        <h1>Signup</h1>
                        </p>
                    </div>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <button data-modal-hide="defaultModal"
                            @click="knowYourUser('seller', isLogin)"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-bold shadow-sm hover:shadow-md font-semibold text-center mb-1">
                            as SELLER
                        </button>
                        <button data-modal-hide="defaultModal"
                            @click="knowYourUser('buyer', isLogin)"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-bold shadow-sm hover:shadow-md font-semibold text-center mt-2">
                            as BUYER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script >
import Login from './login.vue';
import Signup from './signup.vue';
import {vuex} from './../js/store/store'

export default {
    name: 'login-signup',
    components: {
    Signup,
    Login
    },
    props: {
        isLogin: {
            type: Boolean
        },
    },
    data(){
        return {
            kyUser: ''
        }
    },
    methods: {
        knowYourUser(user, isLogin){
            this.kyUser= user;
            vuex.dispatch('setUserIdentifier', this.kyUser)
            localStorage.setItem('userIdentity', this.kyUser);
            if(isLogin){
                this.$router.push('/login')
            }
            else{
                this.$router.push('/signup')
            }
        }
    }
}
</script>
