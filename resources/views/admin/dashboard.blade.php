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
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2024-09-25</td>
                    <td>New course added</td>
                    <td><span class="status success">Completed</span></td>
                </tr>
                <tr>
                    <td>2024-09-24</td>
                    <td>Instructor profile updated</td>
                    <td><span class="status warning">Pending</span></td>
                </tr>
                <tr>
                    <td>2024-09-23</td>
                    <td>Student registered</td>
                    <td><span class="status success">Completed</span></td>
                </tr>
                <tr>
                    <td>2024-09-22</td>
                    <td>Report generated</td>
                    <td><span class="status error">Failed</span></td>
                </tr>
                </tbody>
            </table>
@endsection
