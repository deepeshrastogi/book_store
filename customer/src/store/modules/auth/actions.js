import { SIGNUP_ACTION,SET_USER_TOKEN_DATA_MUTATION,LOADING_SPINNER_SHOW_MUTATION, LOGIN_ACTION } from "@/store/storeConstants";
import axios from "axios";

export default {
    async [LOGIN_ACTION](context,payload){
        let postData = {
            email:payload.email,
            password:payload.password
        }
        
        let response = '';
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
        try{
            response = await axios.post(`http://localhost:8081/api/customer/login`,postData,{
                headers: headers
            });
        }catch(err){
            let errors = err.response.data;
            throw errors;
        }
        console.log("response",response.status);
        if(response.status === 200){
            context.commit(SET_USER_TOKEN_DATA_MUTATION,{
                name:response.data.user.name,
                email:response.data.user.email,
                id:response.data.user.id,
                token:response.data.access_token,
                expireIn:response.data.expires_in
            });
        }
    },
    async [SIGNUP_ACTION](context,payload){
        let postData = {
            name:payload.name,
            email:payload.email,
            password:payload.password,
            password_confirmation:payload.password_confirmation,
        }
        let response = '';
        // context.commit(LOADING_SPINNER_SHOW_MUTATION,true,{
        //     root:true
        // });
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
        try{
            response = await axios.post(`http://localhost:8081/api/customer/register`,postData,{
                headers: headers
            });
        }catch(err){
            // context.commit(LOADING_SPINNER_SHOW_MUTATION,false,{
            //     root:true
            // });
            let errors = err.response.data;
            throw errors;
            // err.response.data.email[0];
        }

        // context.commit(LOADING_SPINNER_SHOW_MUTATION,false,{
        //     root:true
        // });

        if(response.status === 201){
            let responseTokenData = response.data.token.original;
            context.commit(SET_USER_TOKEN_DATA_MUTATION,{
                name:responseTokenData.user.name,
                email:responseTokenData.user.email,
                id:responseTokenData.user.id,
                token:responseTokenData.access_token,
                expireIn:responseTokenData.expires_in
            });
        }
    }
};