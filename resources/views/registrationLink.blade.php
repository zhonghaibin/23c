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
                                    <i class="mdi mdi-console-line"></i>
                                    <span> Create Registration Link  </span></h4>
                                <div class="dropdown">
                                    <form role="form" class="form-horizontal">
                                        <div class="input-container">
                                            <input type="text" class="form-control" v-model="url" id="url">
                                        </div>
                                        <div class="float-center" style="text-align: center;margin-top: 6px" >
                                            <button type="button"  data-clipboard-target="#url"
                                                    class="btn  width-xs btn-info waves-light  btn-small">Copy
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
                url:'',
            },
            methods: {
                getLink: function () {
                    let that = this;
                    $.ajax({
                        url: "{{ route('registrationLinkUrl') }}",
                        type: 'get',
                        data: {},
                        dataType: 'json',
                        success: function (res) {
                            that.url=res.url;
                        }
                    })
                }
            },
            created() {
                this.getLink();
            }

        })

        var clipboard = new ClipboardJS('.btn');

        clipboard.on('success', function(e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            e.clearSelection();
            alert('copy success')
        });

        clipboard.on('error', function(e) {
            alert('copy error')
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });
    </script>
@endsection
