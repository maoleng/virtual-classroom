@extends('lecture.master')

@section('body')
    <div class="inner">
        <div class="p-5">
            <div class="row">
                @foreach ($questions as $question)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="rbt-card variation-02 rbt-hover">
                            <div class="rbt-card-img">
                                <video style="width: 100%" controls="">
                                    <source src="{{ $question->video_answer }}" type="video/mp4">
                                </video>
                            </div>
                            <div class="rbt-card-body">
                                <p class="rbt-card-text">{{ $question->content }}</p>
                                <div class="rbt-card-bottom">
                                    <p>{{ $question->prettyCreatedAt }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 mt--60">
                    {{ $questions->links('vendor.pagination.custom-paginate') }}
                </div>
            </div>


        </div>
    </div>
@endsection
