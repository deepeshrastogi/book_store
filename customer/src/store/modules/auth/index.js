import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

export default {
    namespaced:true,
    state(){
        return {
            name:'',
            email:'',
            id:'',
            token:'',
            refreshToken:'',
            expireIn:'',
            autoLogout:false
        };
    },
    mutations,
    getters,
    actions,
}