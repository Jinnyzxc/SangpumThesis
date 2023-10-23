<template>
  <div class="min-h-screen bg-gradient-to-tl from-slate-600 to-emerald-400  flex flex-col justify-center sm:py-12">
    <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
      <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
        <div class="flex justify-center px-5 py-3">
          <img src="./../assets/system/sangpum-logo.png" alt="">
        </div>
        <div>
          <div class="px-5 py-3">
            <h1 class="font-bold text-center text-2xl mb-5"> Sign Up </h1>
            <span class=" flex justify-center text-center"> create {{ userIdentifier }} account </span>
          </div>
          <div class="px-5" v-for="field in fields">
            <label :for="field.fieldCode"> {{ field.properties.label }}</label>
            <input :type="field.properties.type" :name="field.fieldCode" :placeholder="field.properties.placeholder"
              :id="field.fieldCode" v-model="formInput[field.fieldCode]"
              @input="validateInput(field.fieldCode, formInput[field.fieldCode], field.properties.type)"
              class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
            <span class="text-red-600">{{ fieldErrors[field.fieldCode] }}</span>
          </div>
          <div class="px-5 py-3">
            <button type="button" @click="next()"
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
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import signupConfig from './../js/config/signupConfig'
import { vuex } from './../js/store/store'

export default {
  data() {
    return {
      fields: signupConfig.commonConfig.signupFields,
      formInput: {
        username: '',
        password: '',
        confirmPassword: '',
        email: '',
        user_type: '',
      },
      fieldErrors: {},
      minMaxValidation: signupConfig.commonConfig.minMaxValidation,
      result: '',
    };
  },
  computed: {
    userIdentifier() {
      if (typeof vuex.state.userIdentifier === 'undefined' || vuex.state.userIdentifier === null) {
        this.formInput.user_type = localStorage.getItem('userIdentity');
        return this.formInput.user_type
      }
      this.formInput.user_type = vuex.state.userIdentifier
      return vuex.state.userIdentifier
    }
  },
  methods: {
    validateInput(fieldCode, fieldInput, feildType) {
      if (feildType === 'email') {
        this.validateEmail(fieldCode, fieldInput)
      }
      if (fieldCode === 'confirmPassword') {
        this.validateConfirmPassword(fieldCode, fieldInput)
      }
      else {
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
    validateConfirmPassword(fieldCode, confirmPass) {
      if (confirmPass !== this.formInput.password) {
        this.fieldErrors[fieldCode] = 'Password and Confirm Password not match'
      }
      else {
        this.fieldErrors[fieldCode] = ''
      }
    },
    validateEmail(fieldCode, email) {
      const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
      const isValidEmail = emailRegex.test(email);
      if (isValidEmail) {
        this.fieldErrors[fieldCode] = ''
      } else {
        this.fieldErrors[fieldCode] = 'Invalid Email Address.'
      }
    },
    validateData() {
      for (var key in this.formInput) {
        let value = this.formInput[key];
        if (value == '') {
          this.fieldErrors[key] = 'This field is required'
        }
      }
    },
    next() {
      this.validateData()
      if (this.hasNonFieldErrors()) {
        localStorage.setItem('commonSignupData', JSON.stringify(this.formInput))
        this.$router.push('/signup/' + this.formInput.user_type);
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
  }
};
</script>
 