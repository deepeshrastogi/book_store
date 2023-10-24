<template>
    <nav class="text-center" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" v-if="pagination.current_page > 1">
                <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[ page == isActived ? 'active' : '']">
                <a class="page-link" href="javascript:void(0)" @click.prevent="changePage(page)">{{ page }}</a>
            </li>
            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
  </nav>
</template>

<script>
export default {
    name: 'PaginationComponent',
    props:{
        pagination:Object,
        offset:Number
    },
    data(){
        return {

        }
    },
    watch:{
        'pagination.per_page': function(){
            this.pagination.current_page = 1;
        }
    },
    computed:{
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            const numShown = Math.min(this.pagination.per_page, this.pagination.last_page);
            let first = this.pagination.current_page - Math.floor(numShown / 2);
            first = Math.max(first, 1);
            first = Math.min(first, this.pagination.last_page - numShown + 1);
            return [...Array(numShown)].map((k,i) => i + first);
      },
    },
    methods:{
        changePage: function (page) {
            // this.pagination.current_page = page;
            // // this.getRecords();
            this.$emit('changePageNum',page);
        },
    }
}
</script>

<style>

</style>