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
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{$user->updated_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

