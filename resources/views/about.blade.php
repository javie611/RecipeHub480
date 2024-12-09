@extends('layouts.app') <!-- Use your base layout here -->

@section('title', 'About Us')

@push('styles')
    <!-- Optionally, add any custom styles specific to this page -->
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')
    <header>
        <h1>Meet The Team</h1>
    </header>
    

    <section class="team">
        <div class="member">
            <img src="{{ asset('images/bernie.jpg') }}" alt="Person 1">
            <div class="info">
                <h2>Bernadette Panganiban</h2>
                <p>Hello, I'm Bernadette, a dedicated and passionate Computer Information Technology (CIT) undergraduate. I have hands-on experience in C++, HTML, Java, JavaScript, and AWS. I enjoy leveraging my technical skills to solve real-world problems and am constantly learning to stay ahead in the ever-evolving tech landscape. As a hardworking individual and a team player, I thrive in collaborative environments and take pride in contributing to the success of any project.</p>
                <p><strong>Email:</strong> <a href="mailto:bernadettejosiah.panganiban.854@my.csun.edu">bernadettejosiah.panganiban.854@my.csun.edu</a></p>
            </div>
        </div>
        <div class="member">
            <img src="{{ asset('images/javie.jpg') }}" alt="Person 2">
            <div class="info">
                <h2>Javier Reyes</h2>
                <p>Hi, I'm Javier a Computer Information Technology (CIT) major with a bit of a less traditional background as a former (CTVA) student. This combination has shaped my creative and technical mindset, which I try to bring to anything I am part of. Most of my experience is in internet architecture, computer software and hardware management, and proficiency in both Windows and Linux operating systems. My ultimate goal is to work remotely in a role that allows me to blend my technical expertise with my love for problem-solving, all while enjoying the flexibility of working from home. In my free time, I enjoy reading, writing, and exploring film!</p>
                <p><strong>Email:</strong> <a href="mailto:javier.reyes.732@my.csun.edu">javier.reyes.732@my.csun.edu</a></p>
            </div>
        </div>
        <div class="member">
            <img src="{{ asset('images/ethan.jpg') }}" alt="Person 3">
            <div class="info">
                <h2>Ethan Vue</h2>
                <p>Hello my name is Ethan Vue! I am a Computer Information Tech major at California State University. I am in my 5th year now and expected to graduate in the Spring of 2025! Hoping to finish out this year strong and seeing what life has to offer in the future.</p>
                <p><strong>Email:</strong> <a href="mailto:ethan.vue.753@my.csun.edu">ethan.vue.753@my.csun.edu</a></p>
            </div>
        </div>
        <div class="member">
            <img src="{{ asset('images/michael.JPG') }}" alt="Person 4">
            <div class="info">
                <h2>Michael Machin</h2>
                <p>I currently attend California State University: Northridge, majoring in Computer Information Technology. I involve myself in extracurricular clubs and projects to utilize my interest in cybersecurity, robotics, and cloud computing. I can lead teams and develop strategic plans for various needs while also being a collaborative team player capable of resolving minor issues and helping with more complex issues.</p>
                <p><strong>Email:</strong> <a href="mailto:michael.machin.296@my.csun.edu">michael.machin.296@my.csun.edu</a></p>
            </div>
        </div>
    </section>

    <section class="contact-us">
        <a href="mailto:recipehub480@gmail.com?subject=Contact Us&body=Hello, I would like to...">
            <button>Contact Us</button>
        </a>
    </section>
@endsection
