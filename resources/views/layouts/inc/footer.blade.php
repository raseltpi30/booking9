<footer class="footer">
    <div class="footer-area">
        <div class="footer-left">
            <h1>Crystal Clean Sydney</h1>
            <div class="footer-columns">
                <div class="footer-column">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="{{ route('home') }}" data-route="{{ route('home') }}">HOME</a></li>
                        <li><a href="{{ route('services') }}" data-route="{{ route('services') }}">SERVICES</a></li>
                        <li><a href="{{ route('faq') }}" data-route="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('quotes') }}" data-route="{{ route('quotes') }}">COMMERCIAL QUOTES</a>
                        </li>
                        <li><a href="{{ route('contact') }}" data-route="{{ route('contact') }}">CONTACT</a></li>
                        <li class="book-now"><a href="{{ route('book-now') }}"
                                data-route="{{ route('book-now') }}">BOOK NOW!</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Service Areas</h4>
                    <ul>
                        <li><a href="#">Victoria</a></li>
                        <li><a href="#">Oak Bay</a></li>
                        <li><a href="#">Sidney</a></li>
                        <li><a href="#">Saanich</a></li>
                        <li><a href="#">Esquimalt</a></li>
                        <li><a href="#">Langford</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-right">
            <div class="footer-container">
                <div class="footer-column footer-contact">
                    <div style="display: flex; align-items: flex-end; margin-bottom: 10px;">
                        <img src="https://static1.squarespace.com/static/6682192d1022a0098a1c29d9/t/66bb106a7273402f5f04c691/1723535466724/Crystal+Clean+Logo.png"
                            alt="Crystal Clean Logo" style="width: 20px; margin-right: 10px; margin-bottom: 5px;">
                        <h3>Stay Connected</h3>
                    </div>
                    <!-- Use your custom form layout -->
                    <form
                        action="https://gmail.us17.list-manage.com/subscribe/post?u=fc240a5abdbc5e2841b70b522&amp;id=7e0676158c&amp;f_id=000bf6e2f0"
                        method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank"
                        novalidate>
                        <input type="email" name="EMAIL" placeholder="What's your email?" required>
                        <button type="submit">Subscribe</button>
                    </form>
                    <p>
                        <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Envelope Icon"
                            style="width: 20px; vertical-align: middle; margin-right: 5px;">
                        <a href="mailto:info.crystalcleansyd@gmail.com">info.crystalcleansyd@gmail.com</a>
                    </p>
                    <p>
                        <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone Icon"
                            style="width: 20px; vertical-align: middle; margin-right: 5px;">
                        <a href="tel:0426280899">0426-280-899</a>
                    </p>
                    <p style="margin-top: 10px; font-size: 1em; color: #000;">
                        <strong>ABN:</strong> 48 795 895 112
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-area">
    <div class="copyright-bottom">
        <p>Proud to be a Times Colonist 2023 Readers' Choice Award Finalist!</p>
    </div>
</div>
<style>
    footer {
        background-color: #D8E1DE;
    }

    .footer-area {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        max-width: 1250px;
        margin: auto;
    }

    .footer-left {
        width: 30%;
    }

    .footer-left h1 {
        font-size: 28px;
        color: #2C2C2C;
    }

    .footer-columns {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .footer-column h4 {
        font-size: 16px;
        color: #2C2C2C;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .footer-column ul {
        list-style-type: none;
        padding: 0;
    }

    .footer-column ul li {
        margin-bottom: 8px;
    }

    .footer-column ul li a {
        text-decoration: none;
        color: #2C2C2C;
    }

    .footer-column ul li a:hover {
        text-decoration: underline;
    }

    .footer-right {
        width: 30%;
    }

    .footer-right h4 {
        font-size: 18px;
        font-weight: bold;
        color: #2C2C2C;
    }

    .subscribe-form {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .subscribe-form input[type="email"] {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #2C2C2C;
        border-radius: 4px;
        outline: none;
        width: 200px;
    }

    .subscribe-form button {
        padding: 10px 20px;
        font-size: 14px;
        background-color: transparent;
        border: 1px solid #2C2C2C;
        cursor: pointer;
        margin-left: 10px;
        border-radius: 4px;
    }

    .subscribe-form button:hover {
        background-color: #2C2C2C;
        color: white;
    }

    .footer-contact {
        margin-top: 20px;
    }

    .footer-contact p {
        margin: 5px 0;
        color: #2C2C2C;
        font-size: 14px;
    }

    .copyright-bottom {
        text-align: center;
        font-size: 14px;
        color: #2C2C2C;
        background-color: #D8E1DE;
        padding: 10px 0;
        font-weight: 700;
    }
</style>
