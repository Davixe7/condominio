@extends('template')
@section('content')
<paiments :payments="{{ json_encode( $payments ) }}"></paiments>
@endsection