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
                                    <i class="mdi mdi-account-group"></i>
                                    <span>  Agent Listing  </span></h4>
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
                                            <input id="from-date" type="date" name="date" class="form-control" v-model="start_date">
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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>User-Id</th>
                                    <th>Rank</th>
                                    <th>Introducer</th>
                                    <th>Tel</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-cloak v-for="item in list">
                                    <td>@{{item.date_time}}</td>
                                    <td>@{{item.user_id}}</td>
                                    <td>@{{item.rank_name}}</td>
                                    <td>@{{item.introducer_id}}</td>
                                    <td>@{{item.tel}}</td>
                                </tr>
                                </tbody>
                            </table>
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
                list:[],
                search_name:'',
                start_date:'',
                end_date:''
            },
            methods: {
                getList: function () {
                    let that = this;
                    $.ajax({
                        url: "{{ route('agentList') }}",
                        type: 'get',
                        data: {search_name:this.search_name,start_date:this.start_date,end_date:this.end_date},
                        dataType: 'json',
                        success: function (res) {
                            that.list=res.list;
                        }
                    })
                },
                reset(){
                    this.search_name='';
                    this.start_date='';
                    this.end_date='';
                    this.getList();
                },
                search(){
                    this.getList();
                }
            },
            created() {
                this.getList();
            }

        })
        </script>
@endsection
