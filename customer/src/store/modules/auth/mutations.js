import {SET_USER_TOKEN_DATA_MUTATION} from "@/store/storeConstants";
export default {
    [SET_USER_TOKEN_DATA_MUTATION](state,payload){
        state.id = payload.id;
        state.name = payload.name;
        state.email = payload.email;
        state.token = payload.token;
        state.expireIn = payload.expireIn;
    }
};