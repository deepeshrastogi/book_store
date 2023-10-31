import { SET_USER_TOKEN_GETTER } from "@/store/storeConstants";

export default {
    [SET_USER_TOKEN_GETTER]: (state) => {
        return state.token;
    }
}