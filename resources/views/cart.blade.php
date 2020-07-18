<!DOCTYPE html>
<html class="no-js" lang="it">
<head>
    @include('layouts.Header.head')
</head>
<body class="home-2">
<header>
    @include('layouts.Header.header')
</header>
@php($page = [
    'name' =>'Carrello']
    )
@include('layouts.Header.breadcrumbsArea', $page)
@if(\Illuminate\Support\Facades\Auth::user()!=null)
    @include('layouts.UserAccount.cartForm');
@else
    @include('layouts.Other.errorCase');
@endif
@include('layouts.Footer.banner2')
@include('layouts.Footer.social')
<footer>
    @include('layouts.Footer.footer')
</footer>
@include('layouts.Footer.modal')
@include('layouts.Footer.jsImport')
</body>
</html>