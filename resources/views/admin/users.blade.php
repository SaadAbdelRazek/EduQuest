@extends('admin.layouts.dash')
@section('users')
    active
@endsection
@section('activity-title')
    
    users
@endsection

@section('content')
    @php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp



    <div class="container">
        <h1 class="table-title">current users</h1>

        <!-- Create Button -->
        <div class="button-container">
            {{-- <a href="{{ route('faqs.create') }}" class="btn create-btn"><i class="fas fa-plus"></i> Create New FAQ</a> --}}
        </div>
        <!-- Create Button -->
        {{-- <div class="button-container">
            <a href="{{ route('faqs.create') }}" class="btn create-btn"><i class="fas fa-plus"></i> Create New FAQ</a>
        </div> --}}
        <!-- Data Table -->
        <style>
            .green-500 {
                background-color: #48bb78;
                /* لون أخضر */
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
            }

            .red-500 {
                background-color: #f56565;
                /* لون أحمر */
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
            }

            .bg-2 {
                font-size: 14px;
                font-weight: bold;
            }
        </style>

@if (session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
        <table class="styled-table">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Name</th>
                    <th>role</th>
                    <th>last seen</th>
                    <th>status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                        {{-- <td>{{ $data->id }}</td> --}}
                        <td>{{ $data->name }}</td>
                        <td>
                            @if ($data->is_instructor == 1 && $data->is_admin == 1)
                                admin , instructor
                            @elseif ($data->is_instructor == 0 && $data->is_admin == 0)
                                student
                            @elseif ($data->is_instructor == 0 && $data->is_admin == 1)
                                admin
                            @elseif ($data->is_instructor == 1 && $data->is_admin == 0)
                                instructor
                            @else
                                student
                            @endif

                        </td>
                        <td>
                            @php
                                // التحقق إذا كانت قيمة last_seen غير null
                                if ($data->last_seen !== null) {
                                    // حساب الفرق بين الوقت الحالي ووقت آخر ظهور
                                    $diffInMinutes = Carbon\Carbon::now()->diffInMinutes(Carbon\Carbon::parse($data->last_seen));

                                    // تحديد الحالة بناءً على الفرق
                                    $status = $diffInMinutes <= 2 ? 'Online' : 'Offline';
                                    $statusColor = $diffInMinutes <= 2 ? 'green-500' : 'red-500';
                                } else {
                                    // إذا كانت last_seen تساوي null
                                    $status = 'Status Unavailable';  // أو أي نص آخر تفضله
                                    $statusColor = 'gray-500';  // لون رمادي للحالة غير المتاحة
                                }
                            @endphp

                            <!-- عرض الفرق في الوقت إن وجدت last_seen -->
                            @if($data->last_seen !== null)
                                {{
                                    Carbon\Carbon::parse($data->last_seen)->diffForHumans()
                                }}
                            @else
                                Not available
                            @endif
                        </td>

                        <td>
                            <!-- عرض الحالة مع لون مختلف لكل حالة -->
                            <span class="bg-2 {{ $statusColor }}">
                                {{ $status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('dashboard.user_data', $data->id) }}" class="btn edit-btn">more</a>


                            <form action="{{ route('users.destroy', $data->id) }}" onsubmit="return confirmDelete()"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">remove</button>
                            </form>

                            @if ($data->is_admin==0)

                            <a href="{{ route('dashboard.add_admin', $data->id) }}" class="btn btn-primary">add admin</a>


                                        @elseif ($data->is_admin==1)

                                        <a href="{{ route('dashboard.drop_admin', $data->id) }}" class="btn btn-danger">drop admin</a>
                                        @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to remove this user?');
        }
    </script>
@endsection
