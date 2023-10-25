import { SIGNUP_ACTION,SET_USER_TOKEN_DATA_MUTATION } from "@/store/storeConstants";
import axios from "axios";

export default {
    async [SIGNUP_ACTION](context,payload){
        let postData = {
            name:payload.name,
            email:payload.email,
            password:payload.password,
            password_confirmation:payload.password_confirmation,
        }
        let response = '';
        const headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
        try{
            response = await axios.post(`http://localhost:8081/api/customer/register`,postData,{
                headers: headers
            });
        }catch(err){
            let errors = err.response.data;
            throw errors;
            // err.response.data.email[0];
        }

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