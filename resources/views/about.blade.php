@extends('layouts.template')

@section('content')


        <section class="about-section">
            <div class="sub-title">
                <div class="container d-flex">
                    <h3>About me</h3>
                    <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
                </div>
            </div>
            <div class="image"></div>
            <div class="text">
                <div class="description">
                    <div class="who-am-i">
                        <h2>Who Am I?</h2>
                        <p>
                            I am a Designer who loves to pay attention 
                            to details. Because all the small details makes 
                            it perfect and complete.
                        </p>
                    </div>
                    <div class="skills">
                        <h2>Skills</h2>
                        <p>HTML/CSS/SASS</p>
                        <p>PHP</p>
                        <p>JavaScript</p>
                        <p>Photoshop</p>
                        <p>Illustrator</p>
                        <p>Figma/XD</p>
                        <p>vueJS</p>
                    </div>
                    <div class="education">
                        <h2>Education</h2>
                        
                        <button class="accordion">Riga Coding School, WEB development (+ design)</button>
                        <div class="panel">
                            <p>1 month</p>
                            <p>02.2021 - 03.2021.</p>
                        </div>
                        <button class="accordion">Alises Rozes Dizaina Studija, Adobe Illustrator</button>
                        <div class="panel">
                            <p>2 months</p>
                            <p>08.2020 - 10.2020.</p>
                        </div>
                        <button class="accordion">Alises Rozes Dizaina Studija, Adobe Photoshop</button>
                        <div class="panel">
                            <p>1,5 months</p>
                            <p>07.2020 - 08.2020.</p>
                        </div>
                        <button class="accordion">University of Latvia, Computer Science</button>
                        <div class="panel">
                            <p>2 years</p>
                            <p>09.2018. - 10.2020.</p>
                        </div>
                    </div>
                </div>
                <section class="services">
                    <div class="heading white">
                        <h2>My Services</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, aliquam.</p>
                    </div>
                    <div class="content">
                        <div class="servicesBox">
                            <h2>Web Deisgn</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate 
                                adipisci porro minima unde illum culpa asperiores distinctio recusandae 
                                dolor rem.</p>
                        </div>
                        <div class="servicesBox">
                            <h2>Photoshop</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate 
                                adipisci porro minima unde illum culpa asperiores distinctio recusandae 
                                dolor rem.</p>
                        </div>
                        <div class="servicesBox">
                            <h2>Illustrator</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate 
                                adipisci porro minima unde illum culpa asperiores distinctio recusandae 
                                dolor rem.</p>
                        </div>
                        <div class="servicesBox">
                            <h2>Photography</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate 
                                adipisci porro minima unde illum culpa asperiores distinctio recusandae 
                                dolor rem.</p>
                        </div>
                        <div class="servicesBox">
                            <h2>Web Development</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate 
                                adipisci porro minima unde illum culpa asperiores distinctio recusandae 
                                dolor rem.</p>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <div class="stats mt-4">
                        <h2>Finished Projects</h2>
                    </div>
                    <div class="gallery-wrapper">
                        <img src="https://source.unsplash.com/random/600x600?water" alt="">
                        <img src="https://source.unsplash.com/random/600x600?summer" alt="">
                        <img src="https://source.unsplash.com/random/600x600?plants" alt="">
                        <img src="https://source.unsplash.com/random/600x600?snow" alt="">
                        <img src="https://source.unsplash.com/random/600x600?roses" alt="">
                        <img src="https://source.unsplash.com/random/600x600?sky" alt="">
                        <img src="https://source.unsplash.com/random/600x600?nature" alt="">
                        <img src="https://source.unsplash.com/random/600x600?blossom" alt="">
                        <img src="https://source.unsplash.com/random/600x600?ice" alt="">
                        <img src="https://source.unsplash.com/random/600x600?spring" alt="">
                    </div>
                </div>
            </div>
       
            </div>
        </section>

@endsection