import { SET_USER_TOKEN_GETTER,IS_USER_AUTHENTICATE_GETTER } from "@/store/storeConstants";

export default {
    [SET_USER_TOKEN_GETTER]: (state) => {
        return state.token;
    },

    [IS_USER_AUTHENTICATE_GETTER](state){
        return !!state.token;
    }
}