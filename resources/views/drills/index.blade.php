@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Drill List')}}</h2>
        <div class="row">

            @foreach ($drills as $drill)
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">{{ $drill->title }}</h3>

                            <!-- 練習する -->
                            <a href="#" class="btn btn-primary">
                                {{ __('Go Practice') }}
                            </a>

                            <!-- 編集する -->
                            <a href="{{ route('drills.edit',$drill->id) }}" class="btn btn-success">
                                {{ __('Go Edit') }}
                            </a>

                            <!-- 削除する -->
                            <form action="{{ route('drills.delete',$drill->id) }}" method="post"
                                class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="confirm('削除しますか？')">
                                    {{ __('Go Delete') }}
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
