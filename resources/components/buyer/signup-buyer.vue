<template>
    <div class="min-h-screen bg-gradient-to-tl from-slate-600 to-emerald-400  flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="flex justify-center
                px-5 py-3">
                    <img src="./../../assets/system/sangpum-logo.png" alt="">
                </div>
                <form method="post" @submit.prevent="submit" v-if="false">
                    <div class="px-5 py-3">
                        <h1 class="font-bold text-center text-2xl mb-5"> Personal Information </h1>
                    </div>
                    <div class="px-5 py-3">
                        <input name="firstName" type="text" placeholder="First name" id="username"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input name="middleName" type="text" placeholder="Middle name" id="password"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input name="lastName" type="text" placeholder="Last name" id="username"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input name="bday" type="date" placeholder="Birthdate" id="password"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />

                        <button type="button" @click="submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Next</span>
                        </button>
                    </div>
                </form>
                <form method="post" @submit.prevent="submit" v-if="true">
                    <div class="px-5 py-3">
                        <h1 class="font-bold text-center text-2xl mb-5"> Address & Billing </h1>
                    </div>
                    <div class="px-5 py-3">
                        <input name="firstName" type="text" placeholder="First name" id="username"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input name="middleName" type="text" placeholder="Middle name" id="password"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input name="lastName" type="text" placeholder="Last name" id="username"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                        <input name="bday" type="date" placeholder="Birthdate" id="password"
                            class="border rounded-full px-3 py-2 mt-1 mb-5 text-sm w-full" required />
                     
                        <label class="block">
                            <span class="sr-only"> <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19H6.931A1.922 1.922 0 015 17.087V8h12.069C18.135 8 19 8.857 19 9.913V11"></path>
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 7.64L13.042 6c-.36-.616-1.053-1-1.806-1H7.057C5.921 5 5 5.86 5 6.92V11M17 15v4M19 17h-4"></path>
    </svg></span>
                            <input type="file" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                    " />
                        </label>
                        <button type="button" @click="submit"
                            class="transition duration-200 bg-teal-500/75 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-full text-sm shadow-sm hover:shadow-md font-semibold text-center ">
                            <span class="inline-block mr-2">Submit</span>
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div></template>
<script>
</script>