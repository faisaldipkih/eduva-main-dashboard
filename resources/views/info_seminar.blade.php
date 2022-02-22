@extends('layouts.app')
@section('title', 'Info Seminar')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(<?= asset('vend/img/icons/spot-illustrations/corner-4.png') ?>);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Informasi Seminar</h3>
                    <p class="mb-0">Data Seminar.</p>
                </div>
                <div class="col-lg-4">
                    <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Basic example">
                        <a href="javascript:void(0)" class="btn btn-secondary btn-info btn-add" data-bs-toggle="modal"
                            data-bs-target="#modal"><span class="fas fa-plus me-1"></span>Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Table Seminar</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            {{-- <div class="table-responsive"> --}}
                <table id="table" class="table table-sm table-bordered table-striped nowrap mb-0 fs--1 w-100">
                    <thead class="bg-200">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Foto</th>
                            <th>Datetime</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            {{-- </div> --}}
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base btn-cancel"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Form Seminar</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form id="form-seminar">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="col-lg-10 row">
                                    <label for="judul" class="form-label col-lg-4 d-flex align-items-center">Judul<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul seminar">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 row">
                                    <label for="deskripsi" class="form-label col-lg-4 d-flex align-items-center">Deskripsi<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>                            
                                <div class="col-lg-10 row">
                                    <label for="link" class="form-label col-lg-4 d-flex align-items-center">Link<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="link" id="link" class="form-control" placeholder="Link seminar">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 row">
                                    <label for="deadline" class="form-label col-lg-4 d-flex align-items-center">Deadline<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="reg_deadline" id="deadline" class="form-control">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 row">
                                    <label for="foto" class="form-label col-lg-4 d-flex align-items-center">Foto</label>
                                    <div class="col-lg-8 col-img">
                                        <input type="file" name="foto" id="foto" class="form-control">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-2 d-flex align-items-center" hidden>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary edit-img">Edit</a>
                                    </div> --}}
                                </div>
                            
                            </div>
                            
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-cancel" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.modal_include')
@endsection

@section('script')
    <script>
        let link;
        let tableLoad = $('#table').DataTable({
            ordering:false,
            serverSide:false,
            scrollX:true,
            ajax:"{{ config('constants.LINK_API') }}api/getinfoSeminarWebinar",
            columns:[
            {
                data:'judul'
            },
            {
                data:'deskripsi'
            },
            {
                data:null,
                render:function(data,type,row){
                    return `<a href="${data.link}" class="btn"><i class="fas fa-link"></i></a>`;
                }
            },
            {
                data:null,
                render:function(data,type,row){
                    let rend;
                    if(data.foto == null){
                        rend = '<p class="text-danger"><i>Foto tidak ada</i></p>';
                    }else{
                        rend =`<a href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#modal-img" id="btn-img" data-img="${data.foto}"><img src="${data.foto}" alt="" width="80"></a>`;
                    }
                    return rend;
                }
            },
            {
                data:null,
                render:function(data,type,row){
                    return dateTime(data.datetime);
                }
            },
            {
                data:null,
                render:function(data,type,row){
                    return dateTime(data.reg_deadline);
                }
            },
            {
                data:null,
                render:function(data,type,row){
                    return `<button class="btn p-0 btn-edit" type="button" data-bs-toggle="modal" data-bs-target="#modal" title="Edit" data-edit="${data.id}"><span class="text-500 fas fa-edit"></span></button><button class="btn p-0 ms-2 btn-delete" type="button" title="Delete" data-delete="${data.id}"><span class="text-500 fas fa-trash-alt"></span></button>`;
                }
            }]
        })

        $(document).ready(function () {
            tableLoad;
            $('#deadline').datetimepicker();
        });

        $('.btn-add').click(function () {
            link = 'info-seminar/store';
            $('#form-seminar')[0].reset();
        })

        $('#table').on('click','.btn-edit',function () {
            link = 'info-seminar/update';
            $.ajax({
                type: "GET",
                url: "{{ config('constants.LINK_API') }}api/getinfoSeminarWebinar/"+$(this).data('edit'),
                dataType: "JSON",
                success: function (response) {
                    $("[name='id']").val(response.data.id);
                    $("[name='judul']").val(response.data.judul);
                    $("[name='deskripsi']").val(response.data.deskripsi);
                    $("[name='link']").val(response.data.link);
                    $("[name='reg_deadline']").val(response.data.reg_deadline);
                }
            });

        })
        $('#table').on('click','.btn-delete',function () {
            $.ajax({
                type: "DELETE",
                url: "{{ config('constants.LINK_API') }}api/delete/infoSeminarWebinar/"+$(this).data('delete'),
                dataType: "JSON",
                success: function (response) {
                    if(response.status === true){
                        Swal.fire('Berhasil',response.message,'success').then((result)=>{
                            $('#table').DataTable().ajax.reload();
                        });
                    }else{
                        Swal.fire('Gagal','Gagal Delete Info Seminar Webina','error');
                    }
                }
            });
        })
        $('#table').on('click','#btn-img',function(){
            $('.modal-img').html(`<img src="${$(this).data('img')}"/>`)
        })
        $('#form-seminar').submit(function(e){
            e.preventDefault();
            let data = new FormData(this);
            $.ajax({
                type: "POST",
                url: link,
                data: data,
                processData:false,
                contentType:false,
                cache:false,
                async:false,
                dataType: "JSON",
                success: function (response) {
                    if(response.status === true){
                        Swal.fire('Berhasil',response.message,'success').then((result)=>{
                            $('#table').DataTable().ajax.reload();
                            $('#modal').modal('hide');
                            $('#form-seminar')[0].reset();
                        });
                    }else{
                        Swal.fire('Gagal',response.message,'error');
                    }
                }
            });
        })
    </script>
@endsection