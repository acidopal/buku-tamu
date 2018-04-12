@extends('layouts.app')

@section('title', 'Buku Tamu |')
@section('style')
        <!-- Toastr css -->
        <script type="text/javascript" src="js/webcam.min.js"></script>
        <!-- Sweet Alert css -->
        <link href="plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0">Selamat datang di SMK Informatika Pesat</h4>
                <div class="button-list">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Isi Buku Tamu</button>
                </div>
                </div>
            <!-- end row -->
            </div>
        <!-- container -->
    </div>
    <!-- content -->

    <!-- #content -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>Nama Orangtua</th>
                            <th>Nama Anak</th>
                            <th>Kelas</th>
                            <th>Nomor HP</th>
                            <th>Foto</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($bukutamus as $bukutamu)
                        <tr>
                            <td>
                                <b>{{$no++}}</b>
                            </td>
                            <td>
                                 {{$bukutamu->nama_ortu}}
                            </td>
    
                            <td>
                                 {{$bukutamu->nama_siswa}}
                            </td>
    
                            <td>
                                 {{$bukutamu->kelas}}
                            </td>
    
                            <td>
                                 {{$bukutamu->no_hp}}
                            </td>
    
                            <td>
                                <a href="javascript: void(0);">
                                    <img src="images/{{$bukutamu->foto_bukutamu}}" alt="{{$bukutamu->foto_bukutamu}}" title="{{$bukutamu->foto_bukutamu}}" class="rounded-circle" />
                                </a>
                            </td>
    
                           <td>
                                <button type="button" class="btn btn-sm btn-custom waves-effect waves-light"><i class="mdi mdi-plus"></i></button>
                                <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"  onclick="return destroy('{{$bukutamu->id}}');"><i class="mdi mdi-minus"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Buku Tamu</h4>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                            <div class="col-lg-6">
                                    <form action="bukutamu/add" id="bukutamu" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="nama_ortu">Nama Orangtua<span class="text-danger">*</span></label>
                                            <input type="text" parsley-trigger="change" required="" placeholder="Masukan Nama Orangtua" class="form-control" name="nama_ortu" id="nama_ortu">
                                        </div>
                                       <div class="form-group">
                                            <label for="nama_siswa">Nama Siswa<span class="text-danger">*</span></label>
                                            <input type="text" parsley-trigger="change" required="" placeholder="Masukan Nama Siswa" class="form-control" name="nama_siswa" id="nama_siswa">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">Nomor HP<span class="text-danger">*</span></label>
                                            <input type="text" parsley-trigger="change" required="" placeholder="Masukan Nama Orangtua" class="form-control" name="no_hp" id="no_hp" maxlength="14">
                                        </div>
                                        <input type="hidden" class="form-control" name="foto_bukutamu" id="foto_bukutamu" >
                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-custom waves-effect waves-light" type="button" onclick="return store();" data-dismiss="modal" >
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                            </div>
                            <!-- end col -->
                             <div class="col-lg-6">
	                            <div id="my_camera"></div>
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- end col -->
        <!-- end col -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="plugins/jquery-toastr/jquery.toast.min.js" type="text/javascript"></script>
    <script src="plugins/sweet-alert/sweetalert2.min.js"></script>
    <script language="JavaScript">
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
        var APP_URL = {!! json_encode(url('/')) !!};
        
        var shutter = new Audio();
            shutter.autoplay = false;
            shutter.src = navigator.userAgent.match(/Firefox/) ? APP_URL+'/js/shutter.ogg' : APP_URL+'/js/shutter.mp3';
            Webcam.set({
            width: 320,
            height: 240,
            image_format: 'png',
            jpeg_quality: 90
        });

        Webcam.attach( '#my_camera' );
        function take_snapshot_bukutamu() {
            shutter.play();
            Webcam.snap( function(data_uri) {
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                    $('#foto_bukutamu').val(raw_image_data);
            } );
        }

        function store(){
            take_snapshot_bukutamu();
            $.ajax({
                url: '{{url("bukutamu/store") }}',
                data: new FormData($("#bukutamu")[0]),
                type:'post',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                     $.toast({
                        heading: response.title,
                        text: response.text,
                        position: 'top-right',
                        loaderBg: '#5ba035',
                        icon:  response.type,
                        hideAfter: 3000,
                        stack: 1
                    });
                }
            });
        }    


        function destroy(id) {
             swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
                 $.ajax({ 
                        method: "POST",
                        dataType: "json",
                        url: '{{ url("bukutamu/destroy") }}'+"/"+id,
                        data: "id="+id,
                        success: function(data){
                            swal({
                                title: 'Deleted !',
                                text: "Your file has been deleted",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            })
                        }
                    })
                
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Cancelled',
                        text: "Your imaginary file is safe :)",
                        type: 'error',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }
                    )
                }
            })
        }
    </script>
@endsection
                