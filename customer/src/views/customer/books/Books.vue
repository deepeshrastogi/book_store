<template>
    <div class="container">
        <h3>Book Details</h3>
        <BooksListComponent/>
    </div>
</template>

<script>
import BooksListComponent from '../../../components/customer/books/BooksListComponent.vue';
export default {
    name:'CategoryList',
    components:{
        BooksListComponent
    }
}
</script>