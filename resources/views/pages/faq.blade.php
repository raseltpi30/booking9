@extends('layouts.app')
@section('title')
Faq
@endsection
@section('main_content')
    <div class="faq-container">
        <h2 id="yui_3_17_2_1_1721049301493_435">Frequently Asked Questions</h2>
        <p>Answers to common questions about our cleaning services, security measures, and more.</p>
        <div class="faq-row">
            <div class="faq-category">
                <h4>Cleaning Services</h4>
                <div class="faq-item">
                    <div class="question">General Cleaning</div>
                    <div class="answer">
                        <p>General Cleaning provides a thorough and consistent cleaning service designed to keep your
                            home or office in top condition. This service covers all essential areas, ensuring a clean
                            and hygienic environment. It’s perfect for regular upkeep, whether you prefer weekly,
                            bi-weekly, or monthly visits, making sure your space always looks its best.
                        </p>
                        <ul>
                            <li>Sweep, vacuum, and mop all flooring.</li>
                            <li>Clear away any cobwebs.</li>
                            <li>Thoroughly dust surfaces, including ceiling fans, light fixtures, and window treatments.
                            </li>
                            <li>Clean all baseboards and window sills.</li>
                            <li>Tidy up by making beds.</li>
                            <li>Sanitize switch plates and disinfect doorknobs.</li>
                        </ul>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">Deep Cleaning</div>
                    <div class="answer">
                        <p>Deep Cleaning involves an extensive cleaning regime to cover areas that are usually not
                            addressed in regular cleaning. This service is perfect for a comprehensive clean that makes
                            your space feel renewed.</p>
                        <ul>
                            <li>All standard cleaning tasks plus:</li>
                            <li>Carefully wipe down furniture and vacuum underneath (limitations on lifting heavy
                                furniture apply), targeting dust and debris.</li>
                            <li>Clean door frames and facings to remove any fingerprints and stains.</li>
                            <li>Vigorously vacuum baseboards to eliminate all accumulated dust.</li>
                        </ul>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">End of Lease Cleaning</div>
                    <div class="answer">
                        <p>Our End of Lease Cleaning ensures your property is spotless for arriving or departing
                            occupants. This comprehensive service covers every detail needed for a pristine transition.
                        </p>
                        <ul>
                            <li>Perform all Standard Cleaning tasks.</li>
                            <li>Thoroughly wipe down all furniture and vacuum beneath it, ensuring every corner is
                                pristine (note: we will not move furniture that is excessively heavy).</li>
                            <li>Diligently clean door frames and facings to ensure every edge is spotless.</li>
                            <li>Intensively vacuum baseboards to remove every trace of dust and dirt.</li>
                            <li>Pay special attention to light fixtures, door knobs, and switch plates, sanitizing and
                                polishing them to a high standard.</li>
                        </ul>
                    </div>
                </div>
                <div class="faq-item active">
                    <div class="question">Commercial Cleaning</div>
                    <div class="answer active">
                        <p>Commercial cleaning involves maintaining cleanliness and hygiene in office spaces and other
                            commercial properties. This service is perfect for a comprehensive clean that makes your
                            workspace feel renewed.</p>
                        <ul>
                            <li>All standard cleaning tasks plus:</li>
                            <li>Carefully wipe down furniture and vacuum underneath (limitations on lifting heavy
                                furniture apply), targeting dust and debris.</li>
                            <li>Clean door frames and facings to remove any fingerprints and stains.</li>
                            <li>Vigorously vacuum baseboards to eliminate all accumulated dust.</li>
                            <li>Additionally, we tailor our services to meet the specific needs of different commercial
                                settings, ensuring thorough cleaning in areas like offices, retail spaces, and more.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">Organisation by the Hour</div>
                    <div class="answer">
                        <p>If your home has areas that are cluttered and unmanageable, our hourly organization service
                            is perfect for you. We provide expert help to tidy up any space, from garages and closets to
                            entire rooms. Starting with a minimum of two hours, our professional organizers are
                            committed to staying as long as necessary to transform your space into a perfectly ordered
                            environment. To discuss your specific needs and arrange a session, please contact us via
                            phone or email.</p>
                    </div>
                </div>
            </div>
            <div class="faq-category">
                <h4>Trust &amp; Security</h4>
                <div class="faq-item">
                    <div class="question">Are the cleaning professionals trustworthy?</div>
                    <div class="answer">
                        <p>All our cleaning staff undergo rigorous interviews and criminal background checks before
                            joining our team. We ensure that only the most reliable and trustworthy individuals enter
                            your home, with only about 10% of applicants making the cut.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">What is your refund policy?</div>
                    <div class="answer">
                        <p>If our cleaning does not meet your expectations, please inform us within 24 hours. We are
                            committed to making it right and will send a team to re-clean the areas in question within a
                            7-day window.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">How do we ensure the security of your billing information?</div>
                    <div class="answer">
                        <p>We take your security seriously. All transactions are processed through Stripe, utilizing
                            advanced 256-bit encryption. Our booking platform is secured with SSL encryption, and we
                            store only secure tokens, not actual credit card numbers.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq-row">
            <div class="faq-category">
                <h4>Policies &amp; Procedures</h4>
                <div class="faq-item">
                    <div class="question">What cleaning services do you not provide?</div>
                    <div class="answer">
                        <p>Our services are comprehensive, yet there are limitations for safety and quality reasons:</p>
                        <ul>
                            <li>No heavy lifting of furniture or moving of heavy items.</li>
                            <li>We do not clean exterior windows, light bulbs, or deep stains on walls.</li>
                            <li>We cannot clean in homes under renovation or handle tasks like post-construction
                                cleaning without prior arrangements.</li>
                            <li>Our team avoids handling biohazardous materials and strong odors like mold or smoke.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">Can I have my home cleaned if I am not there?</div>
                    <div class="answer">
                        <p>Yes, many clients are not home during our cleaning sessions. We just need instructions for
                            how to safely enter and secure your home.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">How many cleaners do you send?</div>
                    <div class="answer">
                        <p>This depends on the size and specific needs of your home. Typically, one cleaner is
                            sufficient for smaller homes, but larger homes may require two.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">How do I cancel or update my cleaning service booking?</div>
                    <div class="answer">
                        <p>You can cancel or update your booking by emailing us at info.crystalcleansyd@gmail.com or by
                            calling us. Please provide at least 24 hours' notice for cancellations to avoid a
                            cancellation fee. For updates, providing ample notice helps us adjust our schedule to meet
                            your specific needs.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">What are our Terms and Conditions?</div>
                    <div class="answer">
                        <p>You can read our full terms and conditions by visiting the following link: <a
                                href="/terms-and-condition" style="color: blue;">Terms and Conditions</a>.</p>
                    </div>
                </div>
            </div>
            <div class="faq-category">
                <h4>Getting Started</h4>
                <div class="faq-item">
                    <div class="question">How do I arrange cleaning for select rooms or partial home cleaning?</div>
                    <div class="answer">
                        <p>We offer flexible cleaning options to suit your specific needs. If you only need particular
                            areas or select rooms of your home cleaned, you can book our specialized service. For
                            targeted cleaning, we require a minimum booking of three hours. This ensures that our
                            cleaners have sufficient time to deliver a focused and thorough clean. Just specify the
                            rooms or areas you need cleaned when booking, and we'll customize the session to fit your
                            requirements.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">What are the costs involved?</div>
                    <div class="answer">
                        <p>Prices vary based on the size of the area and the type of cleaning required. Please visit our
                            book now page or contact us directly for a detailed quote.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">What regions do you cover?</div>
                    <div class="answer">
                        <p>We provide services throughout the greater Sydney area, including:</p>
                        <ul>
                            <li>The Hills District</li>
                            <li>North Shore</li>
                            <li>Northern Beaches</li>
                            <li>Macquarie and Ryde</li>
                            <li>The Inner West</li>
                            <li>Eastern Suburbs</li>
                            <li>Parramatta Region</li>
                            <li>Greater Western Sydney</li>
                            <li>Sutherland Shire</li>
                            <li>South Western Sydney</li>
                        </ul>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="question">Are cleaning supplies provided?</div>
                    <div class="answer">
                        <p>Yes, we bring all necessary cleaning supplies, products, and equipment to ensure a thorough
                            clean of your space.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
