@extends('admin.layouts.dash')
@section('dashboard')
    active
@endsection
@section('activity-title')
    Latest Activities
@endsection
@section('content')
        <!-- Recent Activity -->


            <table>
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>User Id</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->created_at }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->user->id }}</td>
                @if ($activity->status=='Completed')

                <td><span class="status success">{{ $activity->status }}</span></td>
                @elseif ($activity->status=='Failed')
                <td><span class="status" style="background-color: rgb(238, 43, 43); color:white;">{{ $activity->status }}</span></td>
                @endif
                <td><form action="{{ route('delete_activity',$activity->id) }}" onsubmit="return confirmDelete()"
                    method="POST" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">remove</button>
                </form></td>
                {{-- <td><a href="{{route('delete_activity',$activity->id)}}" class="btn btn-danger">remove</a></td> --}}
            </tr>
        @endforeach

                </tbody>
            </table>
@endsection
