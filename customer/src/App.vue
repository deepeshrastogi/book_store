<template>
  <!-- <Master/> -->
  <AuthMaster/>
  <LoaderVue v-if="showLoading"></LoaderVue>
</template>
<script>
import Master from './views/customer/MasterView.vue';
import AuthMaster from './views/auth/AuthMaster.vue';
import LoaderVue from '@/components/loader/Loader.vue';
import { mapState } from 'vuex';
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
    })
  }
}
</script>


