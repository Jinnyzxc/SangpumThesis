<template>
  <!-- Not Yet loggedin -->
  <navbar v-show="isLoggedin === false"
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
  <navbar v-show="isLoggedin === true"
    class="flex item-center justify-between flex-wrap  fixed top-0 z-10 bg-gradient-to-tl from-teal-600 to-emerald-400  shadow-lg border-b border-white-400 w-full">
    <div class="flex items-center flex-shrink-0 px-8">
      <ul class="flex " v-for="header in currentHeader.left">
        <li class="">
          <div class="relative scale-75" v-if="header.menuheader === 'shopping_cart'">
            <button @click="shoppingCart(header)">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-8 w-8 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg>
              <span class="absolute -top-2 left-4 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50"> 4{{
                totalCartItem }}</span>
            </button>
          </div>

          <a :href="header.url" v-else
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
          <a v-if="header.menuheader === 'logout'" @click="logout(header)"
            class="inline-block no-underline hover:text-black font-medium text-lg  px-4 lg:-ml-2 text-white font-bold  px-4 border rounded-full">
            <span v-if="header.isIcon == true" class="material-symbols-outlined"> {{ header.iconClass }}</span>
            <span v-else>{{ header.menuheader }}</span>
          </a>
          <a :href="header.url"
            class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2 text-white font-bold py-2 px-4"
            v-else>
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
  props: {
    totalCartItem: Number
  },
  data() {
    return {
      isLoginPage: false,
      isLoggedin: false,  //just changes this 
      headerList: headerList,
      getUserType: 'buyer'
    }
  },
  created() {

  },
  computed: {
    isUserLoggedIn() {
      return isUserLoggedIn()
    },
    currentHeader() {
      if (getUserType() === 'seller' && isUserLoggedIn) {
        return this.headerList.sellerHeader
      }
      if (this.getUserType === 'buyer' && isUserLoggedIn) {
        return this.headerList.buyerHeader
      }
      if (getUserType() === 'admin' && isUserLoggedIn) {
        return this.headerList.adminHeader
      }
    },
  },
  watch: {
    isUserLoggedIn: {
      handler(val) {
        if (!val) return
        console.log(val)
        this.isLoggedin = val
      },
      immediate: true
    }
  },
  methods: {
    shoppingCart(data) {
      this.$router.push(data.url)
    },
    logout() {
      localStorage.setItem('APP_DEMO_USER_TOKEN', '');
      window.location.href = '/'
      this.$router.push('/')
    },
    loginModalShow() {
    },
    isloginDisplay(value) {
      this.isLoginPage = value;
    },
  }
}

</script>