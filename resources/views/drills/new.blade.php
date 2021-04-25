@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Drill Register') }}</div>

                    <div class="card-body">
                        <form action="{{ route('drills.new')}}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Title') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="title" class="form-control @error('title')is-invalid @enderror" name="title" value="{{ old('title')}}" autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Category') }}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="category" class="form-control @error('category')is-invalid @enderror" name="category" value="{{ old('category')}}" autocomplete="category" autofocus>
                                </div>
                            </div>

                            {{-- 問題入力部分 --}}

                            @for ($i = 1; $i <= 10; $i++)
                                <div class="form-group row">
                                    <label for="problem{{ $i-1 }}" class="col-md-4 col-form-label text-md-right">{{ __('Problem').$i }}</label>

                                    <div class="col-md-6">
                                        <input id="problem{{$i - 1}}" type="text" class="form-control @error('problem'.($i - 1)) is-invalid @enderror" name="problem{{$i - 1}}" value="{{ old('problem'.($i - 1)) }}" autocomplete="problem{{$i - 1}}" autofocus>

                                        @error('problem'.($i - 1))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endfor

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
