@extends('account.layouts.default')

@section('account.content')
    <h1>Your Files</h1>
    @if($files->count())
        @each('account.partials._file',$files,'file')
    @else
        <p>You have no files yet</p>
    @endif
@endsection