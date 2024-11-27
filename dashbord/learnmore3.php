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

    /* Accordion Checklist */
    .checklist .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 50px;
        color: #FFD700;
    }

    .accordion-button {
        background-color: #2E8B57;
        color: white;
        font-size: 1.2rem;
        font-weight: 500;
        border-radius: 8px;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    .accordion-body {
        font-size: 1.1rem;
        color: #555;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 8px;
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
                <h1 class="hero-title">Pet Insurance: Protect Your Pet’s Health</h1>
                <p class="hero-description">Pet insurance helps cover unexpected medical expenses, giving you peace of mind and ensuring your pet gets the best care possible. Here's why it's worth considering for your furry friend.</p>
            </div>
            <div class="col-md-6">
                <img src="images/client.png" alt="Pet Insurance" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Checklist Accordion Section -->
<section class="checklist">
    <div class="container">
        <h2 class="section-title">Why You Should Consider Pet Insurance</h2>
        <div class="accordion" id="checklistAccordion">
            <!-- Benefit 1: Veterinary Bills Coverage -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Covers Unexpected Veterinary Bills
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Vet bills can quickly add up, especially for unexpected emergencies. Pet insurance helps cover these costs, ensuring that finances don't become an obstacle to getting your pet the treatment they need.</p>
                    </div>
                </div>
            </div>

            <!-- Benefit 2: Preventative Care Coverage -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. Covers Preventative Care
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Some pet insurance plans also cover preventative care, such as vaccinations, dental cleanings, and routine checkups, which can help your pet stay healthy long-term.</p>
                    </div>
                </div>
            </div>

            <!-- Benefit 3: Peace of Mind -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Provides Peace of Mind
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Knowing that your pet is covered by insurance can reduce the stress of making difficult decisions when they require medical care. Pet insurance gives you the peace of mind to focus on your pet’s recovery.</p>
                    </div>
                </div>
            </div>

            <!-- Benefit 4: Financial Protection -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. Financial Protection Against High Medical Costs
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Pet medical emergencies can be expensive, sometimes reaching thousands of dollars. Pet insurance helps protect you financially by covering a portion of those costs, so you don’t have to make hard choices due to budget constraints.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Tips Section -->
<section class="featured-tips">
    <div class="container">
        <h2 class="section-title">Additional Tips for Choosing Pet Insurance</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Understand the Coverage Options</h4>
                    <p>Different pet insurance policies cover different things. Some plans focus on accidents, while others offer comprehensive coverage for illness, injuries, and preventative care.</p>
                    <!-- <a href="/pet-insurance" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Consider the Age and Breed of Your Pet</h4>
                    <p>Some insurance plans may have age restrictions or breed-specific exclusions. Ensure that the plan you choose fits your pet’s unique needs.</p>
                    <!-- <a href="/pet-insurance" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Compare Plans and Costs</h4>
                    <p>Take the time to compare multiple pet insurance providers to find the plan that offers the best value and fits your budget.</p>
                    <!-- <a href="/pet-insurance" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<?php include('partials-front/footer.php'); ?>

<!-- Include Bootstrap JS for Accordion functionality -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

