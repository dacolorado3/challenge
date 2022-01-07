@extends('Layouts.app')
@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <table>
            <thead>
            <tr>
                <th scope="col">{{trans('users.fields.name')}}</th>
                <th scope="col">{{trans('users.fields.email')}}</th>
                <th scope="col">{{trans('users.fields.created_at')}}</th>
                <th scope="col">{{trans('users.fields.updated_at')}}</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection
