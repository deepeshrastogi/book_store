<template>
    <div class="container">
        <h3>Books</h3>
        <BookDetailsComponent/>
    </div>
</template>

<script>
import BookDetailsComponent from '../../../components/customer/books/BookDetailsComponent.vue';
export default {
    name:'BookDetails',
    components:{
        BookDetailsComponent
    }
}
</script>