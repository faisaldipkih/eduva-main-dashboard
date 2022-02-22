@extends('layouts.app')
@section('title', 'Scholarship')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(<?= asset('vend/img/icons/spot-illustrations/corner-4.png') ?>);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Info Scholarship</h3>
                    <p class="mb-0">Informasi scholarship.</p>
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
                    <h5 class="mb-0">Table Info Scholarship</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            {{-- <div class="table-responsive scrollbar"> --}}
                <table id="table" class="table table-sm table-bordered table-striped nowrap mb-0 fs--1 w-100">
                    <thead class="bg-200">
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>banner</th>
                            <th>Exp Time</th>
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
                        <h4 class="mb-1" id="modalExampleDemoLabel">Form Program</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form id="form-scholarship">
                            <div class="row">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="col-lg-10 row">
                                    <label for="judul" class="form-label col-lg-4 d-flex align-items-center">Judul<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="tittle" id="judul" class="form-control" placeholder="Judul seminar">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 row">
                                    <label for="deskripsi" class="form-label col-lg-4 d-flex align-items-center">Deskripsi<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <textarea name="description" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 row">
                                    <label for="deadline" class="form-label col-lg-4 d-flex align-items-center">EXP Time<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="text" name="expired_time" id="deadline" class="form-control">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 row">
                                    <label for="banner" class="form-label col-lg-4 d-flex align-items-center">Banner</label>
                                    <div class="col-lg-8 col-img">
                                        <input type="file" name="banner" id="banner" class="form-control">
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
            ajax:"{{ config('constants.LINK_API') }}api/getInfoScholarship",
            columns:[
            {
                data:'tittle'
            },
            {
                data:null,
                render:function(data,type,row){
                    let desk = data.description.slice(0,20);
                    return desk+`... <a href='javascript:void(0)'>Read More</a>`;
                }
            },
            {
                data:null,
                render:function(data,type,row){
                    let rend;
                    if(data.banner == null){
                        rend = '<p class="text-danger"><i>Banner tidak ada</i></p>';
                    }else{
                        rend =`<a href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#modal-img" id="btn-img" data-img="${data.banner}"><img src="${data.banner}" alt="" width="80"></a>`;
                    }
                    return rend;
                }
            },
            {
                data:null,
                render:function(data,type,row){
                    return dateTime(data.expired_time);
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
            link = 'info-scholarship/store';
            $('#form-scholarship')[0].reset();
        })

        $('#table').on('click','.btn-edit',function () {
            link = 'info-scholarship/update';
            $.ajax({
                type: "GET",
                url: "{{ config('constants.LINK_API') }}api/infoScholarship/"+$(this).data('edit'),
                dataType: "JSON",
                success: function (response) {
                    $("[name='id']").val(response.data.id);
                    $("[name='tittle']").val(response.data.tittle);
                    $("[name='description']").val(response.data.description);
                    $("[name='expired_time']").val(response.data.expired_time);
                }
            });

        })
        $('#table').on('click','.btn-delete',function () {
            $.ajax({
                type: "DELETE",
                url: "{{ config('constants.LINK_API') }}api/delete/infoScholarship/"+$(this).data('delete'),
                dataType: "JSON",
                success: function (response) {
                    if(response.status === true){
                        Swal.fire('Berhasil',response.message,'success').then((result)=>{
                            $('#table').DataTable().ajax.reload();
                        });
                    }else{
                        Swal.fire('Gagal','Gagal Delete Info Training Program','error');
                    }
                }
            });
        })
        $('#table').on('click','#btn-img',function(){
            $('.modal-img').html(`<img src="${$(this).data('img')}"/>`)
        });

        $('#form-scholarship').submit(function(e){
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
                            $('#form-scholarship')[0].reset();
                        });
                    }else{
                        Swal.fire('Gagal',response.message,'error');
                    }
                }
            });
        })
    </script>
@endsection