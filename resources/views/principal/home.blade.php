@extends('layout.master')

{{-- Metadata --}}
@section('title', config('app.name'))
@section('description', '')
@section('canonical', config('app.url'))
@section('class', 'home')
@section('content')
    <section class="section section--white principal-section">
        <div class="container">
            <div class="row">
                <div class="md:col-1/2 principal-text">
                    <h1 class="text--softgical" >SoftGical - ADHD</h1>
                    <p>
                        SoftGical is a project that uses artificial intelligence to detect ADHD in children
                    </p>
                </div>
                <div class="md:col-1/2">
                    <img class="principal-image" src="{{ asset('img/logo.png')}}" alt="">
                </div>
            </div>
            
        </div>
    </section>
    <section class="section section--blue">
        <div class="container">
            <div class="row items-center justify-center">
                <h2 class="text--softgical">
                What is Softgical's main objective?
                </h2>
                <p class="text--white">
                The main objective of the project is to help detect ADHD in people because the younger they are, the more likely they are to have a better quality of life. With the help of data analysis and machine learning the system will support doctors in the early detection of ADHD.
                </p>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container">
            <div class="row">
                <div class="md:col-1/2">
                    <img class="principal-image" src="{{ asset('img/logo.png')}}" alt="">
                </div>
                <div class="md:col-1/2 principal-text">
                    <h1>SoftGical - ADHD</h1>
                    <p>
                        SoftGical is a project that uses artificial intelligence to detect ADHD in children
                    </p>
                </div>
            </div>
            
        </div>
    </section>
    <section class="section section--gray">
        <div class="container">
            <div class="row">
                <div class="md:col-1/2 principal-text">
                    <h1>SoftGical - ADHD</h1>
                    <p>
                        SoftGical is a project that uses artificial intelligence to detect ADHD in children
                    </p>
                </div>
                <div class="md:col-1/2">
                    <img class="principal-image" src="{{ asset('img/logo.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section section--blue">
        <div class="container">
            <div class="row items-center justify-center flex-col">
                <h2 class="text--softgical">
                ADHD
                </h2>
                <p class="text--white">
                This video will give a brief description of the main project.
                </p>
                <div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5cgjV82l1lI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection