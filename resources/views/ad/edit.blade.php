<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.styles')
    <title>Edit</title>
</head>
<body>
<div class="container">
    <br>

    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{ route('ads.edit', $ad->id) }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title"
                           value="{{ $ad->title }}">
                    @if ($errors->has('title'))
                        <span class="help-block">
                    <strong class="text-danger">
                    {{ $errors->first('title') }}
                    </strong>
                </span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea name="description" id="inputDescription" cols="30" rows="10"
                              class="form-control">{{ $ad->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                    <strong class="text-danger">
                    {{ $errors->first('description') }}
                    </strong>
                </span>
                    @endif
                </div>

                {{ csrf_field() }}

                <input type="hidden" name="_method" value="patch">

                <button type="submit" class="btn btn-info">UPDATE</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>



</div>

@include('layouts.scripts')
</body>
</html>

