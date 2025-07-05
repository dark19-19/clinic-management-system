<div class="page-footer">
    <div class="footer-card about">
        <div class="top">
            <h4>Dark Clinic</h4>
        </div>
        <div class="content">
            Designed and built with love and passion, we made it just to comfort you.
            <p>Encryption: By <span>DARK-encCOM</span>.</p>
        </div>
    </div>
    <div class="footer-card links">
        <div class="top">
            <h4>Links</h4>
        </div>
        <ul class="footer-links">
            @auth()
                @if(auth()->user()->role_id != 6)
            <li class="footer-link">
                <a href="#">Appointments</a>
            </li>
                @endif
            @endauth
            <li class="footer-link">
                <a href="#">Contact Us</a>
            </li>
            <li class="footer-link">
                <a href="#">About Us</a>
            </li>
        </ul>
    </div>
    <div class="footer-card contact-us">
        <div class="top">
            <h4>Contact Us</h4>
        </div>
        <div class="content">
            <ul>
                <li>Email: dark.official@clin.de</li>
                <li>Phone: +1 933 925 933</li>
                <li>Support: support@clin.de</li>
            </ul>
        </div>
    </div>
</div>
