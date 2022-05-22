@extends('layouts.layout')

@section('title','Master Produk')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            Master Produk
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
@endsection

@section('script')
@include('layouts.asset.datatable')

<script src="{{ asset('assets/js/master/product.js') }}"></script>

@endsection