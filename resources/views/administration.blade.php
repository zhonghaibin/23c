@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div>
                            <div class="dropdown float-right">
                                <button type="button" class="btn btn-xs width-xs btn-warning  waves-light"
                                        @click="salesInput()">
                                    Sales Input
                                </button>
                                <button type="button" class="btn btn-xs width-xs btn-info waves-light"
                                        @click="inbox()">Inbox
                                </button>
                            </div>
                            <div>
                                <h4 class="mt-0 header-title">
                                    <i class="mdi mdi-access-point"></i>
                                    <span> Administration </span></h4>
                                <div>
                                    <span class="title  pt-md-2">1.Reset Password</span>
                                    <div class="dropdown">
                                        <form role="form" class="form-horizontal">
                                            <label class="col-form-label">User-Id</label>
                                            <div class="autosuggest-container">
                                                <input type="text" class="form-control" id="pw_user_id">
                                                <strong style="color: red" id="pw_user_msg"></strong>
                                            </div>
                                            <label class="col-form-label">Reset Password</label>
                                            <div class="autosuggest-container">
                                                <input type="text" class="form-control" id="pw_password">
                                                <strong style="color: red" id="pw_password_msg"></strong>
                                            </div>
                                            <div class="col-form-label">
                                                <button type="button"
                                                        class="btn btn-xs width-xs btn-info waves-light"
                                                        @click="changePassword()">
                                                    Confirm
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div>
                                    <span>2.Confirm Create User Account</span>
                                    <div class="dropdown">
                                        <div class="dropdown float-right">
                                            <button type="button"
                                                    class="btn btn-xs width-xs btn-warning  waves-light"
                                                    @click="reset()">
                                                Reset
                                            </button>
                                            <button type="button" class="btn btn-xs width-xs btn-info waves-light"
                                                    @click="search()">Search
                                            </button>
                                        </div>
                                        <form role="form" class="form-horizontal">
                                            <label class="col-form-label">Search</label>
                                            <div class="autosuggest-container">
                                                <div id="autosuggest">
                                                    <input type="text" class="form-control" v-model="search_name">
                                                </div>
                                            </div>
                                            <div class="input-container">
                                                <label for="example-date" class="col-form-label">From</label>
                                                <input id="from-date" type="date" name="date" class="form-control"
                                                       v-model="start_date">
                                            </div>
                                            <div class="input-container">
                                                <div class="form-group">
                                                    <label for="example-date" class="col-form-label">To</label>
                                                    <input id="example-date" type="date" name="date"
                                                           class="form-control" v-model="end_date">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div style="padding:5px 0px;">
                                <button class="btn btn-info waves-light btn-sm" @click="add()">add</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>User-Id</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>Select</th>
                                    <th>Confirm</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-cloak v-for="item in list">
                                    <td>@{{item.date_time}}</td>
                                    <td>@{{item.user_id}}</td>
                                    <td>@{{item.name}}</td>
                                    <td>@{{item.rank_name}}</td>
                                    <td>@{{item.select_name}}</td>
                                    <td>@{{item.confirm_id_name}}</td>
                                    <td class="button-list">
                                        <button class="btn btn-warning waves-light btn-sm" @click="edit(item.id)">edit
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table> <!----></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="salesInput" class="demo-modal" style="overflow:auto;">
            <form role="form" class="form-horizontal">
                <div class="input-container">
                    <label class="col-form-label">User-Id</label>
                    <input type="text" class="form-control" id="si_user_id">
                    <strong style="color: red" id="si_user_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="si_date">
                    <strong style="color: red" id="si_date_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Client Name</label>
                    <input type="text" class="form-control" id="si_client_name">
                    <strong style="color: red" id="si_client_name_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Agent-Id</label>
                    <input type="text" class="form-control" id="si_agent_id">
                    <strong style="color: red" id="si_agent_id_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Direct-Comm</label>
                    <input type="text" class="form-control" id="si_direct_comm"
                           onkeyup="if(isNaN(value))execCommand('undo')"
                           onafterpaste="if(isNaN(value))execCommand('undo')">
                    <strong style="color: red" id="si_direct_comm_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Referrer-Comm</label>
                    <input type="text" class="form-control" id="si_referrer_comm"
                           onkeyup="if(isNaN(value))execCommand('undo')"
                           onafterpaste="if(isNaN(value))execCommand('undo')">
                    <strong style="color: red" id="si_referrer_comm_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Bonus</label>
                    <input type="text" class="form-control" id="si_bonus" onkeyup="if(isNaN(value))execCommand('undo')"
                           onafterpaste="if(isNaN(value))execCommand('undo')">
                    <strong style="color: red" id="si_bonus_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Loyalty</label>
                    <input type="text" class="form-control" id="si_loyalty"
                           onkeyup="if(isNaN(value))execCommand('undo')"
                           onafterpaste="if(isNaN(value))execCommand('undo')">
                    <strong style="color: red" id="si_loyalty_msg"></strong>
                </div>
                <div class="float-center" style="text-align: center;margin-top: 10px;">
                    <button type="button"
                            class="btn  width-xs btn-info waves-light  btn-small" @click="createSI()">Confirm
                    </button>
                </div>
            </form>
        </div>
        <div id="inbox" class="demo-modal">
            <a href="javascript:void(0);" onclick="Custombox.modal.close();" class="demo-close"><i
                    class="mdi mdi-close"></i></a>
            <form role="form" class="form-horizontal">
                <div class="input-container">
                    <label class="col-form-label">User-Id</label>
                    <input type="text" class="form-control" id="inbox_user_id">
                    <strong style="color: red" id="inbox_user_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Data</label>
                    <input type="date" name="date" class="form-control" id="inbox_date">
                    <strong style="color: red" id="inbox_date_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Message</label>
                    <textarea class="form-control" rows="3" id="inbox_message"></textarea>
                    <strong style="color: red" id="inbox_message_msg"></strong>
                </div>
                <div class="float-center" style="text-align: center;margin-top: 10px;">
                    <button type="button"
                            class="btn  width-xs btn-info waves-light  btn-small" @click="createInbox()">Confirm
                    </button>
                </div>

            </form>
        </div>
        <div id="edit" class="demo-modal" style="overflow:auto;">
            <form role="form" class="form-horizontal">
                <div class="input-container">
                    <label class="col-form-label">Date</label>
                    <input type="date" name="date" class="form-control" v-model="user.date_time">
                    <strong style="color: red" id="inbox_date_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Tel</label>
                    <input type="text" class="form-control" v-model="user.tel"
                           onkeyup="this.value=this.value.replace(/\D/g,'')"
                           onafterpaste="this.value=this.value.replace(/\D/g,'')">
                    <strong style="color: red" id="tel_msg"></strong>
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
                    <label class="col-form-label">Rank</label>
                    <select class="custom-select" v-model="user.rank">
                        <option value="1">admin</option>
                        <option value="2">partner</option>
                        <option value="3">agent</option>
                        <option value="4">referrer</option>
                        <option value="5">enquiry</option>
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
                <div class="input-container">
                    <label class="col-form-label">Confirm_id</label>
                    <select class="custom-select" v-model="user.confirm_id">
                        <option value="0">await confirmation</option>
                        <option value="1">not approved</option>
                        <option value="2">approved</option>
                    </select>
                </div>
                <div class="float-center" style="text-align: center;margin-top: 10px;">
                    <button type="button"
                            class="btn  width-xs btn-info waves-light  btn-small" @click="saveUserInfo()">Confirm
                    </button>
                </div>

            </form>
        </div>
        <div id="add" class="demo-modal" style="overflow:auto;">
            <form role="form" class="form-horizontal">
                <div class="input-container">
                    <label class="col-form-label">Introducer Id</label>
                    <input type="text" class="form-control" v-model="introducer_id"
                           onKeyUp="value=value.replace(/[\W]/g,'')">
                    <strong style="color: red" id="introducer_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">User Id</label>
                    <input type="text" class="form-control" v-model="user_id" onKeyUp="value=value.replace(/[\W]/g,'')">
                    <strong style="color: red" id="user_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Name</label>
                    <input type="text" class="form-control" v-model="name"
                           onkeyup="value=value.replace(/[^ a-zA-Z]/g,'')">
                    <strong style="color: red" id="name_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">NRIC</label>
                    <input type="text" class="form-control" v-model="nric">
                    <strong style="color: red" id="nric_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Tel</label>
                    <input type="text" class="form-control" v-model="tel"
                           onkeyup="this.value=this.value.replace(/\D/g,'')"
                           onafterpaste="this.value=this.value.replace(/\D/g,'')">
                    <strong style="color: red" id="add_tel_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Password</label>
                    <input type="password" class="form-control" v-model="password"
                           onKeyUp="value=value.replace(/[\W]/g,'')">
                    <strong style="color: red" id="password_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Address</label>
                    <input type="text" class="form-control" v-model="address">
                </div>
                <div class="input-container">
                    <label class="col-form-label">Email</label>
                    <input type="text" class="form-control" v-model="email">
                    <strong style="color: red" id="add_email_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Select</label>
                    <select class="custom-select" v-model="select">
                        <option value="1">Authorized Agent</option>
                        <option value="2">Referrer</option>
                        <option value="3">Enquiry</option>
                    </select>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Confirm_id</label>
                    <select class="custom-select" v-model="confirm_id">
                        <option value="0">await confirmation</option>
                        <option value="1">not approved</option>
                        <option value="2">approved</option>
                    </select>
                </div>
                <div class="float-center" style="text-align: center;margin: 12px;">
                    <button type="button"
                            class="btn  width-xs btn-info waves-light  btn-small" @click="saveRegistration">Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        new Vue({
            el: "#app",
            data: {
                list: [],
                search_name: '',
                start_date: '',
                end_date: '',
                uid: 0,
                user: [],
                introducer_id: '',
                introducer_name: '',
                nda: '',
                select: '1',
                email: '',
                address: '',
                re_confirm_password: '',
                password: '',
                tel: '',
                nric: '',
                name: '',
                user_id: '',
                confirm_id:'2',
            },
            methods: {
                getList: function () {
                    let that = this;
                    $.ajax({
                        url: "{{ route('administrationList') }}",
                        type: 'get',
                        data: {search_name: this.search_name, start_date: this.start_date, end_date: this.end_date},
                        dataType: 'json',
                        success: function (res) {
                            that.list = res.list;
                            console.log('that', that.list)

                        }
                    })
                },
                reset() {
                    this.search_name = '';
                    this.start_date = '';
                    this.end_date = '';
                    this.getList();
                },
                search() {
                    this.getList();
                },
                edit(uid) {
                    this.uid = uid;
                    this.getInfo();
                    let modal = new Custombox.modal({
                        content: {
                            effect: 'fadein',
                            target: '#edit'
                        }
                    });
                    modal.open();
                },
                getInfo: function () {
                    let that = this;
                    $.ajax({
                        url: "{{ route('getUserInfo') }}",
                        type: 'get',
                        data: {id: this.uid},
                        dataType: 'json',
                        success: function (res) {
                            console.log(res.data.user)
                            that.user = res.data.user;
                        }
                    })
                },
                saveUserInfo: function () {
                    let that=this;
                    $.ajax({
                        url: "{{ route('saveUserInfo') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {user: this.user},
                        dataType: 'json',
                        success: function (res) {
                            alert(res.msg)
                            that.getList()
                            Custombox.modal.close();
                        }
                    })
                },
                salesInput() {
                    let modal = new Custombox.modal({
                        content: {
                            effect: 'fadein',
                            target: '#salesInput'
                        }
                    });
                    modal.open();
                },
                inbox() {
                    let modal = new Custombox.modal({
                        content: {
                            effect: 'fadein',
                            target: '#inbox'
                        }
                    });
                    modal.open();
                },
                add() {
                    let modal = new Custombox.modal({
                        content: {
                            effect: 'fadein',
                            target: '#add'
                        }
                    });
                    modal.open();
                },
                changePassword() {
                    let user_id = $("#pw_user_id").val();
                    let password = $("#pw_password").val();
                    if (!user_id) {
                        $("#pw_user_msg").html('The User-Id cannot be empty');
                        return false;
                    }
                    if (!password) {
                        $("#pw_user_msg").html("");
                        $("#pw_password_msg").html('The Password cannot be empty');
                        return false;
                    }
                    $("#pw_password_msg").html('');
                    $.ajax({
                        url: "{{ route('changePassword') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            user_id: user_id,
                            password: password,
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.code == 1) {
                                $("#pw_user_msg").html(res.msg);
                            } else {
                                alert(res.msg);
                                $("#pw_user_id").val('');
                                $("#pw_password").val('');
                            }
                        }
                    })
                },
                createSI() {
                    let user_id = $("#si_user_id").val();
                    let date = $("#si_date").val();
                    let client_name = $("#si_client_name").val();
                    let agent_id = $("#si_agent_id").val();
                    let direct_comm = $("#si_direct_comm").val();
                    let referrer_comm = $("#si_referrer_comm").val();
                    let bonus = $("#si_bonus").val();
                    let loyalty = $("#si_loyalty").val();

                    if (!user_id) {
                        $("#si_user_msg").html('The User-Id cannot be empty');
                        return false;
                    }
                    if (!date) {
                        $("#si_user_msg").html("");
                        $("#si_date_msg").html('The Date cannot be empty');
                        return false;
                    }
                    if (!client_name) {
                        $("#si_date_msg").html("");
                        $("#si_client_name_msg").html('The Client Name cannot be empty');
                        return false;
                    }
                    if (!agent_id) {
                        $("#si_client_name_msg").html("");
                        $("#si_agent_id_msg").html('The Agent Id cannot be empty');
                        return false;
                    }
                    if (!direct_comm) {
                        $("#si_agent_id_msg").html("");
                        $("#si_direct_comm_msg").html('The  Direct Comm cannot be empty');
                        return false;
                    }
                    if (!referrer_comm) {
                        $("#si_direct_comm_msg").html("");
                        $("#si_referrer_comm_msg").html('The Referrer Comm cannot be empty');
                        return false;
                    }
                    if (!bonus) {
                        $("#si_referrer_comm_msg").html("");
                        $("#si_bonus_msg").html('The Bonus cannot be empty');
                        return false;
                    }
                    if (!loyalty) {
                        $("#si_bonus_msg").html("");
                        $("#si_loyalty_msg").html('The Loyalty cannot be empty');
                        return false;
                    }
                    $("#si_loyalty_msg").html('');
                    $.ajax({
                        url: "{{ route('createSales') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            user_id: user_id,
                            date_time: date,
                            client_name: client_name,
                            agent_id: agent_id,
                            direct_comm: direct_comm,
                            referrer_comm: referrer_comm,
                            bonus: bonus,
                            loyalty: loyalty
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.code == 1) {
                                $("#si_user_msg").html(res.msg);
                            } else {
                                alert(res.msg);
                                $("#si_user_id").val('');
                                $("#si_date").val('');
                                $("#si_client_name").val('');
                                $("#si_agent_id").val('');
                                $("#si_direct_comm").val('');
                                $("#si_referrer_comm").val('');
                                $("#si_bonus").val('');
                                $("#si_loyalty").val('');
                                Custombox.modal.close();
                            }
                        }
                    })
                },
                createInbox() {

                    let user_id = $("#inbox_user_id").val();
                    let date = $("#inbox_date").val();
                    let message = $("#inbox_message").val();
                    console.log('user_id', user_id)
                    if (!user_id) {
                        $("#inbox_user_msg").html('The User-Id cannot be empty');
                        return false;
                    }
                    if (!date) {
                        $("#inbox_user_msg").html("");
                        $("#inbox_date_msg").html('The Date cannot be empty');
                        return false;
                    }
                    if (!message) {
                        $("#inbox_date_msg").html("");
                        $("#inbox_message_msg").html('The Message cannot be empty');
                        return false;
                    }
                    $("#inbox_message_msg").html('');
                    $.ajax({
                        url: "{{ route('createInbox') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {user_id: user_id, date_time: date, message: message},
                        dataType: 'json',
                        success: function (res) {
                            if (res.code == 1) {
                                $("#inbox_user_msg").html(res.msg);
                            } else {
                                alert(res.msg);
                                $("#inbox_user_id").val('');
                                $("#inbox_date").val('');
                                $("#inbox_message").val('');
                                Custombox.modal.close();
                            }
                        }
                    })
                },
                saveRegistration() {
                    if (!this.introducer_id) {
                        $("#introducer_msg").html('The Introducer-Id cannot be empty');
                        return false;
                    }
                    $("#introducer_msg").html('');
                    if (!this.user_id) {
                        $("#user_msg").html('The User-Id cannot be empty');
                        return false;
                    }
                    if (this.user_id.length > 8) {
                        $("#user_msg").html('The User-Id Maximum 8 digits');
                        return false;
                    }
                    $("#user_msg").html("");
                    if (!this.name) {
                        $("#name_msg").html('The Name cannot be empty');
                        return false;
                    }
                    if (this.name.length > 16) {
                        $("#user_msg").html('The Name Maximum 16 digits');
                        return false;
                    }
                    $("#name_msg").html("");
                    if (!this.nric) {
                        $("#nric_msg").html('The Nric cannot be empty');
                        return false;
                    }
                    $("#nric_msg").html("");
                    if (!this.tel) {
                        $("#add_tel_msg").html('The Tel cannot be empty');
                        return false;
                    }
                    if (this.tel.length > 14) {
                        $("#add_tel_msg").html('The Tel Maximum 16 digits');
                        return false;
                    }
                    $("#tel_msg").html("");
                    if (!this.password) {
                        $("#password_msg").html('The Password cannot be empty');
                        return false;
                    }
                    if (this.password.length > 8) {
                        $("#password_msg").html('The Password Maximum 8 digits');
                        return false;
                    }
                    $("#password_msg").html('');
                    if (this.email) {
                        let reg = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+(.[a-zA-Z0-9_.-])+/;
                        if (!reg.test(this.email)) {
                            $("#add_email_msg").html('Email format error');
                            return false;
                        }
                    }
                    $("#add_email_msg").html('');
                    let that = this;
                    $.ajax({
                        url: "{{ route('createRegistration') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            introducer_id: that.introducer_id,
                            user_id: that.user_id,
                            name: that.name,
                            nric: that.nric,
                            tel: that.tel,
                            password: that.password,
                            address: that.address,
                            email: that.email,
                            select: that.select,
                            confirm_id:that.confirm_id
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.code == 1) {
                                $("#" + res.error).html(res.msg);
                                alert(res.msg)
                            } else {
                                alert(res.msg)
                                that.user_id = '';
                                that.name = '';
                                that.nric = '';
                                that.tel = '';
                                that.password = '';
                                that.re_confirm_password = '';
                                that.address = '';
                                that.email = '';
                                that.getList();
                            }

                        }
                    })
                }
            },
            created() {
                this.getList();

            }

        })


    </script>
@endsection
