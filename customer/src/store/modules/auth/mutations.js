import {SET_USER_TOKEN_DATA_MUTATION,SET_AUTO_LOGOUT_MUTATION} from "@/store/storeConstants";
export default {
    [SET_USER_TOKEN_DATA_MUTATION](state,payload){
        state.id = payload.id;
        state.name = payload.name;
        state.email = payload.email;
        state.token = payload.token;
        state.expireIn = payload.expireIn;
        state.autoLogout = false;
    },
    [SET_AUTO_LOGOUT_MUTATION](state){
        state.autoLogout = true;
    }
};