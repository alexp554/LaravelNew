@extends('layouts.main')

@section('title','Member List')

@section('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row m-0">
    <div class="col-md-4 col-sm-6 info-box">
        <div class="media">
            <div class="media-left">
                <span class="icoleaf bg-success text-white"><i class="icon-people fa-fw"></i></span>
            </div>
            <div class="media-body">
                <h3 class="info-count text-blue">{{$widget['totalMember']}}</h3>
                <p class="info-text font-12">Total Member</p>
                <span class="hr-line"></span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 info-box">
        <div class="media">
            <div class="media-left">
                <span class="icoleaf bg-info text-white"><i class="mdi mdi-check"></i></span>
            </div>
            <div class="media-body">
                <h3 class="info-count text-blue">{{$widget['verifiedMember']}}</h3>
                <p class="info-text font-12">Verified Member</p>
                <span class="hr-line"></span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 info-box">
        <div class="media">
            <div class="media-left">
                <span class="icoleaf bg-danger text-white"><i class="mdi mdi-close"></i></span>
            </div>
            <div class="media-body">
                <h3 class="info-count text-blue">{{ $widget['unverifiedMember'] }}</h3>
                <p class="info-text font-12">Unverified Member</p>
                <span class="hr-line"></span>
            </div>
        </div>
    </div>
</div>

<div class="row m-5 text-right">
    <br>
    <button class="btn btn-info waves-effect waves-light" type="button" onclick="myFunction()">Show/Hide Member Summary</button>
</div>

<div class="container-fluid">
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
                    <div class="col-md-6">
                        <h5>Member By Profession</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Startup</th>
                                        <th>Freelance</th>
                                        <th>Employee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $summary['byProfession']['Student'] }}</td>
                                        <td>{{ $summary['byProfession']['Startup'] }}</td>
                                        <td>{{ $summary['byProfession']['Freelance'] }}</td>
                                        <td>{{ $summary['byProfession']['Employee'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Member By Skill Category</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Hacker</th>
                                        <th>Hipster</th>
                                        <th>Hustler</th>
                                        <th>Other</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $summary['bySkill']['hacker'] }}</td>
                                        <td>{{ $summary['bySkill']['hipster'] }}</td>
                                        <td>{{ $summary['bySkill']['hustler'] }}</td>
                                        <td>{{ $summary['bySkill']['other'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Member By Age</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>< 20th</th>
                                        <th>20-30th</th>
                                        <th>30-40th</th>
                                        <th>> 40th</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $summary['byAge']['<20'] }}</td>
                                        <td>{{ $summary['byAge']['20-30'] }}</td>
                                        <td>{{ $summary['byAge']['30-40'] }}</td>
                                        <td>{{ $summary['byAge']['>40'] }}</td>
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
                <div class="row">
                    <div class="col-md-3">
                        <label>Profession</label>
                        <select id="filter-profession" class="form-control filter">
                        <option value="">All</option>
                        <option value="Student">Student</option>
                        <option value="Startup">Startup</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Employee">Employee</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Expertise Categories</label>
                        <select id="filter-expertise" class="form-control filter">
                        <option value="">All</option>
                        <option value="Hacker">Hacker</option>
                        <option value="Hustler">Hustler</option>
                        <option value="Hipster">Hipster</option>
                        <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Status</label>
                        <select id="filter-status" class="form-control filter">
                        <option value="">All</option>
                        <option value="1">Verified</option>
                        <option value="0">Unverified</option>
                        <option value="2">New Member</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Gender</label>
                        <select id="filter-gender" class="form-control filter">
                        <option value="">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row text-right m-5">
                    <form id="exportFilter" action="{{url('/memberList/export')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="profession">
                        <input type="hidden" name="expertise">
                        <input type="hidden" name="status">
                        <input type="hidden" name="gender">
                        <button class="btn btn-success" type="submit"> Download </button>
                    </form>
                </div>
                <hr>
                <h3 class="box-title m-b-30">Member List</h3>
                <div class="table-responsive">
                    <table id="dataMember" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>###</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sample modal content -->
<div class="modal fade bs-example-modal-lg" id="modal-showMember" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="detail-member">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Member Detail</h4>
            </div>
            <div class="modal-body">
                <div class="row text-center mb-5">
                    <div class="col"> <strong>Name</strong>
                        <br>
                        <span name="name"></span>
                    </div>
                </div>
                <div class="row m-5">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <strong>Email</strong>
                                <br>
                                <span name="email"></span>
                            </td>
                            <td>
                                <strong>Phone</strong>
                                <br>
                                <span name="phone"></span>
                            </td>
                            <td>
                                <strong>Gender</strong>
                                <br>
                                <span name="gender"></span>
                            </td>
                            <td>
                                <strong>Date of Birth</strong>
                                <br>
                                <span name="dob"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Profession</strong>
                                <br>
                                <span name="profession"></span>
                            </td>
                            <td>
                                <strong>Bussiness Category</strong>
                                <br>
                                <span name="bc"></span>
                            </td>
                            <td>
                                <strong>Company</strong>
                                <br>
                                <span name="company"></span>
                            </td>
                            <td>
                                <strong>City</strong>
                                <br>
                                <span name="city"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Instagram</strong>
                                <br>
                                <span name="instagram"></span>
                            </td>
                            <td>
                                <strong>Facebook</strong>
                                <br>
                                <span name="facebook"></span>
                            </td>
                            <td>
                                <strong>LinkedIn</strong>
                                <br>
                                <span name="linkedin"></span>
                            </td>
                            <td>
                                <h3><span class="badge badge-primary" name="is_verified"><i class="fas fa-check"></i></span></h3>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row m-5">
                    <form id="form-editWifi" method="post" action="{{url('memberList/updateWifi')}}" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id">
                        <div class="row m-3" id="form-edit">
                            <div class="col-md-4">
                                <label class="mt-3">Wifi Username</label>
                                <input type="text" name="wifi_username" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="mt-3">Wifi SSID</label>
                                <input type="text" name="wifi_ssid" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="mt-3">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input class="form-control" type="password" name="wifi_password">
                                        <div class="input-group-addon">
                                        <a><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-mr-5 text-right">
                            <div class="col">
                                <button class="btn btn-warning" type="submit">Save Wifi Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection

@section('js')
    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        let list_member = [];
  
        let profession = $("#filter-profession").val()
        ,status = $("#filter-status").val()
        ,gender = $("#filter-gender").val()
        ,expertise = $("#filter-expertise").val()
        
        const table = $('#dataMember').DataTable({
        "pageLength" : 10,
        "lengthMenu" : [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'all']],
        "bLengthChange" : true,
        "bFilter" : true,
        "bInfo" : true,
        "processing": true,
        "bServerSide" : true,
        "order": [0,"desc"],
        ajax:{
        url: "{{url('')}}/memberList/data",
        type: "POST",
        data:function(d){
            d.profession = profession;
            d.status = status;
            d.gender = gender;
            d.expertise = expertise;
            return d
        }
        },
        columnDefs: [
        { targets: '_all', visible: true},
        {
            "targets" : 0,
            "class" : "text-nowrap",
            "render": function(data,type,row,meta){
            list_member[row.id] = row;
            return row.id;
            }
        },
        {
            "targets" : 1,
            "class" : "text-nowrap",
            "render": function(data,type,row,meta){
            let show = `<a onclick="showDetailMember('${row.id}')" title="Detail Member" href="javascript:;" class="mr-2">${row.name}</i></a>`
            return show;
            }
        },
        {
            "targets" : 2,
            "class" : "text-nowrap",
            "render": function(data,type,row,meta){
            return row.email;
            }
        },
        {
            "targets" : 3,
            "class" : "text-nowrap",
            "render": function(data,type,row,meta){
            return row.gender;
            }
        },
        {
            "targets" : 4,
            "class" : "text-nowrap",
            "render": function(data,type,row,meta){
            let approval = ``;
            if(row.is_verified == 1){
                approval+=`<button class="tst3 btn btn-success btn-sm waves-effect waves-light" type="button" onclick="toggleStatus('${row.id}')" title="Klik untuk Unverifikasi"><span class="btn-label"><i class="fa fa-check"></i></span>Verified</button>`
            }
            else{
                if(row.is_checked == 0){
                    approval+=`<div class="btn-group m-r-10">
                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-star"></i></span>New Member <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a onclick="toggleStatus('${row.id}')" href="javascript:;" class="dropdown-item" title="Klik Untuk Verifikasi">Verified</a></li>
                                    <li><a onclick="rejectStatus('${row.id}')" href="javascript:;" class="dropdown-item" title="Klik Untuk Reject">Reject</a></li>
                                </ul>
                            </div>`
                            
                }
                else{
                approval+=`<button class="btn btn-danger btn-sm waves-effect waves-light" type="button" onclick="toggleStatus('${row.id}')" title="Klik untuk Verifikasi"><span class="btn-label"><i class="fa fa-check"></i></span>Unverified</button>`
                }
            }
            return approval;
            }
        },
        {
            "targets" : 5,
            "sortable":false,
            "class" : "text-center",
            "render": function(data,type,row,meta){
            let show = `<a onclick="showDetailMember('${row.id}')" title="Detail Member" href="javascript:;"><i class="fa fa-eye text-inverse m-r-10"></i></a>`
            show+= `<a onclick="destroy('${row.id}')" title="Hapus Member" style="cursor: pointer; color:red"><i class="fa fa-trash"></i></a>`
            return show;
            }
        }
        ]
    });

    $(".filter").on('change',function(){
        profession = $("#filter-profession").val()
        status = $("#filter-status").val()
        gender = $("#filter-gender").val()
        expertise = $("#filter-expertise").val()

        $("#exportFilter [name='profession']").val(profession)
        $("#exportFilter [name='status']").val(status)
        $("#exportFilter [name='gender']").val(gender)
        $("#exportFilter [name='expertise']").val(expertise)

        // var href_untuk_download = ini perlu diolah;
        // $("#exporFilter").attr('href',href_untuk_download)

        table.ajax.reload(null,false)
    })

    $("#form-editWifi").on('submit',function(e){
        e.preventDefault()

        $("#form-editWifi").ajaxSubmit({
            success:function(res){
                if(res===true){
                    toastr.success("Wifi Info has been updated", 'Success')
                    table.ajax.reload(null,false)
                    $("#modal-showMember").modal('hide')
                }
            }
        })
    })

    function showDetailMember(id){
        const member = list_member[id]
        $("#modal-showMember").modal('show')
        //set ke default
        $("#form-edit input:not([name='_token'])").val('')
        $("#form-edit textarea").val('')
        $("#form-edit select:not([name='is_verified'])").val('')

        $("#detail-member [name='id']").val(id)
        $("#detail-member [name='name']").text(member.name)
        $("#detail-member [name='email']").text(member.email)
        $("#detail-member [name='gender']").text(member.gender)
        const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let date = new Date(member.dob)
        $("#detail-member [name='dob']").text(date.getDate() + " " + months[date.getMonth()]  + " " + date.getFullYear())
        $("#detail-member [name='bc']").text(member.bc)
        $("#detail-member [name='company']").text(member.company)
        $("#detail-member [name='city']").text(member.city)
        $("#detail-member [name='phone']").text(member.phone)
        $("#detail-member [name='profession']").text(member.profession)
        $("#detail-member [name='expertises']").text(JSON.parse(member.expertises))
        $("#detail-member [name='expertise_categories']").text(JSON.parse(member.expertise_categories))
        $("#detail-member [name='instagram']").text(member.instagram)
        $("#detail-member [name='linkedin']").text(member.linkedin)
        $("#detail-member [name='facebook']").text(member.facebook)
        $("#detail-member [name='wifi_username']").text(member.wifi_username)
        if(member.is_verified == 1){
        $("#detail-member [name='is_verified']").text('Verified')
        }
        else{
        $("#detail-member [name='is_verified']").text('Unverified')
        }
        
        $("#form-edit [name='wifi_username']").val(member.wifi_username)
        $("#form-edit [name='wifi_ssid']").val(member.wifi_ssid)
        if(member.wifi_password == null){
        $("#form-edit [name='wifi_password']").val(member.wifi_password)
        }
        else{
        wifi_password = atob(member.wifi_password)
        $("#form-edit [name='wifi_password']").val(wifi_password)
        }
    }

    function toggleStatus(id){
        swal({
            title: "Change Status?",
            text: "Please ensure and then confirm!",
            type: "question",
            showCancelButton: !0,
            confirmButtonText: "Yes!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if(e.value===true){
            let member = list_member[id]
            let status_update = ''
            let status_checked = ''
            if(member.is_verified == 1){
                status_update = 0
                status_checked = 1
            }
            else{
                status_update = 1
                status_checked = 1
            }
            $.ajax({
                url:'{{url('')}}/memberList/update_status',
                method: 'POST',
                data:{id:id,is_verified:status_update,is_checked:status_checked,_token:'{{csrf_token()}}'},
                success:function(res){
                if(res===true){
                    table.ajax.reload(null,false)
                }
                }
            })
            toastr.success("Member status has been changed", 'Success')
            }else {
            e.dismiss;
            }
        },
        function (dismiss) {
            return false;
        })
    }

    function rejectStatus(id){
        swal({
            title: "Reject?",
            text: "Please ensure and then confirm!",
            type: "question",
            showCancelButton: !0,
            confirmButtonText: "Yes",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {
            if(e.value===true){
            let member = list_member[id]
            let status_checked = ''
            status_checked = 1
            $.ajax({
                url:'{{url('')}}/memberList/update_checked',
                method: 'POST',
                data:{id:id,is_checked:status_checked,_token:'{{csrf_token()}}'},
                success:function(res){
                if(res===true){
                    table.ajax.reload(null,false)
                }
                }
            })
            toastr.success("Member status has been changed", 'Success')
            }else {
            e.dismiss;
            }
        },
        function (dismiss) {
            return false;
        })
    }
    
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
            let member = list_member[id]
            let delete_member = ''
            $.ajax({
            url:'{{url('')}}/memberList/destroy',
            method: 'delete',
            data:{id:id,_token:'{{csrf_token()}}'},
            success:function(res){
                if(res===true){
                table.ajax.reload(null,false)
                }
            }
            })
            toastr.success("Member's data has been deleted", 'Success')
        }else {
            e.dismiss;
        }
        },
        function (dismiss) {
            return false;
        })
    }
    </script>
    <!--Style Switcher -->
    <script src="{{asset('plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
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
    <!-- Sweet-Alert  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <!-- jquery submit  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script>
        function togglepwd() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
    </script>
@endsection