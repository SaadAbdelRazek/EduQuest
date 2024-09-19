@extends('admin.layouts.app')
@section('content')


<body id="welcome">
<aside class="left-sidebar">
    <div class="logo">
        <a href="#welcome">
            <h1>Courses</h1>
        </a>
    </div>
    <nav class="left-nav">
        <ul id="nav">
            <li class="current"><a href="#welcome">Welcome</a></li>
            <li><a href="#installation">Installation</a></li>
            <li><a href="#tmpl-structure">Structure</a></li>
            <li><a href="#css-structure">CSS Files</a></li>
            <li><a href="#javascript">JavaScript Libraries</a></li>
            <li><a href="#contact-form">Contact Form</a></li>
            <li><a href="#subscription-form">Subscription Form</a></li>
            <li><a href="#video">Video Tutorial</a></li>
            <li><a href="#credit">Source and Credit</a></li>
        </ul>
    </nav>
</aside>
<!-- Main Wrapper -->
<div id="main-wrapper">
    <div class="main-content">
        <section id="welcome">
            <div class="content-header">
                <h1>Courses</h1>
            </div>
            <div class="welcome">

            </div>
            <div class="features">
                <h2 class="twenty">Template Features</h2>
{{--               ---------------}}
            </div>
        </section>
        <section id="installation">
            <div class="content-header">
                <h1>Courses</h1>
            </div>
            <h2 class="title">Installing Template.</h2>
            <div class="section-content">
{{--                ----------------------- --}}
            </div>
        </section>
        <section id="tmpl-structure">
            <h2 class="title">Template Structure</h2>
            <p class="fifteen">All information within the main content area is nested within a body tag. The general template structure is pretty the same throughout the template. Here is the general structure of main page (index.html).</p>
            <pre class="brush: html">

				<header class="header_area"></header>
					<main class="site-main">
						<section class="section"></section>
						<section class="section"></section>
						<section class="section"></section>
					</main>
				<footer class="footer"></footer>

			</pre>
        </section>
        <section id="css-structure">




        </section>
        <section id="javascript">

        </section>
        <section id="contact-form">

        </section>
        <section id="subscription-form">

        </section>
        <section id="video">

        </section>
        <section id="credit">

        </section>
    </div>
</div>

@endsection
