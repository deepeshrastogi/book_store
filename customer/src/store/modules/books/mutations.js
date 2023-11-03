import { SET_BOOKS_DATA_MUTATION } from "@/store/storeConstants";
export default {
    [SET_BOOKS_DATA_MUTATION](state,payload){
        state.tableVisibility = payload.tableVisibility;
        state.books = payload.books;
        state.pagination.from = payload.pagination.from;
        state.pagination.to = payload.pagination.to;
        state.pagination.last_page = payload.pagination.last_page;
    }
}