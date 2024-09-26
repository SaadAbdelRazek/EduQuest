<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard with AJAX CRUD</title>
    <!-- Include Bootstrap and Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<x-app-layout>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Dashboard</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action" id="categories-link">Categories</a>
            <a href="#" class="list-group-item list-group-item-action" id="courses-link">Courses</a>
            <a href="#" class="list-group-item list-group-item-action" id="orders-link">Orders</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="width: 900px">
        <div class="container-fluid">
            <div id="main-content">
                <!-- Content will be dynamically loaded here -->
                <h2 class="text-center">Welcome to the Dashboard</h2cla>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- AJAX Script -->
<script>
    $(document).ready(function () {
        // Load Products CRUD
        $('#products-link').click(function (e) {
            e.preventDefault();
            loadContent('/ajax/products');
        });

        // Load Categories CRUD
        $('#categories-link').click(function (e) {
            e.preventDefault();
            loadContent('/ajax/categories');
        });

        // Load Orders CRUD
        $('#orders-link').click(function (e) {
            e.preventDefault();
            loadContent('/ajax/orders');
        });

        function loadContent(url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function (response) {
                    $('#main-content').html(response);
                },
                error: function (xhr) {
                    alert('No content available');
                }
            });
        }
    });
</script>
</x-app-layout>
</body>
</html>
