@extends('layouts.app')

@section('title')
    | My Library
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($books as $book)
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card mb-3">
                                    <a href="#">
                                        <img src="{{ $book->cover->getUrl() }}" class="card-img-top" alt="{{ $book->title }}" />
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <p class="card-text">
                                            <small class="text-muted">{{ $book->author->name }} - {{ $book->published_date }}</small>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                         <a href="{{ route('book', $book->slug) }}" class="btn btn-success btn-block">Read book</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
