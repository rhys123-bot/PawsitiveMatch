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
                <h1 class="hero-title">Creating a Routine for Your New Pet</h1>
                <p class="hero-description">Establishing a consistent routine for your pet is essential for their well-being and helps them feel secure in their new home. Here's how to get started with a balanced daily routine.</p>
            </div>
            <div class="col-md-6">
                <img src="images/client.png" alt="Creating a Routine" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Checklist Accordion Section -->
<section class="checklist">
    <div class="container">
        <h2 class="section-title">Steps to Establish a Healthy Routine for Your Pet</h2>
        <div class="accordion" id="checklistAccordion">
            <!-- Step 1: Set Feeding Times -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Set Regular Feeding Times
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Feed your pet at the same time each day. This consistency helps them know when to expect meals and can help with digestion and energy levels.</p>
                    </div>
                </div>
            </div>

            <!-- Step 2: Schedule Walks and Exercise -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. Schedule Walks and Exercise
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Exercise is essential for your pet’s health. Make sure to walk them or provide playtime at least twice a day to keep them active and stimulated.</p>
                    </div>
                </div>
            </div>

            <!-- Step 3: Create a Consistent Bedtime -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Create a Consistent Bedtime
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Pets thrive on routine, and bedtime is no exception. Set a regular time for your pet to settle down each night, ensuring they get enough rest.</p>
                    </div>
                </div>
            </div>

            <!-- Step 4: Plan Regular Playtime -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. Plan Regular Playtime
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Playtime is important for your pet's mental and emotional well-being. Set aside time each day for fun and engaging activities like fetch, tug-of-war, or interactive toys.</p>
                    </div>
                </div>
            </div>

            <!-- Step 5: Grooming & Hygiene -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        5. Grooming & Hygiene
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#checklistAccordion">
                    <div class="accordion-body">
                        <p>Regular grooming is an important part of your pet’s routine. Brush their coat, clean their ears, and trim their nails to ensure they stay healthy and comfortable.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Tips Section -->
<section class="featured-tips">
    <div class="container">
        <h2 class="section-title">Additional Tips for Creating a Routine</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Consistency Builds Comfort</h4>
                    <p>Pets thrive on consistency. By sticking to a schedule, your pet will feel more secure and confident in their environment.</p>
                    <!-- <a href="/creating-a-routine" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Adjust as Needed</h4>
                    <p>As your pet grows and their needs change, be flexible with the routine. Adjust meal times, playtimes, or exercise schedules based on their evolving habits.</p>
                    <!-- <a href="/creating-a-routine" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Reward Positive Behavior</h4>
                    <p>Reinforce positive behavior by rewarding your pet when they follow the routine. This encourages good habits and strengthens your bond.</p>
                    <!-- <a href="/creating-a-routine" class="btn btn-link">Learn More</a> -->
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

