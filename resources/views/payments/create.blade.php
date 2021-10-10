@extends('template')
@section('content')
<payments :apartments="{{ json_encode( $apartments ) }}"></payments>
@endsection