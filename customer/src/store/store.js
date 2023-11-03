import { createStore } from "vuex";
import auth from "./modules/auth/index";
import books from "./modules/books/index"
import {LOADING_SPINNER_SHOW_MUTATION} from './storeConstants';

const store = createStore({
  modules: {
    auth,
    books
  },
  state(){
    return {
      showLoading:false
    }
  },
  mutations:{
    [LOADING_SPINNER_SHOW_MUTATION](state,payload){
      state.showLoading = payload;
    }
  }
});

export default store;
