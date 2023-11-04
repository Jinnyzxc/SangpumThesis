<template>
<login :adminUserType="userType"></login>
</template>
<script>
import login from '../login.vue';

export default{
    components:{
        login
    },
    data(){
        return {
            userType: 'admin'
        }
    }
}
</script>