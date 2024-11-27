<?php include('partials-front/menu.php'); ?>
<style>
    /* Hero Section */
.hero-section {
    background-color: #f7f7f7;
    padding: 60px 20px;
    margin-bottom: 40px;
}

.hero-title {
    font-size: 2.5rem;
    font-weight: 600;
    color: #333;
}

.hero-description {
    font-size: 1.2rem;
    color: #555;
    margin-top: 20px;
}

/* Accordion Checklist */
.checklist .section-title {
    font-size: 2.5rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 30px;
}

.accordion-button {
    background-color: #FFD700;
    color: white;
    font-size: 1.1rem;
    font-weight: 500;
}

.accordion-button:focus {
    box-shadow: none;
}

.accordion-body {
    font-size: 1.1rem;
    color: #555;
}

/* Featured Tips */
.featured-tips .section-title {
    font-size: 2.5rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 30px;
}

.tip-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.tip-card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
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
}

.btn-link:hover {
    text-decoration: underline;
}

</style>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="hero-title">Adoption Checklist for New Pet Parents</h1>
                <p class="hero-description">Preparing for a new pet? Here’s a comprehensive checklist to ensure you’re ready to welcome your new family member.</p>
            </div>
            <div class="col-md-6">
                <img src="images/client.png" alt="Adoption Checklist" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Checklist Accordion Section -->
<section class="checklist">
    <div class="container">
        <h2 class="section-title">Adoption Checklist</h2>
        <div class="accordion" id="checklistAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Prepare Your Home
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Make sure you have a safe space for your new pet. Prepare a cozy bed, pet-proof your home, and clear any hazards.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. Choose the Right Food
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Consult with your vet to choose the best food for your pet’s breed, age, and health needs.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Vet Visit & Health Care
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Schedule a vet appointment soon after adopting. Ensure your pet gets vaccinations, spaying/neutering, and a full health check-up.</p>
                    </div>
                </div>
            </div>
            <!-- Add more steps as needed -->
        </div>
    </div>
</section>

<!-- Featured Tips Section -->
<section class="featured-tips">
    <div class="container">
        <h2 class="section-title">Additional Tips for New Pet Parents</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Training & Socializing</h4>
                    <p>Start training your pet early to build a strong bond and teach basic commands.</p>
                    <a href="learnmore1.php" class="btn btn-link">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Creating a Routine</h4>
                    <p>Establish a feeding, walking, and playtime routine for your new pet.</p>
                    <a href="learnmore2.php" class="btn btn-link">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Pet Insurance</h4>
                    <p>Consider getting pet insurance to cover medical expenses and emergencies.</p>
                    <a href="learnmore3.php" class="btn btn-link">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<?php include('partials-front/footer.php');?>

<!-- Include Bootstrap JS for Accordion functionality -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
