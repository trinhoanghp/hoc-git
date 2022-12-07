@extends('layouts.master')
@section('Title','About')
@section('css')
<style>
body{
    background-color: #ccc;
}

</style>
@stop()
@section('main')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">About page</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>
</div>
@stop()

@section('js')
<script>
    alert('Bạn đang chuyển sang trang About');

</script>
@stop()