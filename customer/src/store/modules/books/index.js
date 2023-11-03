import getters from './getters';
import actions from './actions';
import mutations from './mutations';

export default {
    namespaced:true,
    state(){
       return {
            tableVisibility:false,
            books:[],
            pagination:{
                from: 1,
                to: 10,
                last_page:0,
            }
       }
    },
    getters,
    actions,
    mutations
}