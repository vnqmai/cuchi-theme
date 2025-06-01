{{--
  Template Name: Booking Template
--}}

@extends('layouts.app')

@php
    $booking_sections = carbon_get_theme_option('booking_sections');
@endphp

@section('content')
  <div class="booking-page">
    @if ($booking_sections)
      @foreach ($booking_sections as $item)
          @switch($item['_type'])
              @case('text_only')
                  @include('partials.booking.detail-text-only', ['item' => $item])
                  @break

              @case('row')
                  @include('partials.booking.detail-row', ['item' => $item])
                  @break

              @case('mix')
                  @include('partials.booking.detail-mix', ['item' => $item])
                  @break
          @endswitch
      @endforeach
    @endif
  </div>


  @include('sections.our-insights')
@endsection
