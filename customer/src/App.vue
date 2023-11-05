<template>
  <Master v-if="isUserAuthenticated"/>
  <AuthMaster v-else />
  <LoaderVue v-if="showLoading"></LoaderVue>
</template>
<script>
import Master from './views/customer/MasterView.vue';
import AuthMaster from './views/auth/AuthMaster.vue';
import LoaderVue from '@/components/loader/Loader.vue';
import { mapGetters, mapState } from 'vuex';
import {IS_USER_AUTHENTICATE_GETTER,AUTO_LOGIN_ACTION} from '@/store/storeConstants';
export default {
  name:'App',
  components:{
    Master,
    AuthMaster,
    LoaderVue
  },
  computed:{
    ...mapState({
      showLoading:(state) => state.showLoading
    }),
    ...mapGetters('auth',{
      isUserAuthenticated:IS_USER_AUTHENTICATE_GETTER
    }),
  },
  created(){
    this.$store.dispatch(`auth/${AUTO_LOGIN_ACTION}`);
  }
}
</script>


