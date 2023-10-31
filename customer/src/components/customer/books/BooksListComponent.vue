<template>
    <div>
        <div class="mb-4">
            <div class="row">
                <div class="col-md-1">
                    <span>Search By</span>
                </div> 
                <div class="col-md-2">
                    <select v-model="searchBy" class="form-control" @change="switchSearchOption()">
                        <option v-for="searchOpt in searchOptions" :key="searchOpt">{{searchOpt}}</option>
                    </select>
                </div>
                <div class="col-md-8">
                    <span v-if="searchBy === 'Free Text'">
                        <input type="text" v-model="search_keyword" placeholder="Search Books" class="form-control" @keyup="getBooks()" />
                    </span>
                    <span v-else>
                        <input type="date" v-model="search_keyword" placeholder="Search Books" class="form-control" @keyup="getBooks()" @change="getBooks()"/>
                    </span>
                </div>
            </div>
        </div>
        <LoaderComponent v-show="loaderVisibility" />
        <div class="no_of_record" v-show="!loaderVisibility">
            Record
            <select v-model="no_of_record" @change="noOfRecordNeeded()">
                <option v-for="pageOpt in pageOptions" :key="pageOpt">{{pageOpt}}</option>
            </select>
        </div>
        <p v-if="successMessage" class="alert alert-success mt-2">
            {{ successMessage }}
        </p>
        <div class="table-responsive" v-show="!loaderVisibility">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Isbn</th>
                        <th>Published</th>
                        <th>Publisher</th>
                    </tr>
                </thead>
                <tbody v-if="this.books.length > 0">
                    <tr v-for="(book,index) in books" :key="book.id">
                        <td>{{pagination.per_page * (pagination.current_page-1)+index+1}}</td>
                        <!-- <td><router-link class="nav-link" 
                            :to="{
                                name:'book',
                                params:{
                                    id:book.id
                                },
                                query:{
                                    title:book.title
                                }
                            }">{{book.title}}</router-link></td> -->
                            <td><a href="javascript:void(0)" @click="bookDetails(book.id,book.title)">{{book.title}}</a></td>
                        <td>{{book.author}}</td>
                        <td>{{book.genre}}</td>
                        <td>{{book.isbn}}</td>
                        <td>{{book.published}}</td>
                        <td>{{book.publisher}}</td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr><td colspan="7">{{loadingMessage}}</td></tr>
                </tbody>
            </table>
            <PaginationComponent :pagination="pagination" :offset="offset" @changePageNum="changePageNum"/>
        </div>
    </div>
    
</template>

<script>
import { mapGetters } from 'vuex';
import { SET_USER_TOKEN_GETTER } from "@/store/storeConstants";
import axios from 'axios';
import PaginationComponent from '../../pagination/pagination.vue';
import LoaderComponent from '../../loader/Loader.vue';

export default {
    name:'BooksListComponent',
    components:{
        PaginationComponent,
        LoaderComponent
    },
    data(){
        return {
            successMessage:'',
            searchBy:'Free Text',
            loadingMessage:'Loading...',
            pageOptions :[10,20,30,50,100,200,400],
            searchOptions :['Free Text','Date'],
            no_of_record:10,
            books : [],
            pagination: {
                total: 0,
                per_page: 10,
                last_page: 0,
                from: 1,
                to: 10,
                current_page: 1
            },
            offset:10,
            apiUrl: process.env.VUE_APP_API_URL,
            tableVisibility:false,
            loaderVisibility:false,
            search_keyword:'',
        }
    },
    computed: {
        ...mapGetters('auth',{
            token : SET_USER_TOKEN_GETTER
        }),
    },
    created(){
        this.successMessage = this.$route.query.message;
        setTimeout(() => {
            this.successMessage = '';
        }, 4000);
    },
    mounted(){
        // this.getBooks();
    },
    methods:{
        async getBooks(){
            let response = '';
            if(this.search_keyword !=''){
                this.loaderVisibility = true;
                let config = {
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + this.token
                    },
                    params: {
                        page: this.pagination.current_page,
                        per_page: this.pagination.per_page,
                        search_keyword: this.search_keyword
                    },
                }
                await axios.get(`${this.apiUrl}/books`,config).then(res => {
                    this.loaderVisibility = false;
                    if(res.data.is_data === true){
                        this.books = res.data.data.data;
                        this.tableVisibility = true;
                        this.pagination.from = res.data.data.from;
                        this.pagination.to = res.data.data.last_page;
                        this.pagination.last_page = res.data.data.last_page;
                    }else{
                        this.tableVisibility = true;
                        this.books = [];
                        this.loadingMessage = 'Sorry, No record found !!!'
                    }
                });
            }else{
                this.loaderVisibility = false;
                this.tableVisibility = false;
                this.books = [];
                this.no_of_record = 10;
                this.loadingMessage = 'Loading...'
            }
        },
        changePageNum(page){
            this.pagination.current_page = page;
            this.no_of_record = 10;
            this.getBooks();
        },
        noOfRecordNeeded(){
            this.pagination.per_page = this.no_of_record;
            this.getBooks();
        },
        switchSearchOption(){
            this.search_keyword = "";
            this.tableVisibility = false;
        },
        bookDetails(id,title){
            this.$router.push({ name: 'book',params:{id:id},query: { title: title } });
        }
    }
}
</script>

<style>

</style>