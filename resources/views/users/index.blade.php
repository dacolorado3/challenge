@extends('Layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <style>table, tr, th,td {border: 1px solid black}</style>
        <table>
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
@endsection

