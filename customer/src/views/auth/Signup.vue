<template>
    <div class="row align-items-center mt-5">
        <div class="col-md-4 offset-md-4">
            <h3>Sign up</h3>
            <div class="alert alert-danger" v-if="error">{{error}}</div>
            <form @submit.prevent="onSignup()">
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputName" type="text" placeholder="Enter your Name" v-model.trim="name"/>
                    <label for="inputName">Name</label>
                    <div class="error" v-if="errors.name">{{errors.name}}</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="email" placeholder="Enter your email" v-model.trim="email"/>
                    <label for="inputEmail">Email</label>
                    <div class="error" v-if="errors.email">{{errors.email}}</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputPassword" type="password" placeholder="Password" v-model.trim="password"/>
                    <label for="inputPassword">Password</label>
                    <div class="error" v-if="errors.password">{{errors.password}}</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm Password" v-model.trim="password_confirmation" />
                    <label for="inputConfirmPassword">Confirm Password</label>
                    <div class="error" v-if="errors.password_confirmation">{{errors.password_confirmation}}</div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button class="btn btn-primary" type="submit">Sign up</button>
                </div>
            </form> 
            <div class="card-footer text-center py-3">
                <div class="small"><router-link :to="{name:'login'}">Already an account? Login!</router-link></div>
            </div> 
        </div>
    </div>
</template>

<script>
import SignupValidations from '@/services/SignupValidations';
import { SIGNUP_ACTION,LOADING_SPINNER_SHOW_MUTATION } from "@/store/storeConstants";
import { mapActions, mapMutations, mapState } from 'vuex';
export default {
    name:'Signup',
    data(){
        return {
            name:'',
            email:'',
            password:'',
            password_confirmation:'',
            errors:[],
            error:''
        }
    },
    methods:{
        ...mapActions('auth',{
            signup:SIGNUP_ACTION
        }),
        ...mapMutations({
            showLoading:LOADING_SPINNER_SHOW_MUTATION
        }),
        async onSignup(){
            let validations = new SignupValidations(this.email,this.password);
            this.errors = validations.checkValidations();
            if('email' in this.errors || 'password' in this.errors){
                return false;
            }
            // show the spinner
            this.showLoading(true);
            // signup registration
            await this.signup({
                name:this.name,
                email:this.email,
                password:this.password,
                password_confirmation:this.password_confirmation,
            }).catch((error) => {
                if('name' in error){
                    this.error = error.name[0]
                }else if('email' in error){
                    this.error = error.email[0]
                }else if('password' in error){
                    this.error = error.password[0]
                }else{
                    this.error = error.password_confirmation[0]
                }
                this.showLoading(false);
            });
            this.showLoading(false);
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