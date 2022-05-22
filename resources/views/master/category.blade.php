@extends('layouts.layout')

@section('title','Mater Kategori')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Master Kategori
            <button type="button" class="btn btn-primary btn-sm btnTambah ml-2">Tambah Data</button>
            <div class="card-tools">
                <button type="button" class="btn btn-tool btnCollapseMain" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btnRefresh" title="Refresh table"><i class="fas fa-sync"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-bordered table-striped"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-kategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="modal-title-kategori"> Form Tambah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{url('')}}" method="post" id="form-kategori">
                @csrf
                <input type="hidden" name="id" id="kategori_id">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama<code>*</code></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kategori">
                            <div class="invalid-feedback error-name"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-dark btn-submit">Submit</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('script')
@include('layouts.asset.datatable')

<script src="{{ asset('assets/js/master/category.js') }}"></script>

@endsection