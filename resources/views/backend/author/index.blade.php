@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Categories</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('author.index') }}">Author</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4">
                @include('backend.author.form')
            </div>
            <div class="col-lg-8">
                @include('backend.author.table')
            </div>
        </div>
    </div>
@endsection
