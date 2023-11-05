import { 
    SIGNUP_ACTION,
    SET_USER_TOKEN_DATA_MUTATION,
    LOADING_SPINNER_SHOW_MUTATION, 
    LOGIN_ACTION,
    LOGOUT_ACTION,
    AUTO_LOGIN_ACTION,
    AUTO_LOGOUT_ACTION,
    SET_AUTO_LOGOUT_MUTATION
} from "@/store/storeConstants";
import axios from "axios";
let timer = '';
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
            response = await axios.post(process.env.VUE_APP_API_URL+`/customer/login`,postData,{
                headers: headers
            });
        }catch(err){
            let errors = err.response.data;
            throw errors;
        }

        if(response.status === 200){
            let expirationTime = +response.data.expires_in * 1000;
            timer = setTimeout(() => {
                context.dispatch(AUTO_LOGOUT_ACTION)
            },expirationTime);

            let userData = {
                name:response.data.user.name,
                email:response.data.user.email,
                id:response.data.user.id,
                token:response.data.access_token,
                expireIn:expirationTime
            };
            localStorage.setItem('userData',JSON.stringify(userData));
            context.commit(SET_USER_TOKEN_DATA_MUTATION,userData);
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
            let userData = {
                name:response.data.user.name,
                email:response.data.user.email,
                id:response.data.user.id,
                token:response.data.access_token,
                expireIn:response.data.expires_in
            };
            localStorage.setItem('userData',JSON.stringify(userData));
            context.commit(SET_USER_TOKEN_DATA_MUTATION,userData);
        }
    },
    [LOGOUT_ACTION](context){
        localStorage.removeItem('userData');
        context.commit(SET_USER_TOKEN_DATA_MUTATION,{
            name:null,
            email:null,
            id:null,
            token:null,
            expireIn:null
        });
        if(timer){
            clearTimeout(timer);
        }
    },
    [AUTO_LOGIN_ACTION](context){
        let userDataString = localStorage.getItem('userData');
        if(userDataString){
            let userData = JSON.parse(userDataString);
            let expirationTime = userData.expireIn - new Date().getTime();
            if(expirationTime < 10000){
                context.dispatch(AUTO_LOGOUT_ACTION);
            }else{
                timer = setTimeout(()=>{
                    context.dispatch(AUTO_LOGOUT_ACTION)
                },expirationTime);
            }
            context.commit(SET_USER_TOKEN_DATA_MUTATION,userData);
        }
    },
    [AUTO_LOGOUT_ACTION](context){
        context.dispatch(LOGOUT_ACTION);
        context.commit(SET_AUTO_LOGOUT_MUTATION);
    }
    

};