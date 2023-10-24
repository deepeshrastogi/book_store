<template>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped">
                <tr>
                    <td><strong>Title</strong></td><td>{{book.title }}</td>
                </tr>
                <tr>
                    <td><strong>Author</strong></td><td>{{book.author }}</td>
                </tr>
                <tr> 
                    <td><strong>Genre</strong></td><td>{{book.genre }}</td>
                </tr>
                <tr> 
                    <td><strong>Isbn</strong></td><td>{{book.isbn }}</td>
                </tr>
                <tr> 
                    <td><strong>Published</strong></td><td>{{book.published }}</td>
                </tr>
                <tr> 
                    <td><strong>Publisher</strong></td><td>{{book.publisher }}</td>
                </tr>
                <tr> 
                    <td><strong>Description</strong></td><td>{{book.description }}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table table-striped">
                <tr>
                    <td>
                        <img :src="imageUrl" :alt="book.title" class="view-image"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name:'BookDetailsComponent',
    data(){
        return {
            book:{
                title:'',
                author:'',
                genre:'',
                isbn:'',
                published:'',
                publisher:'',
                image:'',
                image_path:'',
            },
            message:'Loading...',
            id:0,
            apiUrl: process.env.VUE_APP_API_URL,
        }
    },
    computed:{
        imageUrl(){
            return this.book.image_path +'/' + this.book.image;
        }
    },
    created(){
        this.getBookDetails();
    },
    methods:{
        getBookDetails(){
            this.id = this.$route.params.id;
            axios.get(`${this.apiUrl}/books/${this.id}`).then(res => {
                if(res.data.is_data === true){
                    this.book = res.data.data;
                }else{
                    this.message = 'Sorry, No record found !!!'
                }
            });
        },
    }
}
</script>
<style>
.btn-danger{
    background-color: #dc3545 !important;
}
.view-image{
	height: 205px;
    width: 247px;
    padding: 2px !important;
    box-shadow: 4px 3px 6px #ebebeb !important;
	background: #e1e1e17a;
	object-fit: contain;
}
</style>