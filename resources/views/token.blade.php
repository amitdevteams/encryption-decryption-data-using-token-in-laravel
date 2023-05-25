<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>hey amit</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
 
</head>
<body>


<div class="container">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <!-- {{-- model  open --}} -->
                        <div class="row">
                            <div class="col-md-8">
                                <button type="button" name="create_record" id="create_record" class="btn btn-primary ">Add Token</button>
                            </div>
                        </div>

                        <table id="WebAccessTable" class="table" data-order='[[ 0, "desc" ]]'>
                            <thead>
                                <!-- data fetching from database -->
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div id="formModal" class="modal fade" role="dialog">
                            <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-white" id="exampleModalLabel">Add Amit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Success Message after submit -->
                                        <span id="form_result" aria-hidden="true"></span>
                                        <!-- Error Message after form not submit -->
                                        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <!-- step -5 -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="text" name="email" id="email" class="form-control" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">City</label>
                                                        <input type="text" name="city" id="city" class="form-control" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Security Token</label>
                                                        <input type="text" name="user_security_token" id="user_security_token" maxlength="16" class="form-control" autocomplete="off" />
                                                        <span id="rchars">16</span> Character(s) Remaining
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ================ Sending admin_id and admin_email in hidden input box -->
                                            
                                            <!--================== Sending admin_id and admin_email in hidden input box end-->
                                    </div>
                                    <!-- <br /> -->
                                    <div class="form-group text-center">
                                        <input type="hidden" name="action" id="action" />
                                        <input type="hidden" name="hidden_id" id="hidden_id" />
                                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning float-center" value="Add" />
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="confirmModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <br>
                                    <span class="modal-title_delete">Confirmation</span>
                                </div>
                                <div class="modal-body">
                                    <h4 class="text-center" style="margin:0; color:red;">Are you sure you want to remove this Assets?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- {{-- model close --}} -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- webaccess view details open -->
<div id="webaccess_view_details" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="mymodal-title text-white" id="view_all_modal_title"> Webaccess Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <!-- Show Modal view Card start -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div>
                                <span><b>Name </b>*</span>
                                <span id="get_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div>
                                <span><b>Email </b>*</span>
                                <span id="get_email"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div>
                                <span><b>City </b>*</span>
                                <span id="get_city"></span>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- {{-- <span class="float-left"><a href="" class="btn btn-warning ml-2" data-toggle="modal" id="encrypt_add" data-target="#exampleModal">Decrypt data</a></span> --}} -->
                <div class="col-2">
                    <a href="" class="btn btn-warning ml-2" data-toggle="modal" id="encrypt_add" data-target="#exampleModal">Decrypt data</a>
                </div>
                <!-- <div class="col-10">
                    <p class="creden">Please enter your token id then you can see the credentials.</p>
                </div>
            </div>
            <!-- Show Modal view Card End -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- webaccess view details close -->
<!-- ################################ decrypt modal data open    ################# -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yaha pe aa gya kya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form  open --->
                <form id="encrypt_form" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Put Token</label>
                        <input type="text" class="form-control" id="vi_token_id" name="token">
                        <span style="color:red;font-size:12px; font-weight:bold;" id="err_token_id"></span>
                        <span style="color:green;font-size:12px; font-weight:bold;" id="success_token_id"></span>
                        <span style="color:blue;font-size:12px; font-weight:bold;" id="empty_record_data"></span>
                    </div>
                    <div class="form-group" id="password_form">
                        <label for="password">Name</label>
                        <input type="text" class="form-control" id="decrypt_name" name="password">
                    </div>
                    <div class="form-group" id="email_form">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="email_decrypt_name" name="email_address">
                    </div>
                   
                    <div class="form-group" id="city_form">
                        <label for="password">City</label>
                        <input type="text" class="form-control" id="decrypt_city_name" name="city_form">
                    </div>
                </form>
                <!-- form  close -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Check</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- ################################ decrypt modal data close   ################# -->


