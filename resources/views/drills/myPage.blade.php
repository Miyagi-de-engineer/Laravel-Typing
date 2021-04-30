@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('MyPage')}}</h2>

        <div class="row">
            @foreach ($drills as $drill)
                    <div class="col-sm-6">
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="h4 card-title">タイトル：{{ $drill->title }}</h3>
                                    <small class="text-muted">カテゴリ：{{ $drill->category_name }}</small>
                                </div>
                                <div class="d-flex flex-row">
                                    <i class="fas fa-user-circle fa-3x mr-1"></i>
                                    <div>
                                        <div class="font-weight-bold">
                                            作成者： {{ $drill->user->name}}
                                        </div>
                                        <div class="font-weight-lighter">
                                            {{ $drill->created_at->format('Y/m/d')}}
                                        </div>
                                    </div>
                                    <!-- Dropdown -->
                                    <div class="ml-auto card-text">
                                        <div class="dropdown">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                                            <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route("drills.edit", $drill->id) }}">
                                                <i class="fas fa-pen mr-1"></i>記事を更新する
                                            </a>
                                            <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $drill->id }}">
                                                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal -->
                                    <div id="modal-delete-{{ $drill->id }}" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form method="POST" action="{{ route('drills.delete', $drill->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                {{ $drill->title }}を削除します。よろしいですか？
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                                <button type="submit" class="btn btn-danger">削除する</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- modal -->
                                </div>


                                <!-- 練習する -->
                                <div class="mt-3">
                                    <a href="{{ route('drills.show',$drill->id) }}" class="btn btn-success btn-block">
                                    {{ __('Go Practice') }}
                                     </a>
                                </div>

                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection
