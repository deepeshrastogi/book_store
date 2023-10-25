<template>
    <div class="row align-items-center mt-5">
        <div class="col-md-4 offset-md-4">
            <h3>Login</h3>
            <form @submit.prevent="onLogin()" >
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="email" placeholder="Enter your email" v-model.trim="email" />
                    <label for="inputEmail">Email</label>
                    <div class="error" v-if="errors.email">{{ errors.email }}</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputPassword" type="password" placeholder="Password" v-model.trim="password"/>
                    <label for="inputPassword">Password</label>
                    <div class="error" v-if="errors.password">{{ errors.password }}</div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form> 
            <div class="card-footer text-center py-3">
                <div class="small"><router-link :to="{name:'signup'}">Need an account? Sign up!</router-link></div>
            </div> 
        </div>
    </div>
</template>

<script>
import SignupValidation from '../../services/SignupValidations';
export default {
    name:'Login',
    data(){
        return {
            email:'',
            password:'',
            errors:[],
        }
    },
    methods:{
        onLogin(){
           let validations = new SignupValidation(this.email,this.password);
           this.errors = validations.checkValidations();
           if(this.errors.length){
             return false;
           }
        }
    }
}
</script>
<style>
#layoutSidenav{
    background:rgba(0, 0, 0, 0.03);
}
.error{
    color:#dc2626;
}
</style>