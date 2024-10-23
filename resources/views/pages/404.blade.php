@extends('layout.mainLayout')
@section('main')
<style>
    
    .errorPage {
        text-align: center;
        padding: 3rem;
    }

    .errorPage h1 {
        font-size: 6rem;
        margin: 0;
        color: #333;
    }

    .errorPage p {
        font-size: 1.5rem;
        color: #666;
    }

    .errorPage a {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 1rem;
        color: #fff;
        background-color: #007BFF;
        text-decoration: none;
        border-radius: 5px;
    }

    .errorPage a:hover {
        background-color: #0056b3;
    }
</style>
<div>
    <div class="errorPage">
        <h1>404</h1>
        <p>Oops! The page you are looking for cannot be found.</p>
        <a href="/">Go Back to Home</a>
    </div>
</div>

@endsection