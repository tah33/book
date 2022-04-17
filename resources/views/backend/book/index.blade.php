@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Books</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('book.index') }}">Category</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                @include('backend.book.table')
            </div>
        </div>
    </div>
@endsection