<!-- ############################## on edit page token will be find value open #####################  -->
<div class="modal fade" id="editTokenModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Put your valid id then you will see data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form  open --->
                <form id="edit_ency_token_form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Put Token</label>
                        <input type="text" class="form-control" id="validation_token_id" name="token">
                        <span id="plasewaitforeditModal" style="color:green;"></span>
                        <span id="noDataMyRecord" style="color:red;"></span>
                        <input type="hidden" name="user_id" id="user_id">

                        <span id="email_address_will_be_get"></span>
                </form>
                <!-- form  close -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Check</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ############################## on edit page token will be find value close #####################  -->

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->


@push('js')

<script>
    $(document).ready(function() {
        // image load
        window.addEventListener("load", function() {
            $(".loader").delay(500).fadeOut("slow");
        });

        // manger will be call on load page open
        userAuthId = $('#admin_id').val();
        console.log('what is coming in userAuthId : ' + userAuthId);
        organisation_id = $('#u_org_organization_id').val();
        console.log('organisation id ka ' + organisation_id);


        // manger will be call on load page close

        console.log('trying to call api');
        slug_id = $('#u_org_organization_id').val();
        // user_id = $('#user_id').val();
        var dt = $('#WebAccessTable').DataTable({
            // adding copy button
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5'
            ],
            language: {
                buttons: {
                    copyTitle: 'Copy Data',
                    copyKeys: 'Ctrl + C',
                    copySuccess: {
                        _: '%d lignes copiées',
                        1: '1 ligne copiée'
                    }
                }
            },
            // adding copy button end
            "ajax": {
                "paging": true,
                "scrollX": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "processing": true,
                "serverSide": true,
                "url": "{{ url('token')}}/" + slug_id,
                "dataSrc": 'data',
                "type": "GET",
                "datatype": "json",
                "crossDomain": true,
                "beforeSend": function(xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + localStorage.getItem(
                        'a_u_a_b_t'));
                }
            },
            processing: true,
            language: {
                processing: "<img src='../../../assets/images/loader.gif' style='z-index:1071;background-color:white;border-radius:8pt;padding-top:4pt;padding-bottom:4pt;position:fixed;top:0;right:0;bottom:0;left:0;margin:auto;'>"
            },

            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            data: {
                user_id
            },
            responsive: true,
            rowReorder: false,
            columnDefs: [{
                    "title": "ID",
                    "targets": 0,
                    "width": "5%"
                },
                {
                    "title": "Name",
                    "targets": 1,
                    "width": "20%"
                },
                {
                    "title": "Email",
                    "targets": 2,
                    "width": "30%"
                },
                {
                    "title": "City",
                    "targets": 3,
                    "width": "30%"
                },


                {
                    "title": "Action",
                    "targets": 3,
                    "width": "20%"
                },
            ],
            columns: [

                {
                    data: 'id'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<p class="label label-light-info"> ' + data['name'] + ' </p>'
                    },
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<p class="label label-light-info"> ' + data['email'] + ' </p>'
                    },
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<p class="label label-light-info"> ' + data['city'] + ' </p>'
                    },
                },

                {
                    data: null,
                    render: function(data, type, row) {
                        return '<div class="row"><div class="col-4"><button type="button"  id="' +
                            data['id'] +
                            '" class=" btn btn-warning view_details">Decrypt<i class="mdi mdi-eye"></i></button></div><div class="col-4"></div> </div>'
                    },
                },
            ],


        });
        // data table close
        // model will be display on add and edit button click
        $('#create_record').click(function() {
            $('#name_form').show();
            $('#sample_form')[0].reset();
            $('#form_result').html('');
            $('.modal-title').text("Add New Assets");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#email_address').html('').prop('disabled', false);
            $('#password').html('').prop('disabled', false);
            $('#formModal').modal('show');
        });
        // model will be close
        //  form working start
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            // data add working on submit button
            if ($('#action').val() == 'Add') {
                console.log('store api key ke upar hai');
                $.ajax({
                    url: "{{route('store.apikeys') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('a_u_a_b_t')
                    },
                    success: function(data) {
                        // adding alert messages
                        console.log(data.errors);
                        // adding alert messages for success and exist data validation open
                        var html = '';
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.message + '</div>';
                            $('#form_result').html(html);
                            setTimeout(function() {
                                $('#formModal').modal('hide');
                                $('#WebAccessTable').DataTable().ajax.reload();
                            }, 2000);
                        } else {
                            html = '<div class="alert alert-danger">' + data.message + '</div>';
                            $('#form_result').html(html);
                        }
                        // adding alert messages for success and exist data validation close

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        //    this function for hide with id #formModel
                        console.log('store  function kamm nahi kr rha hai');
                    }
                })
            }
            // update button wotking for updata data
            if ($('#action').val() == "Update") {
                console.log('update button pe click ho rha hai');
                $.ajax({
                    url: "{{url('/api/v1/j/webaccess/update/') }}",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    headers: {
                        "Authorization": "Bearer " + localStorage.getItem('a_u_a_b_t')
                    },
                    // message alert open
                    success: function(data) {
                        console.log('update ho gaya successfully');
                        // adding alert messages
                        console.log(data.errors);
                        // adding alert messages for success and exist data validation open
                        var html = '';
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.message + '</div>';
                            $('#form_result').html(html);
                            setTimeout(function() {
                                $('#formModal').modal('hide');

                                $('#WebAccessTable').DataTable().ajax.reload();
                            }, 2000);
                        } else {
                            html = '<div class="alert alert-danger">' + data.message + '</div>';
                            $('#form_result').html(html);
                        }
                        // adding alert messages for success and exist data validation close
                    },
                    // message alert close
                    error: function(data) {
                        console.log('Error:', data);
                        //    this function for hide with id #formModel
                        console.log('update function kamm nahi kr rha hai');
                    }
                });
            }
        });

        // #######################################  on edit token open   #######################################
        $(document).on('click', '.verification_token', function() {
            console.log('working edit button');
            $('#edit_ency_token_form')[0].reset();
            $("#noDataMyRecord").html('');
            var user_prim_id = $(this).attr('id');
            var user_prim_id_email = $(this).attr('admin_email');
            console.log('user ka id' + user_prim_id);
            $('#user_id').val(user_prim_id);
            $('#editTokenModal').modal('show');
        });
        // testing open
        // $('#vi_token_id').on('change', function () {
        // testing close
        // $('#validation_token_id').keyup(function (e) {
        $('#validation_token_id').on('change', function(e) {
            e.preventDefault();
            console.log('find token pe click huwa');
            var user_prim_id = $('#user_id').val();
            console.log("we are getting primary id " + user_prim_id);
            var input_user_token = $("#validation_token_id").val();
            console.log('user token ka value aya ki nahi be...' + input_user_token);
            // token based search function open
            taking_token_on_edit_page();
            // selector on keyword open
            function taking_token_on_edit_page() {
                $.ajax({
                    type: "GET",
                    url: "{{url('api/v1/j/edit_page_validate_vi_token_id')}}/" + input_user_token + '/' + user_prim_id,
                    data: {},
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem('a_u_a_b_t')
                    },
                    success: function(response) {
                        if (response.edit_decrypt_email_id != undefined) {
                            console.log("we found record");
                            $('#plasewaitforeditModal').html('plase wait..');
                            var input_user_token = $("#validation_token_id").val();
                            $('#user_token').val(input_user_token);
                            $('#maintenance_engineer').val(response.data.maintenance_engineer);
                            $('#page_url').prepend("<option value='" + response.data.page_url +
                                "' selected='selected'>" + response.data.page_url + "</option>");
                            $('#wiz_project_name').prepend("<option value='" + response.data.wizard_project_name +
                                "' selected='selected'>" + response.data.wizard_project_name + "</option>");
                            $('#website').val(response.data.website);
                            $('#user_name').val(response.data.user_name);
                            $('#password').val(response.return_edit_decrypt_pwd);
                            $("#email_address").val(response.edit_decrypt_email_id);
                            $('#type_of_task').prepend("<option value='" + response.data.type_of_task +
                                "' selected='selected'>" + response.data.type_of_task + "</option>");
                            $("#formModal").modal("show");
                            $('#action_button').val("Update");
                            $('#action').val("Update");
                            $('#formModal').modal('show');
                            $('#editTokenModal').hide();
                        } else {
                            console.log("no data in my records");
                            $("#noDataMyRecord").html("no data in my records");
                            $('#plasewaitforeditModal').hide('plase wait..');
                        }
                    },
                    error: function(errorResponse) {
                        console.log("sorry !! " + errorResponse);
                    }
                });
            }
        });

        $(document).on('click', '.view_details', function() {
            console.log('clicked on view details');
            $('#name_form').show();
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                type: "get",
                data: {},
                url: "{{url('webaccess/edittoken')}}/" + id,

                // url: "{{url('/api/v1/j/webaccess/edit/')}}/" + id,
                headers: {
                    "Authorization": "Bearer " + localStorage.getItem('a_u_a_b_t')
                },
                success: function(html) {
                    console.log('token get edit page data open');
                    console.log(html);
                    //open
                    // close
                    var name_coming = html.data.name;
                    var email_coming = html.data.email;
                    var city_coming = html.data.city;
                    var token_coming = html.data.token;

                    $('#get_name').html(name_coming);
                    $('#get_email').html(email_coming);
                    $('#get_city').html(city_coming);
                    $('#get_token').html(token_coming);

                    $('#view_all_modal_title').text("Token Details");
                    $('.modal-title_delete').text("Assets Delete");
                    $('#action_button').val("Update");
                    $('#action').val("Update");
                    $('#webaccess_view_details').modal('show');
                    $('#hidden_id').val(id);
                }
            })
            // ============================ email and pwd encrypt open ================================================
            $('#encrypt_add').click(function() {
                $('#encrypt_form')[0].reset();
                console.log("form reload ho gaya");
                $('#success_token_id').html('');
                $('#empty_record_data').html('');
                $('#err_token_id').html('');
                $('#email_form').hide();
                $('#password_form').hide();
                $('#city_form').hide();
            });
            var user_getting_id = $(this).attr('id');
            console.log("id mil gaya 894 main" + user_getting_id);
            $('#vi_token_id').on('change', function() {
                var get_token_id = $("#vi_token_id").val();
                calling_token_id();
                // selector on keyword open
                function calling_token_id() {
                    $.ajax({
                        "type": "GET",
                        "url": "{{url('webaccess/encrypt_decrypt_new_token')}}/" + get_token_id + '/' + user_getting_id,
                        "data": {},
                        "headers": {
                            "Authorization": "Bearer " + localStorage.getItem('a_u_a_b_t')
                        },
                        beforeSend: function beforeSend() {
                            if ($('#vi_token_id').val().length == 16) {
                                $('#success_token_id').html('please wait..');
                            } else {
                                $('#err_token_id').html("please enter valid security code 16 digit");
                                return false;
                                $("#empty_record_data").hide("");
                                console.log("we need 16 digit value");
                            }
                        },
                        success: function(response) {
                            if (response.getting_decrypt_data_email != undefined) {
                                console.log("hell recound getting");
                                var user_email_view = response.getting_decrypt_data_email;
                                var user_name = response.getting_decrypt_name_id;
                                var user_pwd_view = response.getting_pwd_dcrypt;
                                var user_city_name = response.getting_decrypt_city_id;
                                $("#decrypt_name").val(user_name);
                                console.log("decrypt name me kya aa rha hai".decrypt_name);
                                console.log("userEmail" + user_email_view);
                                $("#email_decrypt_name").val(user_email_view);
                                $("#decrypt_city_name").val(user_city_name);
                                $("#password_decrypt").val(user_pwd_view);
                                $('#email_form').show();
                                $('#password_form').show();
                                $('#city_form').show();
                                $("#success_token_id").hide();
                                $("#empty_record_data").hide();
                            } else {
                                console.log("no data in my record");
                                $('#success_token_id').hide('please wait..');
                                $("#empty_record_data").html("sorry no found data in record");
                                $('#err_token_id').hide();
                                $('#email_form').hide();
                                $('#password_form').hide();
                                $('#city_form').hide();
                            }
                        },
                        error: function(errorResponse) {
                            console.log("sorry !! " + errorResponse);
                        }
                    });
                }
            });
            // ============================ email and pwd encrypt close ================================================
        }); // view details close

    });
</script>
<script type="text/javascript">

        $(document).ready(function () {

            $('#myTable').DataTable();

        });

    </script>
</body>