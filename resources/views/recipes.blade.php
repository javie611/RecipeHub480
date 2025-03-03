<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe of the Week</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <!-- Top Navigation Bar -->
    <div class="top-bar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="nav-links">
            <a href="Welcome.blade.php">Home</a>
            <a href="recipes.blade.php">Recipes</a>
            <a href="shopping.blade.php">Shopping</a>
            <a href="favorites.blade.php">Favorites</a>
            <a href="about.blade.php">About Us</a>
        </div>
    </div>

    <!-- Recipe of the Week -->
    <h2>Recipe of the Week</h2>
    <div class="slideshow-ingredients-container">
        <!-- Slideshow Section -->
        <div class="slideshow-container">
            <!-- Slide 1 -->
            <div class="slide fade">
                <img src="images/image1.png" alt="Slide 1" style="width:100%">
            </div>
            <!-- Slide 2 -->
            <div class="slide fade">
                <img src="images/image2.png" alt="Slide 2" style="width:100%">
            </div>
            <!-- Slide 3 -->
            <div class="slide fade">
                <img src="images/image3.png" alt="Slide 3" style="width:100%">
            </div>

            <!-- Navigation controls -->
            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>

        <!-- Ingredients Section -->
        <div class="ingredients">
            <h3>Ingredients</h3>
            <ul>
                <li>1 recipe Carne Asada Steak</li>
                <li>1 recipe Chicken Tinga</li>
                <li>1-2 avocados</li>
                <li>12 (4-inch) corn tortillas</li>
                <li>½ cup chopped fresh cilantro</li>
                <li>1 jalapeño pepper, sliced</li>
                <li>½ cup chopped onion</li>
                <li>1 cup crumbled cotija cheese</li>
                <li>Lime wedges</li>
            </ul>
        </div>
    </div>

    <!-- Recipe Instructions -->
    <h3>Instructions:</h3>
    <ol>
        <li>Grill the carne asada and cook the chicken tinga.</li>
        <li>Slice the carne asada and shred the chicken tinga.</li>
        <li>Mash the avocado with a fork. Add in a sprinkle of salt and pepper and a squeeze of lime juice. Stir.</li>
        <li>Fill each tortilla with a spread of mashed avocado and a scoop of meat.</li>
        <li>Top the tacos with fresh cilantro, jalapeños, onion, and cotija cheese. Finish with a squeeze of lime juice over the top.</li>
    </ol>
</body>
</html>
