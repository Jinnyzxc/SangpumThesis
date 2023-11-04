<template>
  <!-- Not Yet loggedin -->
  <navbar v-if="isLoggedin === false"
    class="flex item-center justify-between flex-wrap  fixed top-0 z-10 bg-transparent-50 shadow-lg border-b border-white-400 w-full">
    <div class="flex items-center flex-shrink-0 px-8">
      <ul class="flex ">
        <li class="">
          <a href="/"
            class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2 text-white font-bold py-2 px-4">Home</a>
        </li>
        <li class="">
          <a href="/about-us"
            class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2 text-white font-bold py-2 px-4">About
            us</a>
        </li>
      </ul>
    </div>
    <div class="flex item-center justify-center">
      <a href="/" class=""> <img src="./../../assets/system/logoSangpum.png" alt=""></a>
    </div>
    <div class="flex items-center ">
      <ul class="flex items-center ">
        <li class="inline-block ">
          <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="mix-blend-multiply bg-teal-500/75 rounded-full text-white font-bold py-2 px-4"
            @click="isloginDisplay(true)">Login</button>
        </li>
        <li class="inline-block pr-8">
          <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="mix-blend-multiply bg-gray-500/75 rounded-full text-white font-bold py-2 px-4"
            @click="isloginDisplay(false)">Register</button>
        </li>
      </ul>
    </div>
  </navbar>
  <!-- Already Loggedin -->
  <navbar v-if="isLoggedin === true"
    class="flex item-center justify-between flex-wrap  fixed top-0 z-10 bg-gradient-to-tl from-teal-600 to-emerald-400  shadow-lg border-b border-white-400 w-full">
    <div class="flex items-center flex-shrink-0 px-8">
      <ul class="flex " v-for="header in currentHeader.left">
        <li class="">
          <a :href="header.url"
            class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2 text-white font-bold py-2 px-4">
            <span v-if="header.isIcon == true" class="material-symbols-outlined"> {{ header.iconClass }}</span>
            <span v-else>{{ header.menuheader }}</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="flex item-center justify-center">
      <a href="/" class=""> <img src="./../../assets/system/logoSangpum.png" alt=""></a>
    </div>
    <div class="flex items-center ">
      <ul class="flex items-center" v-for="header in currentHeader.right">
        <li class="inline-block ">
          <a :href="header.url"
            class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2 text-white font-bold py-2 px-4">
            <span v-if="header.isIcon == true" class="material-symbols-outlined"> {{ header.iconClass }}</span>
            <span v-else>{{ header.menuheader }}</span>
          </a>
        </li>
      </ul>
    </div>
  </navbar>
  <signinRegister :is-login="isLoginPage"></signinRegister>
</template>

<script>
import signinRegister from './../signin-register.vue'
import headerList from './../../js/config/headerConfig'
import { isUserLoggedIn, getUserType } from './../../js/config/login'

export default {
  components: {
    signinRegister
  },
  data() {
    return {
      isLoginPage: false,
      isLoggedin: false,  //put here the flag if already loggedin or not 
      headerList: headerList,
    }
  },
  computed: {
    currentHeader() {
      console.log('dito po', getUserType())
      if (getUserType() === 'seller') {
        return this.headerList.sellerHeader
      }
      if (getUserType() === 'buyer') {
        return this.headerList.buyerHeader
      }
      if (getUserType() === 'admin') {
        return this.headerList.adminHeader
      }
    },
  },
  watch: {
    getUserType: {
      handler(val) {
        console.log('val', val)
        if (!val) return 
        this.hasUserTypeData()
      },
      immediate: true
    }
  },
  methods: {
    hasUserTypeData() {
      if (getUserType() !== null) { //add condition of isUserLoggedIn 
        this.isLoggedin = true
      }
      else {
        this.isLoggedin = false;
      }
    },
    isloginDisplay(value) {
      console.log(getUserType())
      this.isLoginPage = value;
    },
  }
}

</script>