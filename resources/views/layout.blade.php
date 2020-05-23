<!DOCTYPE html>
<html>

<head>
    <x-head/>
</head>

<body class="theme-red">
<!-- Page Loader -->
<x-loader/>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<x-search/>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<x-nav/>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <x-leftSidebar/>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
   <x-rightSidebar/>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        @yield("content")
    </div>
</section>
</body>
</html>
