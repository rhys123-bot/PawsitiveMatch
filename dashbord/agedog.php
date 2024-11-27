<?php include('partials-front/menu.php'); ?>

<style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    /* Hero Section */
    .hero-section {
        background-color: #f7f7f7;
        padding: 80px 20px;
        margin-bottom: 60px;
        border-bottom: 2px solid #ddd;
    }

    .hero-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #333;
        text-align: left;
        margin-bottom: 20px;
    }

    .hero-description {
        font-size: 1.3rem;
        color: #555;
        margin-top: 15px;
        line-height: 1.6;
    }

    .hero-section .img-fluid {
        max-width: 90%;
        border-radius: 12px;
    }

    /* Dog Age Calculator */
    .calculator-section {
        background-color: #e9f5e9;
        padding: 40px 20px;
        margin-bottom: 40px;
        border-radius: 8px;
        text-align: center;
    }

    .calculator-section h2 {
        font-size: 2rem;
        font-weight: 600;
        color: #2E8B57;
    }

    .calculator-input {
        width: 50%;
        padding: 15px;
        font-size: 1.2rem;
        margin: 20px 0;
        border-radius: 8px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .calculator-button {
        padding: 15px 30px;
        background-color: #FFD700;
        color: white;
        font-size: 1.2rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .calculator-button:hover {
        background-color: #DAA520;
    }

    .result {
        font-size: 1.5rem;
        margin-top: 20px;
        color: #333;
    }

    /* Featured Tips */
    .featured-tips .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 40px;
        color: #FFD700;
    }

    .tip-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .tip-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.2);
    }

    .tip-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
    }

    .btn-link {
        color: #1E90FF;
        font-weight: 600;
        text-decoration: none;
        margin-top: 15px;
    }

    .btn-link:hover {
        text-decoration: underline;
    }

    /* Footer Section */
    footer {
        background-color: #2E8B57;
        color: white;
        padding: 40px 0;
        text-align: center;
    }

    footer a {
        color: #FFD700;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="hero-title">How Old Is Your Dog In Human Years?</h1>
                <p class="hero-description">Ever wondered how to convert your dog’s age into human years? Let’s explore how to translate dog years to human years in a fun and simple way!</p>
            </div>
            <div class="col-md-6">
                <img src="images/omega.png" alt="Dog Age in Human Years" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Dog Age Calculator Section -->
<section class="calculator-section">
    <div class="container">
        <h2>Find Out How Old Your Dog Is in Human Years</h2>
        <input type="number" class="calculator-input" id="dogAge" placeholder="Enter Dog Age in Years" min="1">
        <button class="calculator-button" onclick="calculateHumanAge()">Calculate Human Age</button>
        <div id="ageResult" class="result"></div>
    </div>
</section>

<!-- Featured Tips Section -->
<section class="featured-tips">
    <div class="container">
        <h2 class="section-title">Fun Facts About Dog Ages</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Small Breeds Age Slower</h4>
                    <p>Smaller dog breeds tend to live longer and age slower compared to larger breeds. This can impact their age calculation in human years!</p>
                    <!-- <a href="/dog-age-calculation" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">The 7-Year Rule Is A Myth</h4>
                    <p>The common rule that every dog year equals seven human years is outdated. The conversion formula is more complex and varies based on breed and size.</p>
                    <!-- <a href="/dog-age-calculation" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Age Depends on Breed and Size</h4>
                    <p>Different breeds age at different rates. A Great Dane might age faster than a Chihuahua, so the size of your dog matters in age calculations!</p>
                    <!-- <a href="/dog-age-calculation" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<?php include('partials-front/footer.php'); ?>

<!-- JavaScript to Calculate Dog's Human Age -->
<script>
    function calculateHumanAge() {
        const dogAge = parseInt(document.getElementById('dogAge').value);
        if (isNaN(dogAge) || dogAge <= 0) {
            document.getElementById('ageResult').innerText = "Please enter a valid age!";
            return;
        }
        
        let humanAge;
        if (dogAge === 1) {
            humanAge = 15;  // 1 dog year = 15 human years
        } else if (dogAge === 2) {
            humanAge = 24;  // 2 dog years = 24 human years
        } else {
            // After 2 dog years, each dog year equals about 4 human years
            humanAge = 24 + (dogAge - 2) * 4;
        }
        
        document.getElementById('ageResult').innerText = `Your dog is approximately ${humanAge} years old in human years.`;
    }
</script>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

