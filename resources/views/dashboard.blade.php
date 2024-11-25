<!-- resources/views/recipes/index.blade.php -->

@extends('layouts.app')

@section('title', 'Recipes Page')
@push('styles')
    <!-- Additional CSS specific to this view -->
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush
@section('content')
    <h1>Featured Dishes of the Week</h1>
    <h2>Featuring: Spicy Pasta, Street Tacos, and Chicken Tikka Masala</h2>
    <div class="marquee-container">
        <div class="marquee">
            <a href="#section1"><img src="{{ asset('images/img1.jpg') }}" alt="Image 1"></a>
            <a href="#section2"><img src="{{ asset('images/img2.jpg') }}" alt="Image 2"></a>
            <img src="{{ asset('images/img3.jpg') }}" alt="Image 3">
        </div>
    </div>

    <section id="section1">
        <h3>Spicy Pasta Recipe</h3>
        <h4>Ingredients:</h4>
        <h5>For the Pasta</h5>
        <ul>
            <li>1 tbsp Salt</li>
            <li>2 cups Penne Pasta</li>
        </ul>
        <h5>For the Sauce</h5>
        <ul>
            <li>4 tbsp Olive Oil</li>
            <li>2 tbsp Butter</li>
            <li>4 cloves Garlic (Minced)</li>
            <li>1 tsp Chili Flakes</li>
            <li>1 small Onion (Finely Chopped)</li>
            <li>½ cup Tomato Paste</li>
            <li>1 cup Heavy Cream</li>
            <li>¼ tsp Salt</li>
            <li>1 tsp Mixed Herb</li>
            <li>½ tsp Black Pepper</li>
            <li>½ cup Parmesan Cheese</li>
        </ul>
        <h5>For the Garnishing</h5>
        <ul>
            <li>Chili Flakes</li>
            <li>Chopped Coriander</li>
        </ul>

        <div class="marquee-container">
            <div class="marquee">
                <img src="{{ asset('images/pasta1.png') }}" alt="penne">
                <img src="{{ asset('images/pasta2.png') }}" alt="sauce">
                <img src="{{ asset('images/pasta3.png') }}" alt="garnish">
            </div>
        </div>

        <h4>Instructions:</h4>
        <h5>Boil the Pasta</h5>
        <ol>
            <li>Place a large pot on the stove and fill it with water. Bring the water to a rolling boil.</li>
            <li>Add 1 tbsp of salt to the water and 2 cups of pasta to the pot.</li>
            <li>Boil the pasta for about 8-10 minutes or according to the package instructions. Stir occasionally.</li>
            <li>Reserve 1 cup of pasta water before draining.</li>
            <li>Drain the excess water and rinse it under cold water to stop the cooking process. Set it aside for later use.</li>
        </ol>

        <h5>Prepare the Sauce</h5>
        <ol>
            <li>Bring a large pot and put it on the stove over medium heat.</li>
            <li>Pour 4 tbsp of olive oil into it. Add 2 tbsp of butter and let it melt.</li>
            <li>Add 4 cloves of minced garlic and 1 tsp of chili flakes to the pan.</li>
            <li>Cook for 1 minute while stirring frequently. Add 1 small-sized finely chopped onion. Stir and cook the onions for 2-3 minutes.</li>
            <li>Add ½ cup of tomato paste to the onion. Stir and cook for an additional 2-3 minutes allowing the tomato paste to blend with the onions.</li>
            <li>Pour in 1 cup of heavy cream and mix thoroughly with the tomato paste.</li>
            <li>Sprinkle ¼ tsp of salt, 1 tsp of mixed herb, and ½ tsp of black pepper over the mixture. Keep stirring to prevent burning.</li>
            <li>Add a little amount of the pasta water, stir, and let it simmer.</li>
        </ol>

        <h5>Combine Pasta and Sauce</h5>
        <ol>
            <li>Sprinkle ½ cup of grated parmesan cheese over the pasta until it’s fully melted.</li>
            <li>If the sauce is too thick, add more reserved pasta water as needed.</li>
            <li>Add the cooked pasta to the sauce. Toss gently until the pasta is completely coated with the sauce.</li>
            <li>Garnish the pasta dish with a sprinkle of chili flakes and chopped coriander.</li>
            <li>Serve the penne pasta on a plate and sprinkle some grated parmesan cheese on top for extra flavor.</li>
        </ol>
    </section>

    <section id="section2">
        <h3>Street Tacos Recipe</h3>
        <h4>Ingredients</h4>
        <ul>
            <li>1 recipe Carne Asada Steak</li>
            <li>1 recipe Chicken Tinga</li>
            <li>1-2 avocados</li>
            <li>12 (4-inch) corn tortillas</li>
            <li>½ cup chopped fresh cilantro</li>
            <li>1 jalapeno pepper, sliced</li>
            <li>½ cup chopped onion</li>
            <li>1 cup crumbled cotija cheese</li>
            <li>Lime wedges</li>
        </ul>

        <div class="marquee-container">
            <div class="marquee">
                <img src="{{ asset('images/tacos1.png') }}" alt="carne">
                <img src="{{ asset('images/tacos2.png') }}" alt="tortilla">
                <img src="{{ asset('images/tacos3.png') }}" alt="tacos">
            </div>
        </div>

        <h4>Instructions:</h4>
        <ol>
            <li>Grill the carne asada and cook the chicken tinga.</li>
            <li>Slice the carne asada and shred the chicken tinga.</li>
            <li>Mash the avocado with a fork. Add in a sprinkle of salt and pepper and a squeeze of lime juice. Stir.</li>
            <li>Fill each tortilla with a spread of mashed avocado and a scoop of meat.</li>
            <li>Top the tacos with fresh cilantro, jalapeños, onion, and cotija cheese. Finish with a squeeze of lime juice over the top.</li>
        </ol>
    </section>
@endsection
