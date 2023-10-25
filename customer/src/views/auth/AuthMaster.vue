<template>
    <div>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <router-view/>
                </main>
                <Footer/>
            </div>
        </div>
    </div>
</template>

<script>
// @ is an alias to /src
import Footer from '../../components/customer/FooterComponent.vue';

export default {
  name: 'AuthMaster',
  components: {
    Footer,
  }
}
</script>
