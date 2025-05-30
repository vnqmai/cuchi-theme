@extends('layouts.app')

@section('content')
  @include('sections.hashtags')
  @include('sections.intro-1')
  @include('sections.intro-2')
  @include('sections.highlighted-memories')
  @include('sections.inonetour')
  @include('sections.our-insights')

  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
