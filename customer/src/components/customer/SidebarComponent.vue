<template>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <router-link class="nav-link" :to="{name:'dashboard'}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </router-link>
                    <div class="sb-sidenav-menu-heading">Books</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#booksModule" aria-expanded="false" aria-controls="booksModule">
                        <div class="sb-nav-link-icon"><i class="fa fa-book-open"></i></div>
                        Books
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="booksModule" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link class="nav-link" :to="{name:'books'}">Books</router-link>
                        </nav>
                    </div>
                    <a href="#" class="nav-link" @click.prevent="onLogOut">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import {LOGOUT_ACTION} from '@/store/storeConstants';
import { mapActions } from 'vuex';
export default {
    name: 'SidebarComponent',
    methods:{
        ...mapActions('auth',{
            logout:LOGOUT_ACTION
        }),
        onLogOut(){
            this.logout();
            this.$router.replace('/login');
        }
    }
}
</script>
