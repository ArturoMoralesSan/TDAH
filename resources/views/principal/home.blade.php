@extends('layout.master')

{{-- Metadata --}}
@section('title', config('app.name'))
@section('description', '')
@section('canonical', config('app.url'))
@section('class', 'home')
@section('content')
    <parallax></parallax>
    <section id="objective" class="section section--objective">
        <div class="container">
            <h2 class="col text-center text--softgical">
                What is Softgical's main objective?
            </h2>
            <div class="separator-container">
                <hr class="title-separator">
            </div>
            <div class="row">
                <div class="lg:col-1/4 d-flex flex-col items-center">
                    <div class="icon-container icon-container--blue">
                        <img class="icon-image" src="{{ url('img/icons/rompecabezas.png') }}" alt="">
                    </div>
                    <p class="text--white"><strong>Early Detection of ADHD</strong></p>
                    <p class="text--white text-center"> 
                    The primary goal of the project is to enable the early detection of Attention Deficit Hyperactivity Disorder (ADHD) in individuals.
                    </p> 
                </div>
                <div class="lg:col-1/4 d-flex flex-col items-center">
                    <div class="icon-container icon-container--blue">
                        <img class="icon-image" src="{{ url('img/icons/informe-de-analisis.png') }}" alt="">
                    </div>
                    <p class="text--white"><strong>Utilizing Data Analysis</strong></p>
                    <p class="text--white text-center">
                    By analyzing relevant data, the system aims to identify patterns and markers associated with ADHD, contributing to the early detection process.
                    </p>
                </div>
                <div class="lg:col-1/4 d-flex flex-col items-center">
                    <div class="icon-container icon-container--blue">
                        <img class="icon-image" src="{{ url('img/icons/aprendizaje-automatico.png') }}" alt="">
                    </div>
                    <p class="text--white"><strong>Leveraging Machine Learning</strong></p>
                    <p class="text--white text-center">
                    he system will employ machine learning algorithms to process and analyze data, making predictions and providing insights that support healthcare professionals in identifying potential cases of ADHD.
                    </p>
                </div>
                <div class="lg:col-1/4 d-flex flex-col items-center">
                    <div class="icon-container icon-container--blue">
                        <img class="icon-image" src="{{ url('img/icons/calidad-de-vida.png') }}" alt="">

                    </div>
                    <p class="text--white"><strong>Enhancing Quality of Life</strong></p>
                    <p class="text--white text-center">
                    Detecting ADHD at an early stage can lead to more effective strategies for managing the condition and improving overall well-being, especially for younger individuals.
                    </p>
                </div>
                
            </div>
        </div>
    </section>
    <section id="blockchain" class="section section--blockchain">
        <div class="container">
            <h2 class="col text-center text--softgical">
                How to use Blockchain?
            </h2>
            <div class="separator-container">
                <hr class="title-separator">
            </div>
            <div class="row">
                <p class="text--white text-center">
                    The sistem will also have the incorporation of a clinical and treatment history connected to blockchain to generate traceability and keep a good control of the patient
                </p>
            </div>
            <div class="row">
                <div class="lg:col-1/2 d-flex flex-row items-center pt-8">
                    <div class="icon-container icon-container--blue icon-container--margin">
                        <img class="icon-image" src="{{ url('img/icons/rompecabezas.png') }}" alt="">
                    </div>
                    <div class="text-container">
                        <p class="text--white"><strong>Generate medical records</strong></p>
                        <p class="text--white"> 
                            To keep track of the patient.
                        </p> 
                    </div>
                    
                </div>
                <div class="lg:col-1/2 d-flex flex-row items-center pt-8">
                    <div class="icon-container icon-container--blue">
                        <img class="icon-image" src="{{ url('img/icons/informe-de-analisis.png') }}" alt="">
                    </div>
                    <div class="text-container">
                        <p class="text--white"><strong>Working with a virtual wallet</strong></p>
                        <p class="text--white">
                        This wallet is used to work the corrency.
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section id="python" class="section section--python">
        <div class="container">
            <h2 class="col text-center text--softgical">
                Technologies used
            </h2>
            <div class="separator-container">
                <hr class="title-separator">
            </div>
            <div class="row">
                <p class="col text--white text-center">
                    In this space we are going to show the technologies that we can use to make Artificial Intelligent ADHD work.
                </p>
            </div>
            <div class="row">
                <div class="lg:col-1/2 d-flex flex-row items-center pt-8">
                    <div class="icon-container icon-container--blue icon-container--margin">
                        <img class="icon-image" src="{{ url('img/icons/rompecabezas.png') }}" alt="">
                    </div>
                    <div class="text-container">
                        <p class="text--white"><strong>Mobile Development</strong></p>
                        <p class="text--white"> 
                            We use Android studio to make the app movil.
                        </p> 
                    </div>
                    
                </div>
                <div class="lg:col-1/2 d-flex flex-row items-center pt-8">
                    <div class="icon-container icon-container--blue">
                        <img class="icon-image" src="{{ url('img/icons/informe-de-analisis.png') }}" alt="">
                    </div>
                    <div class="text-container">
                        <p class="text--white"><strong>Python, Laravel and Solidity</strong></p>
                        <p class="text--white">
                            Use laravel, python to make the web the web pages with AI and solidy for SmartContract.
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section id="video" class="section section--neuronal">
        <div class="container">
            <div class="row items-center justify-center flex-col">
                <h2 class="text--softgical">
                ADHD
                </h2>
                <p class="text--white">
                This video will give a brief description of the main project.
                </p>
                <div class="video-responsive">
                    <iframe class="video" class="video" src="https://www.youtube.com/embed/5cgjV82l1lI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

@endsection