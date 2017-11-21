<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Show</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


@include('layouts.styles')

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
    </style>
</head>
<body>


@include('layouts.nav')

<div class="container">
    <div class="row" >
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading"><strong>Advertising title: </strong>
                        <a href="{{ route('ads.show', $ad->id) }}" class="btn btn-warning">{{ $ad->title }}</a>
                    </div>
                    <div class="panel-body">
                        <a href="/ads/{{ $ad->id }}/edit">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <img src="http://giraffesoftware.com/img/logo.svg"
                             class="img-responsive" style="width:100%" alt="giraffe">
                    </div>
                    <div class="panel-footer"> <strong>Advertising description: </strong> {{ $ad->description }}</div>
                    <div class="panel-footer"><strong>Author: </strong>{{ $ad->user->name }},
                        <strong>Created at: </strong>{{ $ad->created_at }}</div>

                    <div class="panel-footer">

                        <a href="{{ $ad->id }}" onclick="event.preventDefault();
                                            this.children[0].submit();">
                            <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                            </form>

                            <button type="button" class="btn btn-danger">DELETE Ad</button>
                        </a>

                    </div>


                </div>
            </div>


    </div>

</div>
<br><br>

@include('layouts.scripts')

</body>
</html>