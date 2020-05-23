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

<!-- Left Sidebar -->
<x-leftSidebar/>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<x-rightBar/>
<!-- #END# Right Sidebar -->


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            @yield("content")
        </div>
    </div>
</section>
<x-scripts/>
</body>
</html>

