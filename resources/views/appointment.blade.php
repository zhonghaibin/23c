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
                                    <i class="mdi mdi-phone"></i>
                                    <span> Appointment </span></h4>
                                <div class="dropdown">
                                    <div class="dropdown float-right">
                                        <button type="button" class="btn btn-xs width-xs btn-warning  waves-light"
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
                            <div style="padding:5px 0px;">
                                <button class="btn btn-info waves-light btn-sm" @click="add()">add</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Agent</th>
                                    <th>Visitor</th>
                                    <th>Visitor.Tel</th>
                                    <th>Purpose</th>
                                    <th>Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-cloak v-for="item in list">
                                    <td>@{{item.date_time}}</td>
                                    <td>@{{item.agent_id}}</td>
                                    <td>@{{item.visitor_name}}</td>
                                    <td>@{{item.tel}}</td>
                                    <td>@{{item.purpose}}</td>
                                    <td class="button-list">
                                        <button class="btn btn-warning waves-light btn-sm" @click="deleteAppointment(item.id)">cancel</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table> <!----></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="add" class="demo-modal">
            <a href="javascript:void(0);" onclick="Custombox.modal.close();" class="demo-close"><i
                    class="mdi mdi-close"></i></a>
            <form role="form" class="form-horizontal">
                <div class="input-container">
                    <label class="col-form-label">Date</label>
                    <input id="from-date-data" type="date" name="date" class="form-control">
                    <strong style="color: red" id="date_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">User-Id</label>
                    <input type="text" class="form-control" id="user_id">
                    <strong style="color: red" id="user_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                    <strong style="color: red" id="name_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Visitor.Tel</label>
                    <input type="text" class="form-control" id="tel">
                    <strong style="color: red" id="tel_msg"></strong>
                </div>
                <div class="input-container">
                    <label class="col-form-label">Purpose</label>
                    <input type="text" class="form-control" id="purpose">
                    <strong style="color: red" id="purpose_msg"></strong>
                </div>
                <div class="float-center" style="text-align: center;margin-top: 10px;">
                    <button type="button"
                            class="btn  width-xs btn-info waves-light  btn-small" @click="appointment()">Confirm
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
                end_date: ''
            },
            methods: {
                getList: function () {
                    let that = this;
                    $.ajax({
                        url: "{{ route('getAppointment') }}",
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
                appointment() {
                    let that=this;
                    let date = $("#from-date-data").val();
                    let user_id = $("#user_id").val();
                    let name = $("#name").val();
                    let tel = $("#tel").val();
                    let purpose = $("#purpose").val();
                    if (!date) {
                        $("#date_msg").html('The Date cannot be empty');
                        return false;
                    }
                    if (!user_id) {
                        $("#date_msg").html('');
                        $("#user_msg").html('The User-Id cannot be empty');
                        return false;
                    }
                    if (!name) {
                        $("#user_msg").html("");
                        $("#name_msg").html('The Name cannot be empty');
                        return false;
                    }
                    if (!tel) {
                        $("#name_msg").html("");
                        $("#tel_msg").html('The Tel cannot be empty');
                        return false;
                    }
                    if (!purpose) {
                        $("#tel_msg").html("");
                        $("#purpose_msg").html('The Purpose cannot be empty');
                        return false;
                    }
                    $("#purpose_msg").html('');
                    $.ajax({
                        url: "{{ route('createAppointment') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            date_time: date,
                            user_id: user_id,
                            visitor_name: name,
                            tel: tel,
                            purpose: purpose,
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.code == 1) {
                                $("#user_msg").html(res.msg);
                            } else {
                                $("#from-date-data").val('');
                                $("#user_id").val('');
                                $("#name").val('');
                                $("#tel").val('');
                                $("#purpose").val('');
                                alert(res.msg);
                                Custombox.modal.close();
                                that.getList()
                            }
                        }
                    })
                },
                deleteAppointment(id){
                    let that=this;
                    $.ajax({
                        url: "{{ route('deleteAppointment') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id,
                        },
                        dataType: 'json',
                        success: function (res) {
                            if (res.code == 1) {
                            } else {
                                alert(res.msg);
                                that.getList()
                            }

                        }
                    })
                },
                add() {
                    let modal = new Custombox.modal({
                        content: {
                            effect: 'fadein',
                            target: '#add'
                        }
                    });
                    modal.open();
                }
            },
            created() {
                this.getList();
            }

        })


    </script>
@endsection
