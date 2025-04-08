<section class="contact">
    <div class="contact-text">
        <h2>Let’s talk.</h2>
        <p>
            If you have any questions about our products or company, we would be happy to hear from you.
            Please feel free to contact the relevant department, and we will get back to you shortly.
        </p>
    </div>

    <div class="contact-form-container">
        <h3>Contact</h3>

        <form action="/send-email" method="POST" class="contact-form">
            @csrf
            <div class="form-group">
                <label>Which team can help you?</label>
                <select name="team">
                    <option value="Sales">Sales</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" name="first_name" placeholder="Your first name*" required />
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="last_name" placeholder="Your last name*" required />
                </div>
            </div>

            <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" placeholder="Your email address*" required />
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" placeholder="Your company name*" required />
            </div>

            <div class="form-group">
                <label>Job title</label>
                <input type="text" name="job" placeholder="Your job title" />
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" rows="4" placeholder="I am interested in OTT platform. What can you do for me?"></textarea>
            </div>

            <div class="terms-of-condition">
                <input type="checkbox" id="privacy" required />
                <label>
                    Yes, I have read and agree with the <a href="#">Metrological Privacy Policy</a>
                </label>
            </div>

            <button type="submit" class="send-btn">
                Send message
                <img class="send-btn-icon" src="{{ asset('images/arrow-right.png') }}">
            </button>

            @if(session('success'))
            <div class="response-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="response-error">
                {{ session('error') }}
            </div>
            @endif
        </form>
    </div>
</section>