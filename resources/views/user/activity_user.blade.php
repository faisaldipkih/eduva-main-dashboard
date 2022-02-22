@extends('layouts.app')
@section('title', 'Activity User')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url(<?= asset('vend/img/icons/spot-illustrations/corner-4.png') ?>);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Activity User</h3>
                    <p class="mb-0">Data activity user.</p>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Basic example">
                        <a href="javascript:void(0)" class="btn btn-secondary btn-info btn-add" data-bs-toggle="modal"
                            data-bs-target="#modal-user"><span class="fas fa-plus me-1"></span>Add</a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-warning btn-edit">Edit<span
                                class="fas fa-edit ms-1" data-bs-toggle="modal" data-bs-target="#modal-user"></span></a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-danger btn-delete">Delete<span
                                class="fas fa-trash ms-1"></span></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                    <h5 class="mb-0">Table Activity</h5>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            {{-- <div class="table-responsive scrollbar"> --}}
                <table id="table" class="table table-sm table-bordered table-striped nowrap mb-0 fs--1 w-100">
                    <thead class="bg-200">
                        <tr>
                            {{-- <th><input class="form-check-input" type="checkbox" value="" id="checkAll"></th> --}}
                            <th>Username</th>
                            <th>Type User</th>
                            <th>Sekolah</th>
                            <th>Aktivitas</th>
                            {{-- <th>Staff Status</th> --}}
                        </tr>
                    </thead>
                </table>
            {{-- </div> --}}
        </div>
    </div>
    <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content position-relative">
                <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base btn-cancel"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                        <h4 class="mb-1" id="modalExampleDemoLabel">Form User</h4>
                    </div>
                    <div class="p-4 pb-0">
                        <form id="form-user">
                            {{-- @include('user.formuser') --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-cancel" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let tableLoad = $('#table').DataTable({
            ordering:false,
            serverSide:false,
            scrollX:true,
            ajax:"https://api.skuva.id/api/getActivityUser",
            columns:[{
                data:'username'
            },
            {
                data:'type_user'
            },
            {
                data:'id_sekolah'
            },
            {
                data:'aktivitas'
            }]
        })
        $(document).ready(function () {
            tableLoad;
        });
    </script>
@endsection