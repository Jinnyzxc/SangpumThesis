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
            <h1 class="font-bold text-center text-2xl mb-5"> Sign Up </h1>
            <span class=" flex justify-center text-center"> create {{ userIdentifier }} account </span>
          </div>
          <div class="px-5 py-3">
            <input type="text" name="username" placeholder="Username" id="password" v-model="formInput.username"
              class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
            <input type="password" name="password" placeholder="Password" id="password" v-model="formInput.password"
              class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
            <input type="password" name="confirm_pass" placeholder="Confirm Password" id="password"
              v-model="formInput.confirmPassword" class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full"
              required />
            <input type="email" name="email" placeholder="Email" id="password" v-model="formInput.email"
              class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
            <button type="button" @click="submit"
              class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
              <span class="inline-block mr-2">Next</span>
            </button>
          </div>
          <div class="px-5 py-2">
            <a href="/login" class="no-underline hover:underline">
              <span class="flex justify-center text-center"> Already have Account? Login
              </span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { vuex } from './../js/store/store'

export default {
  data() {
    return {
      formInput: {
        username: '',
        password: '',
        confirmPassword: '',
        email: '',
        user_type: '',
      },
      result: '',
      validationErrors: {},
    };
  },
  computed: {
    userIdentifier() {
      if (typeof vuex.state.userIdentifier === 'undefined' || vuex.state.userIdentifier === null) {
        this.formInput.user_type = "buyer";
        return 'buyer'
      }
      this.formInput.user_type = vuex.state.userIdentifier
      return vuex.state.userIdentifier
    }
  },
  methods: {
    async submit() {
      try {
        const result = await axios.post('/api/user/add', this.formInput);
        if (result.data.status) {
          localStorage.setItem('APP_DEMO_USER_TOKEN', result.data.token);
          alert('Successfully Created');
          vuex.dispatch('setCommonSignUpData', this.formInput)
          this.$router.push('/personal-info/' + this.formInput.user_type);
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
    },
  },
};
</script>
 