<template>
    <div>
        <div class="grid gap-3" v-if="changed===false">
            <div class="grid gap-2">
                <span>
                    Old password :
                </span>
                <input type="password" class="form-control" v-model="old_password" @change="show_errors=false">
                <div v-if="show_errors">
                    <div class="alert alert-danger" v-if="!$v.old_password.required">Old password field is required</div>
                    <div class="alert alert-danger" v-if="!$v.old_password.minLength">Old password should be at least 6 digit</div>
                </div>
            </div>
            <div class="grid gap-2">
                <span>
                    New password :
                </span>
                <input type="password" class="form-control" v-model="new_password" @change="show_errors=false">
                <div v-if="show_errors">
                    <div class="alert alert-danger" v-if="!$v.new_password.required">New password field is required</div>
                    <div class="alert alert-danger" v-if="!$v.new_password.minLength">New password should be at least 6 digit</div>
                    <div class="alert alert-danger" v-if="!$v.new_password.not">New password should not be same as old password</div>
                </div>
            </div>
            <div class="grid gap-2">
                <span>
                    New password again :
                </span>
                <input type="password" class="form-control" v-model="new_password_confirm"  @change="show_errors=false">
                <div v-if="show_errors">
                    <div class="alert alert-danger" v-if="!$v.new_password_confirm.required">New password confirmation field is required</div>
                    <div class="alert alert-danger" v-if="!$v.new_password_confirm.minLength">New password confirmation should be at least 6 digit</div>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" @click="changePassword()">
                    Change password
                </button>
            </div>
        </div>
        <div v-if="changed">
            <div class="alert alert-success">
                Password changed
            </div>
            <button class="btn btn-warning" @click="changed=false">
                Change again
            </button>
        </div>
    </div>

</template>

<script>
//TODO: Show server error
import {required, minLength, sameAs, not} from 'vuelidate/lib/validators'
export default {
    data(){
        return {
            changed:false,
            old_password:'',
            new_password:'',
            show_errors:false,
            new_password_confirm:''
        }
    },
    methods:{
        changePassword(){
            this.show_errors=true
            this.$v.$touch()
            if (this.$v.$invalid){
                return
            }
            axios.post('/change/password', {
                old_password:this.old_password,
                new_password:this.new_password,
            })
            .then(response=>this.changed=true)
        }
    },
    validations:{
        old_password:{
            required,
            minLength:minLength(6)
        },
        new_password:{
            required,
            minLength:minLength(6),
            not:not(sameAs('old_password'))
        },
        new_password_confirm:{
            required,
            minLength:minLength(6),
            sameAsNewPassword:sameAs('new_password')
        }

    }
}
</script>
