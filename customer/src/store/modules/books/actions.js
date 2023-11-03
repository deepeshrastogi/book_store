import {GET_BOOKS_ACTION,SET_BOOKS_DATA_MUTATION} from '@/store/storeConstants';
import axios from "axios";
export default {
    async [GET_BOOKS_ACTION](context,payload){
        let config = {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': 'Bearer ' + payload.token
            },
            params: {
                page: payload.page,
                per_page: payload.per_page,
                search_keyword: payload.search_keyword
            },
        }

        try{
            response = await axios.get(process.env.VUE_APP_API_URL+`/books`,config);
        }catch(err){
            let errors = err.response.data;
            throw errors;
        }

        if(response.status === 200){
            context.commit(SET_BOOKS_DATA_MUTATION,{
                tableVisibility : true,
                books : res.data.data.data,
                pagination : {
                    from : res.data.data.from,
                    to : res.data.data.last_page,
                    last_page : res.data.data.last_page,
                }
            });
        }
    }
}