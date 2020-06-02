<!DOCTYPE html>
<html lang="en">
<x-frontend.head/>
<body>

<!-- Menu -->

<x-frontend.menu/>

<div class="super_container">

    <!-- Header -->

    <x-frontend.header/>

    @yield("content")

</div>

<x-frontend.scripts/>
</body>
</html>
