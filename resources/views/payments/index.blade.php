@extends('template')
@section('content')
<paiments
  :payments="{{ json_encode( $payments ) }}"
  :usd-price="{{ json_encode( $usd_price ) }}"
  :format-date="{{ json_encode( $format_date ) }}">
</paiments>
@endsection