@extends('layouts.layout')

@section('title', 'Gender Voices')

@section('content')
<style>
.accordion-button:focus {
    box-shadow: none;
}

.accordion-button:not(.collapsed) {
    background-color: #f8f9fa;
    color: #000;
    border-color: #dee2e6;
}

.accordion-button:hover {
    background-color: #e9ecef;
    color: #000;
}
</style>
<div id="home-page" class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="display-4" style="font-weight: bold; font-size: 60px;">Gender Voices</h1>
        <p class="lead text-muted">Empowering Equality Through Conversation</p>
        <p class="text-muted" style="text-align: justify">
            Gender Voices is a platform dedicated to fostering gender equality by amplifying diverse voices and creating meaningful conversations.
            We aim to inspire change through education, awareness, and collaboration. Join us in our journey to build a more inclusive world.
        </p>
    </div>

    <div class="col-md-6">
        <img src="{{ asset('/gv.jpg') }}" class="img-fluid rounded" alt="Gender Voices Banner">
    </div>
</div>
<hr id="faq-page">
<h1 class="text-center mb-4" style="font-weight: bold;">FAQ</h1>
<div class="accordion mb-4" id="faqAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What is this website for?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="text-align: justify">
                Gender Voices is a platform dedicated to fostering gender equality by amplifying diverse voices and creating meaningful conversations. We provide a space for people to share their experiences, raise awareness on gender issues, and engage in educational discussions. Our goal is to inspire positive change and build a more inclusive society through open dialogue and collaboration.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                How can I contribute to Gender Voices?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="text-align: justify">
                You can contribute by sharing your story, writing articles, or participating in discussions. We welcome diverse voices to amplify gender equality conversations. Please sign-up or login to your account to contribute.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Is Gender Voices a non-profit organization?
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="text-align: justify">
                Yes, Gender Voices operates as a non-profit platform dedicated to raising awareness and advocating for gender equality. Our mission is to create a more inclusive world through education and open dialogue.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                How can I stay updated with Gender Voices' activities?
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="text-align: justify">
                You can stay updated by subscribing to our newsletter, following us on social media, and checking our "Contact Us" section for the latest updates on events, campaigns, and initiatives.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Do you have any partnerships or collaborations?
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="text-align: justify">
                Yes, Gender Voices collaborates with various organizations, activists, and advocates working towards gender equality. Our partnerships are built on shared values of inclusivity and empowerment.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                What resources do you offer to promote gender equality?
            </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="text-align: justify">
                We offer articles, guides, workshops, webinars, and discussions focused on gender equality. These resources are designed to educate, raise awareness, and inspire action for a more inclusive society.
            </div>
        </div>
    </div>
</div>
<hr id="about-us-page">
<h1 class="text-center" style="font-weight: bold;">About Us</h1>
<div class="mb-4">
    <h4>Our Mission</h4>
    <div>
        Gender Voices is dedicated to empowering individuals by amplifying diverse voices in the conversation for gender equality. We strive to build an inclusive platform where everyone, regardless of their background or identity, can share their thoughts, experiences, and contribute to a more equal world.
    </div>
    <br>

    <h4>Our Vision</h4>
    <div>
        Our vision is a world where gender equality is realized and sustained through education, awareness, and open dialogue. We believe that through collective action and thoughtful conversation, we can create lasting change and a more just society for future generations.
    </div>
    <br>

    <h4>Our Values</h4>
    <div>
        At Gender Voices, we are guided by core values that shape everything we do:
        <ul>
            <li><strong>Equality:</strong> We advocate for fairness and equal opportunities for all, regardless of gender.</li>
            <li><strong>Empowerment:</strong> We seek to empower individuals to speak up, share their stories, and inspire others to take action.</li>
            <li><strong>Inclusivity:</strong> We welcome voices from all walks of life, ensuring that no one is left behind in the conversation.</li>
            <li><strong>Respect:</strong> We uphold respect for all individuals, valuing diverse perspectives and fostering a safe space for open dialogue.</li>
        </ul>
    </div>

    <h4>Our Team</h4>
    <div>
        Our team is made up of passionate individuals from various fields who are committed to advancing gender equality. We come from different backgrounds, experiences, and expertise, but we are united in our mission to create a more inclusive and equitable world.
    </div>
    <br>

    <h4>Contact Us</h4>
    <div>
        We would love to hear from you! Whether you want to contribute an article, share your story, or simply connect with us, feel free to reach out. You can contact us by following us on social media for the latest updates and news.
    </div>
    <br>

    <h4>How You Can Get Involved</h4>
    <div>
        There are many ways to get involved with Gender Voices. You can contribute by writing articles, participating in discussions, or volunteering for events and campaigns. Visit our "Contact Us" page to learn more about how you can make a difference.
    </div>
    <br>
</div>
<hr id="contact-us-page">
<h1 class="text-center mb-3" style="font-weight: bold;">Contact Us</h1>
<div class="d-flex mx-auto mb-4">
    <div class="d-flex flex-column gap-2 align-items-center">
        <p style="text-align: justify;">
            "We believe that open dialogue is the key to progress. At Gender Voices, we strive to foster a community where diverse perspectives are celebrated, and every voice has the chance to contribute to the conversation. Your thoughts, ideas, and feedback are crucial in making a lasting impact. Together, we can create a more inclusive world."
        </p>
        <p style="text-align: justify;">
            "We encourage you to reach out to us with any questions, suggestions, or concerns. Whether you’re interested in collaborating, learning more about our mission, or just want to connect, we’re here to listen and engage. Your participation helps us shape the future of this platform and ensures that we remain true to our commitment to equality and empowerment."
        </p>
        <div class="d-flex gap-4">
            <a href="https://x.com" class="btn btn-primary">Twitter</a>
            <a href="https://mail.google.com" class="btn btn-primary">Email</a>
            <a href="https://www.instagram.com" class="btn btn-primary">Instagram</a>
        </div>
    </div>
</div>
@endsection
