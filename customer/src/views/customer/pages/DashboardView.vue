<template>
  <div class="container-fluid px-4 home">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body"><i class="fa fa-book-open"></i> Search Books</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <router-link :to="{name:'books'}" class="small text-white stretched-link">Go to Search Books Page</router-link>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DashboardView',
  components: {

  }
}
</script>
