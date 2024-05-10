@extends('lecture.master')

@section('body')
    <div class="inner">
        <div class="content">
            <div class="section-title">
                {!! $lecture->document !!}
            </div>
        </div>
    </div>
@endsection
