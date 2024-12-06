@extends('layouts.layout')

@section('title', 'Gender Voices')

@section('content')
<style>
section {
    scroll-margin-top: 80px;
    margin-top: 40px;
    margin-bottom: 40px;
}

.accordion-item{
    border-color: var(--brown);
}

.accordion-button:focus {
    box-shadow: none;
}

.accordion-button:not(.collapsed) {
    background-color: var(--beige);
    color: black;
}

.accordion-button:hover {
    background-color: var(--beige);
}

#home-page {
    position: relative;
    scroll-margin-top: 80px;
}

#home-page img {
    width: 100%;
    height: auto;
}

.overlay-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    padding: 20px;
    background: rgba(255, 255, 255, 0.7);
}

.card {
    border: 1px solid var(--brown);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-title {
    font-weight: bold;
}

@media (max-width: 992px) {
    .overlay-text h1 {
        font-size: 30px;
    }
    .overlay-text p.lead {
        font-size: 16px;
    }
    .overlay-text p {
        font-size: 14px;
    }
    .overlay-text {
        font-size: 12px;
    }
}

@media (max-width: 768px) {
    .overlay-text h1 {
        font-size: 20px;
    }
    .overlay-text p.lead {
        font-size: 12px;
    }
    .overlay-text p {
        font-size: 10px;
    }
    .overlay-text {
        padding: 5px;
    }
}

@media (max-width: 536px) {
    .overlay-text h1 {
        font-size: 15px;
    }
    .overlay-text p.lead {
        font-size: 8px;
    }
    .overlay-text p {
        font-size: 8px;
    }
    .overlay-text {
        padding: 3px;
    }
}
</style>

<div id="home-page" class="position-relative mb-4">
    <img src="{{ asset('/gv.jpg') }}" class="img-fluid rounded w-100" alt="Gender Voices Banner">
    <div class="overlay-text position-absolute top-50 start-50 translate-middle text-center rounded">
        <h1 class="display-4" style="font-weight: bold;">Gender Voices</h1>
        <p class="lead">~ Empowering Equality Through Conversation ~</p>
        <p class="mb-0">
            Gender Voices is a platform dedicated to fostering gender equality by amplifying diverse voices and creating meaningful conversations.
            We aim to inspire change through education, awareness, and collaboration. Join us in our journey to build a more inclusive world.
        </p>
    </div>
</div>
<section id="about-us-page">
    <h1 class="text-center mb-4" style="font-weight: bold;">About Us</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Our Mission</h4>
                    <p class="card-text" style="text-align: justify;">
                        Gender Voices is dedicated to empowering individuals by amplifying diverse voices in the conversation for gender equality. We strive to build an inclusive platform where everyone, regardless of their background or identity, can share their thoughts, experiences, and contribute to a more equal world.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Our Vision</h4>
                    <p class="card-text" style="text-align: justify;">
                        Our vision is a world where gender equality is realized and sustained through education, awareness, and open dialogue. We believe that through collective action and thoughtful conversation, we can create change and a more just society for future generations.  We envision a future where every individual, regardless of gender, has the opportunity to thrive and contribute to their fullest potential.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Our Values</h4>
                    <p class="card-text mb-1" style="text-align: justify;">
                        At Gender Voices, we are guided by core values that shape everything we do:
                    </p>
                    <ul class=" pl-4 mb-0">
                        <li><strong>Equality:</strong> We advocate for fairness and equal opportunities for all, regardless of gender.</li>
                        <li><strong>Empowerment:</strong> We seek to empower individuals to speak up, share their stories, and inspire others to take action.</li>
                        <li><strong>Inclusivity:</strong> We welcome voices from all walks of life, ensuring that no one is left behind in the conversation.</li>
                        <li><strong>Respect:</strong> We uphold respect for all individuals, valuing diverse perspectives and fostering a safe space for open dialogue.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Our Team</h4>
                    <p class="card-text" style="text-align: justify;">
                        Our team is made up of passionate individuals from various fields who are committed to advancing gender equality. We come from different backgrounds, experiences, and expertise, but we are united in our mission to create a more inclusive and equitable world.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Us</h4>
                    <p class="card-text" style="text-align: justify;">
                        We would love to hear from you! Whether you want to contribute an article, share your story, or simply connect with us, feel free to reach out. You can contact us by following us on social media for the latest updates and news.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">How You Can Get Involved</h4>
                    <p class="card-text" style="text-align: justify;">
                        There are many ways to get involved with Gender Voices. You can contribute by writing articles, participating in discussions, or volunteering for events and campaigns. Visit our "Contact Us" page to learn more about how you can make a difference.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="faq-page">
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
</section>
<section id="contact-us-page">
    <h1 class="text-center mb-3" style="font-weight: bold;">Contact Us</h1>
    <div class="d-flex mx-auto mb-4 bg-white p-4 rounded" style="border: 1px solid var(--brown)">
        <div class="d-flex flex-column gap-2 align-items-center">
            <p style="text-align: justify;">
                "We believe that open dialogue is the key to progress. At Gender Voices, we strive to foster a community where diverse perspectives are celebrated, and every voice has the chance to contribute to the conversation. Your thoughts, ideas, and feedback are crucial in making a lasting impact. Together, we can create a more inclusive world."
            </p>
            <p style="text-align: justify;">
                "We encourage you to reach out to us with any questions, suggestions, or concerns. Whether you’re interested in collaborating, learning more about our mission, or just want to connect, we’re here to listen and engage. Your participation helps us shape the future of this platform and ensures that we remain true to our commitment to equality and empowerment."
            </p>
            <div class="d-flex gap-4">
                <a href="https://x.com" class="btn-primary"><img style="width: 20px" src="{{ asset('/twitter.png') }}" alt="Twitter"></a>
                <a href="https://mail.google.com" class="btn-primary"><img style="width: 20px" src="{{ asset('/gmail.png') }}" alt="Gmail"></a>
                <a href="https://www.instagram.com" class="btn-primary"><img style="width: 20px" src="{{ asset('/instagram.png') }}" alt="Instagram"></a>
            </div>
        </div>
    </div>
</section>
@endsection
