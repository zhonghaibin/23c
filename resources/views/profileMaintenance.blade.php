@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div>
                            <div>
                                <h4 class="mt-0 header-title">
                                    <i class="mdi mdi-email-variant"></i>
                                    <span> Profile Maintenance </span></h4>
                                <div class="dropdown">
                                    <form role="form" class="form-horizontal">
                                        <div class="input-container">
                                            <label class="col-form-label">User Id : @{{user.user_id}}</label>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label"> Name:  @{{user.name}}</label>

                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">NRIC: @{{user.nric}}</label>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Introducer Id : @{{user.introducer_id}}</label>

                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Tel</label>
                                            <input type="text" class="form-control" v-model="user.tel" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                            <strong style="color: red" id="tel_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Password</label>
                                            <input type="password" class="form-control" v-model="password"  onKeyUp="value=value.replace(/[\W]/g,'')">
                                            <strong style="color: red" id="password_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Re-Confirm Password</label>
                                            <input type="password" class="form-control" v-model="re_confirm_password"  onKeyUp="value=value.replace(/[\W]/g,'')">
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Address</label>
                                            <input type="text" class="form-control" v-model="user.address">
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Email</label>
                                            <input type="text" class="form-control" v-model="user.email">
                                            <strong style="color: red" id="email_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Select</label>
                                            <select class="custom-select" v-model="user.select">
                                                <option value="1">Authorized Agent</option>
                                                <option value="2">Referrer</option>
                                                <option value="3">Enquiry</option>
                                            </select>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Bank Name</label>
                                            <input type="text" class="form-control" v-model="user.bank_name">
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Bank Account</label>
                                            <input type="text" class="form-control" v-model="user.bank_account">
                                        </div>
                                        <div class="float-center" style="text-align: center;margin-top: 6px">
                                            <button type="button"
                                                    class="btn  width-xs btn-info waves-light  btn-small" @click="saveData()">Confirm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        new Vue({
            el: "#app",
            data: {
                user:[],
                re_confirm_password:'',
                password:''
            },
            methods: {
                getInfo: function () {
                    let that = this;
                    $.ajax({
                        url: "{{ route('getProfileMaintenance') }}",
                        type: 'get',
                        data: {},
                        dataType: 'json',
                        success: function (res) {
                            console.log(res.data.user)
                            that.user=res.data.user;
                        }
                    })
                },
                saveData(){
                    let that = this;
                    if (!this.user.tel) {
                        $("#tel_msg").html('The Tel cannot be empty');
                        return false;
                    }
                    if (this.user.tel.length>14) {
                        $("#tel_msg").html('The Tel Maximum 16 digits');
                        return false;
                    }


                    if(this.password){
                        if (this.password.length>8) {
                            $("#password_msg").html('The Password Maximum 8 digits');
                            return false;
                        }
                        if(this.password!=this.re_confirm_password){
                            $("#password_msg").html('Inconsistent passwords');
                            return false;
                        }
                        $("#password_msg").html('');
                    }
                    if(this.user.email){
                        let reg = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+(.[a-zA-Z0-9_.-])+/;
                        if(!reg.test(this.user.email)){
                            $("#email_msg").html('Email format error');
                            return false;
                        }
                    }

                    $.ajax({
                        url: "{{ route('saveProfileMaintenance') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {password:this.password,user:this.user},
                        dataType: 'json',
                        success: function (res) {
                            if(res.code==0){
                                that.user=res.data.user;
                            }

                            alert(res.msg)

                        }
                    })
                }
            },
            created() {
                this.getInfo()
            }

        })

    </script>
@endsection
