<template>
    <section>
        <div class="pt-24">
            <navbar class="flex item-center justify-between px-10" >
                <div class="flex item-center">
                    <span class="flex text-center item-center">{{ title }}</span>
                </div>
                <div class="flex item-center justify-end">
                    <ul class="flex items-center" v-for="menuList in currentUserMenuList">
                        <li class="inline-block m-1">
                            <button 
                                class="mix-blend-multiply bg-teal-500/75 rounded-full text-white font-bold py-2 px-4"
                                @click="selectedMenu(menuList)">{{menuList.menu}}</button>
                        </li>
                        <i></i>
                    </ul>
                </div>
            </navbar>
        </div>
    </section>
</template>
<script>
import menuListConfig from '../../js/config/menuListConfig';
import {isUserLoggedIn, getUserType } from './../../js/config/login'
export default {
    data() {
        return {
            title: '',
            menuLists: menuListConfig.menulist
        }
    },
    computed:{
        currentUserMenuList(){
            if(getUserType() === 'buyer'){
                return this.menuLists.buyer
            }
            if(getUserType() === 'seller'){
                return this.menuLists.sellerMenuList
            }
            if(getUserType() === 'admin'){
                return this.menuLists.admin
            }
        }
    },
    methods:{
        selectedMenu(menu){
            this.$router.push(menu.url)
            
        }
    }
}

</script>