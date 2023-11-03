import { SET_BOOKS_DATA_GETTER } from "@/store/storeConstants";
export default {
    [SET_BOOKS_DATA_GETTER] : (state) => {
        return {
            tableVisibility: state.tableVisibility,
            books: state.books,
            pagination:{
                from:state.pagination.from,
                to:state.pagination.to,
                last_page:state.pagination.last_page,
            }
        }
    }
}