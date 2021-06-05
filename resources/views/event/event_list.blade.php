@extends('layouts.main')

@section('title','Member List')

@section('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="{{asset('plugins/components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="white-box ecom-stat-widget">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="text-blue font-light">{{ $widget['totalEvent'] }}</span>
                        <p class="font-12">Total Event</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="icoleaf bg-info text-white"><i class="mdi mdi-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box ecom-stat-widget">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="text-blue font-light">{{ $widget['eventToday'] }}</span>
                        <p class="font-12">Event Today</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="icoleaf bg-primary text-white"><i class="mdi mdi-calendar-today"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box ecom-stat-widget">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="text-blue font-light">{{ $widget['eventMonth'] }}</span>
                        <p class="font-12">Event this Month</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="icoleaf bg-success text-white"><i class="mdi mdi-calendar-clock"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- .row -->
    <div class="row">
        <div class="col-md-6">
            <div class="white-box ecom-stat-widget">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="text-blue font-light">{{ $widget['audienceToday'] }}</span>
                        <p class="font-12">Audience Today</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="icoleaf bg-info text-white"><i class="mdi mdi-account-multiple"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="white-box ecom-stat-widget">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="text-blue font-light">{{ $widget['audienceMonth'] }}</span>
                        <p class="font-12">Audience this Month</p>
                    </div>
                    <div class="col-xs-6">
                        <span class="icoleaf bg-primary text-white"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-5 text-right">
        <button class="btn btn-info waves-effect waves-light" type="button" onclick="myFunction()">Show/Hide Member Summary</button>
    </div>
    <br>
    <!-- /.row -->
    <div class="row" style="display:none" id="myDIV">
        <div class="col-md-12">
            <div class="white-box bg-info">
                <h4>Member Summary</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Member By Gender</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Male</th>
                                        <th>Female</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $summary['byGender']['male'] }}</td>
                                        <td>{{ $summary['byGender']['female'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3>Filter</h3>
                <div class="row-m-3">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control filter" id="filter-date">
                            <div class="input-group-addon">
                                <a><i class="icon-calender" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col text-right">
                      <form id="dateofevent" action="{{url('/event/export')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <input type="hidden" class="form-control float-right filter" name="fromDate">
                        <input type="hidden" class="form-control float-right filter" name="toDate">
                        <button class="btn btn-success" type="submit">Download</button>
                      </form>
                    </div>
                    <hr>
                    <h3 class="box-title">Event List</h3>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addevent"><i class="fa fa-plus"></i></button>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table id="dataEvent" class="table table-striped">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Number of Participants</th>
                                <th>Date of Event</th>
                                <th>##</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- /.modal -->
    <div id="modal-addevent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form method="post" id="form-create" action="{{url('/event/add')}}" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Event</h4>
                </div>
                <div class="modal-body">
                @csrf
                    <div class="row-m-5">
                        <div class="col">
                        <div class="form-group">
                            <strong>Event Name</strong>
                            <input type="text" name="name" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row-m-5">
                        <div class="col">
                            <div class="form-group">
                                <strong>Date</strong>
                                <input type="date" name="event_date" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Location</strong>
                                <select name="location"class="form-control filter-gender">
                                    <option value="" disabled selected>Location</option>
                                    <option value="Jogja Digital Valley">Jogja Digital Valley</option>
                                    <option value="Bandung Digital Valley">Bandung Digital Valley</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row-m-5">
                        <div class="col">
                            <div class="form-group">
                                <strong>Speaker</strong>
                                <input type="text" name="speaker" class="form-control" placeholder="Jokowi" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <strong>Participants</strong>
                            <div class="input-group">
                            <input type="file" name="file">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-editEvent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form method="post" id="form-edit" action="{{url('/event/update')}}" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Event</h4>
                </div>
                <div class="modal-body" id="edit-event">
                    @csrf
                    <input type="hidden" name="id">
                    {{method_field('PATCH')}}
                    <div class="row-m-5">
                        <div class="col">
                        <div class="form-group">
                            <strong>Event Name</strong>
                            <input type="text" name="name" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row-m-5">
                        <div class="col">
                            <div class="form-group">
                                <strong>Date</strong>
                                <input type="date" name="event_date" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Location</strong>
                                <select name="location"class="form-control filter-gender">
                                    <option value="" disabled selected>Location</option>
                                    <option value="Jogja Digital Valley">Jogja Digital Valley</option>
                                    <option value="Bandung Digital Valley">Bandung Digital Valley</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row-m-5">
                        <div class="col">
                            <div class="form-group">
                                <strong>Speaker</strong>
                                <input type="text" name="speaker" class="form-control" placeholder="Jokowi" autocomplete="off">
                            </div>
                        </div>
                        <div class="col">
                        <div class="form-group">
                            <strong>Participants</strong>
                            <div class="input-group">
                            <input type="file" name="file">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- /.modal -->
    <div id="modal-showEvent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content" id="detail-event">
                
                <div class="modal-body">
                    <div class="row m-5">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Event Detail</h4> 
                    </div>
                    <div class="row-ml-5 m-5">
                        <br><br>
                        <table class="table table-responsive">
                            <tr>
                                <td><label class="mr-3">Event Name</label></td>
                                <td>:</td>
                                <td><span class="ml-3" name="name"></span></td>
                            </tr>
                            <tr>
                                <td><label class="mr-3">Participants</label></td>
                                <td>:</td>
                                <td><span class="ml-3" name="audience_count"></span></td>
                            </tr>
                            <tr>
                                <td><label class="mr-3">Location</label></td>
                                <td>:</td>
                                <td><span class="ml-3" name="location"></span></td>
                            </tr>
                            <tr>
                                <td><label class="mr-3">Event Date</label></td>
                                <td>:</td>
                                <td><span class="ml-3" name="event_date"></span></td>
                            </tr>
                            <tr>
                                <td><label class="mr-3">Speaker</label></td>
                                <td>:</td>
                                <td><span class="ml-3" name="speaker"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

@endsection

@section('js')
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        $(function() {
            $('#myTable').DataTable();

            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    </script>
    <script>
        let list_event = [];
        let fromDate = $("#dateofevent [name='fromDate']").val()
        let toDate = $("#dateofevent [name='toDate']").val()
        const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
  

        const table = $('#dataEvent').DataTable({
            "pageLength" : 10,
            "lengthMenu" : [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'all']],
            "bLengthChange" : true,
            "bFilter" : true,
            "bInfo" : true,
            "processing": true,
            "bServerSide" : true,
            ajax:{
                url: "{{url('')}}/event/dataEvent",
                type: "POST",
                data:function(d){
                d.fromDate = fromDate;
                d.toDate = toDate;
                return d
                },
            },
            columnDefs: [
                { targets: '_all', visible: true},
                {
                "targets" : 0,
                "class" : "text-nowrap",
                "render": function(data,type,row,meta){
                    list_event[row.id] = row;
                    return row.id;
                }
                },
                {
                "targets" : 1,
                "class" : "text-nowrap",
                "render": function(data,type,row,meta){
                    let show = `<a onclick="showDetailEvent('${row.id}')" title="Detail Event" href="javascript:;" class="mr-2">${row.name}</a>`
                    return show;
                }
                },
                {
                "targets" : 2,
                "class" : "text-nowrap",
                "render": function(data,type,row,meta){
                    let show = `<a onclick="showParticipants('${row.id}')" title="Peserta Event" href="javascript:;">${row.audience_count}</a>`
                    return show;
                }
                },
                {
                "targets" : 3,
                "class" : "text-center",
                "render": function(data,type,row,meta){
                    let date = new Date(row.event_date)
                    date = date.getDate() + " " + months[date.getMonth()]  + " " + date.getFullYear()
                    return date;
                }
                },
                {
                "targets" : 4,
                "sortable":false,
                "class" : "text-center",
                "render": function(data,type,row,meta){
                    let show = `<a onclick="eventEdit('${row.id}')" href="javascript:;" class="mr-2" title="Detail Event"><i class="fa fa-pencil text-inverse m-r-10"></i></a>`
                    show+= `<a onclick="destroy('${row.id}')" style="cursor: pointer; color:red" title="Hapus Event"><i class="fa fa-trash"></i></a>`
                    return show;
                }
                }
            ]
        });

        $("#form-create").on('submit',function(e){
            e.preventDefault()

            $("#form-create").ajaxSubmit({
                success:function(res){
                    table.ajax.reload(null,false)
                    $("#form-create input:not([name='_token'])").val('')
                    $("#form-create textarea").val('')
                    $("#modal-addevent").modal('hide')
                    toastr.success("Event added successfully", 'Success')
                }
            })
        })

        $("#form-edit").on('submit',function(e){
            e.preventDefault()

            $("#form-edit").ajaxSubmit({
                success:function(res){
                    if(res===true){
                        toastr.success("Event has been updated", 'Success')
                        table.ajax.reload(null,false)
                        $("#modal-editEvent").modal('hide')
                    }
                }
            })
        })

        $(".filter").on('change',function(){
            fromDate = $("#dateofevent [name='fromDate']").val()
            toDate = $("#dateofevent [name='toDate']").val()
            table.ajax.reload(null,false)
        })


        function destroy(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
        if(e.value===true){
            let event = list_event[id]
            let delete_event = ''
            $.ajax({
            url:'{{url('')}}/event/destroy',
            method: 'delete',
            data:{id:id,_token:'{{csrf_token()}}'},
            success:function(res){
                if(res===true){
                table.ajax.reload(null,false)
                }
            }
            })
            toastr.success("Event has been deleted", 'Success')
        }else {
            e.dismiss;
        }
        },
        function (dismiss) {
            return false;
        })
    }
    </script>

    <script>
        function showParticipants(ids){
            $.ajax({
            url : '{{url('')}}/event/show',
            type : "POST",
            cache: false,
            data : {id:ids,_token:'{{csrf_token()}}'},
            success:function(res){
                $('.container-fluid').replaceWith(res);
            }
            });
        }

        function showDetailEvent(id){
            const event = list_event[id]
            $("#modal-showEvent").modal('show')
            //set ke default
            // $("#form-edit input:not([name='_token'])").val('')
            // $("#form-edit textarea").val('')
            // $("#form-edit select:not([name='is_verified'])").val('')

            $("#detail-event [name='id']").val(id)
            $("#detail-event [name='name']").text(event.name)
            $("#detail-event [name='audience_count']").text(event.audience_count)
            $("#detail-event [name='location']").text(event.location)
            const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
            let date = new Date(event.event_date)
            $("#detail-event [name='event_date']").text(date.getDate() + " " + months[date.getMonth()]  + " " + date.getFullYear())
            $("#detail-event [name='speaker']").text(event.speaker)
        }

        function eventEdit(id){
            const event = list_event[id]
            $("#modal-editEvent").modal('show')
            //set ke default
            // $("#form-edit input:not([name='_token'])").val('')
            // $("#form-edit textarea").val('')
            // $("#form-edit select:not([name='is_verified'])").val('')

            $("#edit-event [name='id']").val(id)
            $("#edit-event [name='name']").val(event.name)
            $("#edit-event [name='audience_count']").val(event.audience_count)
            $("#edit-event [name='location']").val(event.location)
            $("#edit-event [name='event_date']").val(event.event_date)
            $("#edit-event [name='speaker']").val(event.speaker)
        }

    </script>

    <script>
        function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        }
    </script>

    <!-- date-range-picker -->
    <script src="{{asset('plugins/components/moment/moment.js')}}"></script>
    <script src="{{asset('plugins/components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- jquery submit  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>


    <script>
    $(document).ready(function(){

        var fromDate = "";
        var toDate = "";

        $('#filter-date').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        });

        $('#filter-date').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        });

        $('#filter-date').daterangepicker({
        opens: 'center',
        autoUpdateInput: true,
        },

        // From to To date range function
        function(start, end) {
        var fromDate = start.format('YYYY/MM/DD');
        var toDate = end.format('YYYY/MM/DD');
        
        if(fromDate !== "" && toDate !== "") {
            $("#dateofevent [name='fromDate']").val(fromDate)
            $("#dateofevent [name='toDate']").val(toDate)
        }
        });
    });
    </script>

    <!-- Sweet-Alert  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
@endsection