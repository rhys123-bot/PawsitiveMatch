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
                <h1 class="hero-title">Training & Socializing Your New Pet</h1>
                <p class="hero-description">Learn how to train and socialize your new pet effectively, ensuring they grow up to be well-behaved and comfortable in various environments. Our comprehensive guide will help you navigate the early stages of pet ownership.</p>
            </div>
            <div class="col-md-6">
                <img src="images/client.png" alt="Training & Socializing" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Checklist Accordion Section -->
<section class="checklist">
    <div class="container">
        <h2 class="section-title">Essential Steps for Training & Socializing Your Pet</h2>
        <div class="accordion" id="checklistAccordion">
            <!-- Step 1: Establish Basic Commands -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Establish Basic Commands
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Begin training your pet with simple commands such as "sit," "stay," and "come." Consistency is key for reinforcing these behaviors.</p>
                    </div>
                </div>
            </div>

            <!-- Step 2: Introduce Your Pet to New Environments -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. Introduce Your Pet to New Environments
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Socializing your pet involves exposing them to various environments and people. Gradually introduce them to new sights, sounds, and experiences to build their confidence.</p>
                    </div>
                </div>
            </div>

            <!-- Step 3: Enroll in Obedience Classes -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Enroll in Obedience Classes
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Consider enrolling your pet in obedience classes for professional guidance. These classes offer structure and help reinforce positive behaviors.</p>
                    </div>
                </div>
            </div>

            <!-- Step 4: Reinforce Positive Behavior -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. Reinforce Positive Behavior
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Use positive reinforcement techniques such as treats and praise to reward good behavior. This encourages your pet to repeat those behaviors in the future.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Tips Section -->
<section class="featured-tips">
    <div class="container">
        <h2 class="section-title">More Tips for Training & Socializing</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Consistency is Key</h4>
                    <p>Always be consistent with your commands and rewards. This helps your pet understand expectations and learn faster.</p>
                    <!-- <a href="/training-and-socializing" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Socializing with Other Pets</h4>
                    <p>Introduce your pet to other animals in a controlled environment. This will help them develop healthy relationships with other pets.</p>
                    <!-- <a href="/training-and-socializing" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Patience and Time</h4>
                    <p>Training and socializing your pet is a gradual process. Be patient and give your pet time to adjust and learn.</p>
                    <!-- <a href="/training-and-socializing" class="btn btn-link">Learn More</a> -->
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
