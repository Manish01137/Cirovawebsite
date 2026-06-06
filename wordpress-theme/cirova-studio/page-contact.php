<?php get_header(); ?>
<main>

<!-- SECTION: HERO -->
<section class="hero" id="top">
  <span class="hero__blob" aria-hidden="true"></span>
  <span class="hero__blob-2" aria-hidden="true"></span>
  <div class="container hero__inner">
    <div class="hero__copy">
      <span class="badge-status"><span class="dot"></span> Now accepting new projects</span>
      <h1 class="h1">Let's Start <span class="grad-text">Your Project</span></h1>
      <p class="lead">Whether you are looking for digital marketing services, website development, social media management, or paid advertising support, our team is ready to help you move forward with the right strategy.</p>
      <div class="btn-row">
        <a class="btn btn--primary" href="#form">Send a Message <span class="icon i-arrow-right" aria-hidden="true"></span></a>
        <a class="btn btn--ghost" href="mailto:<?php echo esc_attr( cs_field( 'contact_email', 'cirovastudio@gmail.com', true ) ); ?>">Email Us Directly</a>
      </div>
      <div class="stats" style="margin-top:2rem">
        <div class="stat"><div class="num" data-count="24">0<em>h</em></div><p>Response Time</p></div>
        <div class="stat"><div class="num" data-count="300">0<em>+</em></div><p>Experts On Call</p></div>
        <div class="stat"><div class="num" data-count="98">0<em>%</em></div><p>Reply Rate</p></div>
        <div class="stat"><div class="num" data-count="100">0<em>%</em></div><p>Free Consult</p></div>
      </div>
    </div>

    <!-- live chat mockup -->
    <div class="hero__visual reveal">
      <div class="mock">
        <div class="chat__head" style="padding:1rem;border-bottom:1px solid var(--border)"><span class="av">C</span><span><b>Cirova Studio</b><br><span>Online · Replies in 24h</span></span></div>
        <div class="chat">
          <div class="chat__row chat__row--me"><span class="bubble">Hi! I'm planning a SaaS launch and need full marketing support.</span></div>
          <div class="chat__row"><span class="bubble">Hi! Happy to help. What's your timeline and main goal?</span></div>
          <div class="chat__row chat__row--me"><span class="bubble">Launch in 6 weeks — need website, ads, and content.</span></div>
          <div class="chat__row"><span class="bubble">Perfect. Let's schedule a discovery call this week.</span></div>
          <div class="chat__row chat__row--me"><span class="bubble">Sounds great. Book me in!</span></div>
        </div>
        <div style="display:flex;gap:.5rem;align-items:center;padding:.75rem 1rem;border-top:1px solid var(--border)">
          <span style="flex:1;color:var(--muted-2);font-size:.85rem">Type your message…</span>
          <span class="icon i-send" aria-hidden="true" style="background:var(--grad);width:22px;height:22px"></span>
        </div>
      </div>
      <div style="display:flex;gap:.5rem;flex-wrap:wrap;justify-content:center;margin-top:1rem">
        <span class="pill"><span class="icon i-zap"></span> Response 24h</span>
        <span class="pill"><span class="icon i-calendar-check"></span> Free Discovery Call</span>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: REACH OUT + METHODS -->
<section class="section section--wash">
  <div class="container split">
    <div class="split__copy reveal">
      <span class="eyebrow">Get In Touch</span>
      <h2 class="h2">Reach Out to <span class="grad-text">Cirova Studio.</span></h2>
      <p class="lead" style="margin-top:1rem">At Cirova Studio, businesses connect with experienced specialists who understand growth-focused marketing. From campaign planning to full marketing support, we provide structured solutions designed to deliver measurable results.</p>
      <p class="muted" style="margin-top:1rem">If you are searching for a digital marketing agency near me, our team is available to discuss your requirements, timelines, and business goals.</p>
    </div>
    <div class="split__visual reveal">
      <div class="contact-methods">
        <?php
          $cs_email = cs_field( 'contact_email', 'cirovastudio@gmail.com', true );
          $cs_phone = cs_field( 'contact_phone', '+91 9877147660', true );
          $cs_tel   = preg_replace( '/[^0-9+]/', '', $cs_phone );
          $cs_addr  = cs_field( 'contact_address', 'Gurugram, Haryana', true );
        ?>
        <div class="method"><div class="method__icon"><span class="icon i-mail"></span></div><div><b>Email Us</b><a href="mailto:<?php echo esc_attr( $cs_email ); ?>"><?php echo esc_html( $cs_email ); ?></a><br><span>For project inquiries &amp; collaborations</span></div></div>
        <div class="method"><div class="method__icon"><span class="icon i-phone"></span></div><div><b>Call Us</b><a href="tel:<?php echo esc_attr( $cs_tel ); ?>"><?php echo esc_html( $cs_phone ); ?></a><br><span>Mon–Sat · 10:00 AM to 7:00 PM IST</span></div></div>
        <div class="method"><div class="method__icon"><span class="icon i-map-pin"></span></div><div><b>Visit Us</b><span><?php echo esc_html( $cs_addr ); ?></span><br><span>Plus remote collaboration worldwide</span></div></div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: FORM -->
