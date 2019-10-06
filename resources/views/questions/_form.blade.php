@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
    <input type="text" name="title" value="{{ old('title', $question->title) }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">

    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <p>{{ $errors->first('title') }}</p>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" row="10">{{ old('body', $question->body) }}</textarea>                        

    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <p>{{ $errors->first('body') }}</p>
        </div>
    @endif
</div>
<div class="form-grouo">
    <button class="btn btn-outline-primary btn-lg" type="submit">{{ $buttonText }}</button>
</div>