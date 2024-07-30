<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    @include('admin.layouts.includes.head')
    <title>
        @stack('title', 'Admin')
    </title>
</head>

<body>
    <x-admin-header-component />
    @include('admin.layouts.includes.sidebar')
    
    <x-admin-footer-component />
    @include('admin.layouts.includes.foot')
</body>

</html>