<section class="section" id="form">
  <div class="container" style="max-width:760px">
    <div class="section-head center reveal"><span class="eyebrow" style="justify-content:center;display:flex">Tell Us About Your Project</span><h2 class="h2">Send Us a <span class="grad-text">Message.</span></h2><p class="lead" style="margin:1rem auto 0">Share a few details about your project and our team will reach out within one business day to schedule a discovery call.</p></div>

    <?php $cs_sent = isset( $_GET['sent'] ); $cs_err = isset( $_GET['error'] ) ? sanitize_key( $_GET['error'] ) : ''; ?>
    <form class="form reveal" id="contact-form" style="margin-top:2.5rem" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
      <input type="hidden" name="action" value="cirova_contact">
      <?php wp_nonce_field( 'cs_contact', 'cs_contact_nonce' ); ?>
      <!-- honeypot (hidden from humans; bots fill it) -->
      <div aria-hidden="true" style="position:absolute;left:-9999px;height:0;overflow:hidden"><label>Website<input type="text" name="cs_website" tabindex="-1" autocomplete="off"></label></div>

      <div class="form__success<?php echo $cs_sent ? ' show' : ''; ?>"><span class="icon i-check" aria-hidden="true"></span> Thanks! Your message has been received — we'll reply within one business day.</div>
      <?php if ( $cs_err ) : ?>
        <div class="form__error show"><span class="icon i-x" aria-hidden="true"></span>
          <?php echo $cs_err === 'send' ? 'Sorry, the message could not be sent right now. Please email us directly.' : 'Please check the required fields and try again.'; ?>
        </div>
      <?php endif; ?>

      <div class="grid grid--2">
        <div class="field"><label for="cf-name">Your Name</label><input id="cf-name" name="name" type="text" autocomplete="name" placeholder="Jane Doe" required></div>
        <div class="field"><label for="cf-email">Email Address</label><input id="cf-email" name="email" type="email" autocomplete="email" placeholder="jane@brand.com" required></div>
      </div>
      <div class="grid grid--2">
        <div class="field"><label for="cf-company">Company</label><input id="cf-company" name="company" type="text" autocomplete="organization" placeholder="Brand Inc."></div>
        <div class="field"><label for="cf-budget">Project Budget</label>
          <select id="cf-budget" name="budget">
            <option value="" selected>Select a range</option>
            <option>Under ₹50,000</option>
            <option>₹50,000 – ₹1,50,000</option>
            <option>₹1,50,000 – ₹5,00,000</option>
            <option>₹5,00,000+</option>
            <option>Not sure yet</option>
          </select>
        </div>
      </div>
      <div class="field"><label for="cf-message">Tell us about your project</label><textarea id="cf-message" name="message" placeholder="What are you trying to achieve? Services needed, timeline, goals…" required></textarea></div>
      <button class="btn btn--primary btn--block" type="submit">Send Message <span class="icon i-send" aria-hidden="true"></span></button>
    </form>
  </div>
</section>

<!-- SECTION: FAQ -->
<section class="section section--wash" id="faq">
  <div class="container">
    <div class="section-head center reveal"><span class="eyebrow" style="justify-content:center;display:flex">Common Questions</span><h2 class="h2">Frequently Asked <span class="grad-text">Questions.</span></h2></div>
    <div class="faq" style="margin-top:2.5rem">
      <div class="faq__item"><button class="faq__q" aria-expanded="false">How quickly will your team respond to inquiries? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Our team usually responds within one business day. After reviewing your request, we schedule a short consultation to understand your project requirements and recommend suitable digital marketing services.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">What information should I include in my contact request? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Include your website link, business goals, required services, project timeline, and budget range. This helps our team recommend the most relevant marketing approach during the consultation.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">Do you work with businesses from different industries? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Yes. Cirova Studio supports startups, growing businesses, ecommerce brands, service companies, and enterprises looking to improve online visibility through structured marketing strategies and integrated digital solutions.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">Can I request multiple marketing services together? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Yes. Many businesses combine services such as website development, content creation, paid advertising, and social media marketing to build a coordinated strategy that improves visibility and lead generation.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">Do you offer consultation before starting a project? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Yes. We begin with a short discovery consultation to understand your goals, audience, and marketing challenges. This allows our team to recommend the right marketing strategy for your business.</p></div></div>
    </div>
  </div>
</section>

<!-- SECTION: CTA -->
<section class="section" id="contact">
  <div class="container"><div class="cta reveal"><div class="cta__inner">
    <h2 class="h2">Ready to grow with <span class="grad-text">Cirova Studio?</span></h2>
    <p class="lead" style="margin:1rem auto 0">Drop us a message, give us a call, or stop by the studio. Whichever works best — we'll get back to you within one business day.</p>
    <?php $cs_em2 = cs_field( 'contact_email', 'cirovastudio@gmail.com', true ); $cs_ph2 = cs_field( 'contact_phone', '+91 9877147660', true ); ?>
    <div class="btn-row"><a class="btn btn--primary" href="mailto:<?php echo esc_attr( $cs_em2 ); ?>">Email Cirova Studio <span class="icon i-mail" aria-hidden="true"></span></a><a class="btn btn--ghost" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $cs_ph2 ) ); ?>">Call <?php echo esc_html( $cs_ph2 ); ?></a></div>
  </div></div></div>
</section>

</main>
<?php get_footer(); ?>
