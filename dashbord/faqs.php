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

    /* FAQ Section */
    .faq-section {
        padding: 60px 20px;
        background-color: #e9f5e9;
    }

    .faq-section h2 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #2E8B57;
        text-align: center;
        margin-bottom: 40px;
    }

    .accordion-button {
        background-color: #FFD700;
        color: #333;
        font-size: 1.2rem;
        font-weight: 500;
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

    .accordion-item {
        margin-bottom: 15px;
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

</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="hero-title">Pet Adoption FAQs</h1>
                <p class="hero-description">Thinking about adopting a pet? Get answers to all the questions you might have about the adoption process, what to expect, and how to prepare for your new companion.</p>
            </div>
            <div class="col-md-6">
                <img src="images/dog.png" alt="Pet Adoption" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ 1: Why Adopt? -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. Why Should I Adopt a Pet Instead of Buying One?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Adopting a pet gives you the chance to provide a loving home to an animal in need. Shelters and rescues are filled with pets of all ages, breeds, and sizes waiting for their forever homes. Additionally, adoption helps reduce overpopulation and gives a pet a second chance at a happy life.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 2: Adoption Process -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. What Is the Adoption Process Like?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>The adoption process typically involves filling out an adoption application, meeting with an adoption counselor, and often a home visit. You’ll need to provide information about your living situation, experience with pets, and your ability to care for your new companion. If everything checks out, you may be approved to adopt and bring your new pet home.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 3: Adoption Fees -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        3. Are There Any Adoption Fees?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Yes, there is usually an adoption fee that helps cover the cost of the pet’s care while in the shelter or rescue. This fee typically includes vaccinations, spaying/neutering, and microchipping. The exact amount varies depending on the shelter or rescue organization.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 4: What Supplies Do I Need? -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. What Supplies Should I Have Before Bringing My Pet Home?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>Before bringing your new pet home, be sure to have the basics ready. This includes a comfortable bed, food and water bowls, food, toys, and grooming supplies. If you’re adopting a dog, you’ll also need a leash, collar, and a crate or carrier for travel. You may also want to set up a safe space for your pet to adjust to their new environment.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 5: What If I Want to Return My Pet? -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        5. What Happens If I Decide I Can’t Keep My Pet?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p>If you find that you can’t keep your adopted pet, most rescues and shelters will have a return policy, allowing you to bring the pet back. It's important to communicate with the organization early to discuss options and make arrangements for rehoming the pet. Adoption should be a lifetime commitment, so be sure you are ready for the responsibility before bringing a pet into your home.</p>
                    </div>
                </div>
            </div>

            <!-- More FAQs can be added similarly -->
        </div>
    </div>
</section>

<!-- Featured Tips Section -->
<section class="featured-tips">
    <div class="container">
        <h2 class="section-title">Additional Tips for Pet Adopters</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Be Patient</h4>
                    <p>Remember, your new pet may need time to adjust to their new home. Be patient and understanding during this transition.</p>
                    <!-- <a href="#" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Prepare Your Home</h4>
                    <p>Make sure your home is ready for your new pet by removing any hazards and setting up a safe space for them to relax.</p>
                    <!-- <a href="#" class="btn btn-link">Learn More</a> -->
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="tip-card">
                    <h4 class="tip-title">Visit the Vet</h4>
                    <p>Schedule a vet appointment soon after bringing your pet home to ensure they are healthy and up-to-date on vaccinations.</p>
                    <!-- <a href="#" class="btn btn-link">Learn More</a> -->
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

