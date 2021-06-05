    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">{{$event->name}}</h3>
                    <p class="text-muted">Daftar Peserta</p>
                    <div class="text-right m-b-15">
                        <a class="btn btn-primary" href="{{route('audience.export',[$hash->encodeHex($event->id)])}}">Download</a>
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">##</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($audiences as $audience)
                                <tr style="cursor:pointer" title="Detail Audience" class="mr-2" id="modalShow"
                                    data-toggle="modal" data-target="#modal-showModal"
                                    data-name = "{{$audience->name}}"
                                    data-email = "{{$audience->email}}"
                                    data-phone = "{{$audience->phone}}"
                                    data-gender = "{{$audience->gender}}"
                                    data-skills = "{{$audience->skills}}"
                                    data-profession = "{{$audience->profession}}"
                                    data-company = "{{$audience->company}}"
                                >
                                    <td scope="row">{{ $loop->iteration}}</td>
                                    <td>{{$audience->name}}</td>
                                    <td>{{$audience->email}}</td>
                                    <td>{{$audience->phone}}</td>
                                    <td class="text-center"><a><i class="fa fa-eye"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div id="modal-showModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Audience Detail</h4>
                </div>
                <div class="modal-body" id="detail-audience">
                    <div class="row text-center border-bottom">
                        <div class="col m-b-25"> <strong>Name</strong>
                            <br>
                            <span name="name"></span>
                        </div>
                    </div>

                    <table class="table table-hover">
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
                                <span name="gender">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Skills</strong>
                                <br>
                                <span name="skills"></span>
                            </td>
                            <td>
                                <strong>Profession</strong>
                                <br>
                                <span name="profession"></span>
                            </td>
                            <td>
                                <strong>Company</strong>
                                <br>
                                <span name="company"></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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
        });
    </script>

<script>
$(document).ready(function() {
    $(document).on('click', '#modalShow',function(){
      var name = $(this).data('name');
      var email = $(this).data('email');
      var phone = $(this).data('phone');
      var gender = $(this).data('gender');
      var skills = $(this).data('skills');
      var profession = $(this).data('profession');
      var company = $(this).data('company');
      $("#detail-audience [name='name']").text(name);
      $("#detail-audience [name='email']").text(email);
      $("#detail-audience [name='phone']").text(phone);
      $("#detail-audience [name='gender']").text(gender);
      $("#detail-audience [name='skills']").text(skills);
      $("#detail-audience [name='profession']").text(profession);
      $("#detail-audience [name='company']").text(company);
    })
  });
</script>