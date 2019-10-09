<div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . Str::plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')
                    @foreach ($answers as $answer)
                        <div class="media">
                            <div class="vote-controls">
                                <a title="This answer is useful" class="vote-up">
                                    <i class="fa fa-caret-up fa-3x"></i>
                                </a>
                                <span id="votes-up">123</span>
                                <a title="This answer is not useful" class="vote-down off">
                                    <i class="fa fa-caret-down fa-3x"></i>
                                </a>
                                <a title="Mark as best" class="vote-accepted mt-2">
                                    <i class="fas fa-check fa-2x"></i>
                                    <span class="favorites-count">123</span>
                                </a>
                            </div>
                            <div class="media-body">
                                {!! $answer->body !!}
                                <div class="float-right">
                                    <span class="text-muted">Anaswered {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url }}" class="pr-2">
                                            <img src="{{ $answer->user->avatar }}" alt="">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>