@extends('Layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ trans('users.titles.users') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">{{ trans('users.fields.name') }}</th>
                                <th scope="col">{{ trans('users.fields.email') }}</th>
                                <th scope="col">{{ trans('users.fields.created_at') }}</th>
                                <th scope="col">{{ trans('users.fields.updated_at') }}</th>
                                <th scope="col"></th>
                                <th scope="col">{{trans('users.text.status')}}</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"> {{trans('users.buttons.edit')}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

