<template>
    <div>
        <Header />
        <div id="layoutSidenav">
            <Sidebar />
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
import Dashboard from './pages/DashboardView.vue';
import Header from '../../components/customer/HeaderComponent.vue';
import Sidebar from '../../components/customer/SidebarComponent.vue';
import Footer from '../../components/customer/FooterComponent.vue';

export default {
  name: 'MasterView',
  components: {
    Dashboard,
    Header,
    Sidebar,
    Footer,
  }
}
</script>
