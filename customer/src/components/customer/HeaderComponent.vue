<template>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <router-link :to="{name:'dashboard'}" class="navbar-brand ps-3">Customer Dashboard</router-link>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    </nav>
</template>

<script>
export default {
    name: 'HeaderComponent',
}
</script>
