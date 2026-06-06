<?php get_header(); ?>
<main>

<!-- SECTION: HERO -->
<section class="hero" id="top">
  <span class="hero__blob" aria-hidden="true"></span>
  <span class="hero__blob-2" aria-hidden="true"></span>
  <div class="container hero__inner">
    <div class="hero__copy">
      <span class="badge-status"><span class="dot"></span> Now booking website projects</span>
      <h1 class="h1">High-Performance <span class="grad-text">Website Development</span> Services for Your Brand</h1>
      <p class="lead">Cirova Studio delivers professional website development services designed to build fast, secure, and conversion-focused websites. Our developers create scalable digital platforms that improve user experience, visibility, and business performance.</p>
      <div class="btn-row">
        <a class="btn btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Start Your Website Project <span class="icon i-arrow-right" aria-hidden="true"></span></a>
        <a class="btn btn--ghost" href="#capabilities">Request Development Quote</a>
      </div>
      <div class="stats" style="margin-top:2rem">
        <div class="stat"><div class="num" data-count="100">0<em>+</em></div><p>Developers</p></div>
        <div class="stat"><div class="num" data-count="7">0</div><p>Tech Stacks</p></div>
        <div class="stat"><div class="num" data-count="200">0<em>+</em></div><p>Sites Shipped</p></div>
        <div class="stat"><div class="num" data-count="99">0<em>%</em></div><p>Uptime SLA</p></div>
      </div>
    </div>

    <!-- code editor + live preview mockup -->
    <div class="hero__visual reveal">
      <div class="mock">
        <div class="mock__bar"><span class="mock__dots"><i></i><i></i><i></i></span> App.jsx — cirova-website/src <span style="margin-left:auto">REACT · JSX</span></div>
        <pre class="code-body"><span class="ln">1</span><span class="kw">import</span> React <span class="kw">from</span> <span class="str">"react"</span>;
<span class="ln">2</span><span class="kw">import</span> { Hero, Footer } <span class="kw">from</span> <span class="str">"./components"</span>;
<span class="ln">3</span>
<span class="ln">4</span><span class="cm">// Cirova Studio — high-performance build</span>
<span class="ln">5</span><span class="kw">export default function</span> App() {
<span class="ln">6</span>  <span class="kw">return</span> (
<span class="ln">7</span>    &lt;main className=<span class="str">"cirova"</span>&gt;
<span class="ln">8</span>      &lt;Hero cta=<span class="str">"Get a Free Quote"</span> /&gt;
<span class="ln">9</span>    &lt;/main&gt;
</pre>
        <span class="mock__float" style="top:64px;right:14px"><span class="icon i-gauge"></span> 100/100 LIGHTHOUSE</span>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: INTRO + TECH STACK -->
<section class="section section--wash">
  <div class="container split">
    <div class="split__copy reveal">
      <span class="eyebrow">Modern Businesses</span>
      <h2 class="h2">Professional Website Development for <span class="grad-text">Modern Businesses.</span></h2>
      <p class="lead" style="margin-top:1rem">Our website development services help businesses create powerful digital platforms that combine design, performance, and scalability. A website today is more than a digital presence — it's a central marketing asset that drives leads, engagement, and conversions.</p>
      <p class="muted" style="margin-top:1rem">Cirova Studio works with a team of 100+ experienced developers, designers, and engineers who specialize in building high-performing websites across industries.</p>
    </div>
    <div class="split__visual reveal">
      <p class="muted" style="margin-bottom:1rem">We develop websites using leading platforms and technologies including:</p>
      <div class="platform-grid">
        <span class="platform"><span class="icon i-brand-wordpress"></span> WordPress</span>
        <span class="platform"><span class="icon i-brand-shopify"></span> Shopify</span>
        <span class="platform"><span class="icon i-code"></span> HTML &amp; CSS</span>
        <span class="platform"><span class="icon i-brand-javascript"></span> JavaScript</span>
        <span class="platform"><span class="icon i-brand-react"></span> React</span>
        <span class="platform"><span class="icon i-brand-php"></span> PHP</span>
        <span class="platform"><span class="icon i-layers"></span> Custom Apps</span>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: CAPABILITIES -->
<section class="section" id="capabilities">
  <div class="container">
    <div class="section-head reveal"><span class="eyebrow">Capabilities</span><h2 class="h2">Built for <span class="grad-text">Any Platform.</span></h2><p class="lead" style="margin-top:1rem">Our development team builds websites using a wide range of platforms and programming languages to match different business needs.</p></div>
    <div class="grid grid--3" style="margin-top:2.5rem">
      <article class="card svc-card reveal"><span class="card__num">CMS</span><div class="card__icon"><span class="icon i-brand-wordpress"></span></div><h3>WordPress Website Development</h3><p>We design flexible and scalable websites using WordPress, making it easy for businesses to manage content while maintaining strong performance and search visibility. Many clients compare us with leading WordPress development companies.</p></article>
      <article class="card svc-card reveal"><span class="card__num">CODE</span><div class="card__icon"><span class="icon i-code"></span></div><h3>Custom Web Development with Coding Languages</h3><p>Our developers build fully customized websites using technologies such as HTML, CSS, JavaScript, PHP, and modern frameworks for businesses that require advanced functionality.</p></article>
      <article class="card svc-card reveal"><span class="card__num">SHOP</span><div class="card__icon"><span class="icon i-brand-shopify"></span></div><h3>Shopify Ecommerce Development</h3><p>Our team includes experienced ecommerce specialists who build high-converting online stores. Businesses looking for Shopify development companies rely on our expertise for scalable ecommerce platforms.</p></article>
      <article class="card svc-card reveal"><span class="card__num">PAY</span><div class="card__icon"><span class="icon i-shopping-cart"></span></div><h3>Advanced Ecommerce Website Development</h3><p>We build secure online stores with optimized product pages, payment integrations, and seamless checkout systems. Each project is handled by an experienced ecommerce website developer.</p></article>
      <article class="card svc-card reveal"><span class="card__num">UX</span><div class="card__icon"><span class="icon i-palette"></span></div><h3>Website Redesign &amp; Performance Optimization</h3><p>Many businesses approach us for website redesign services when their existing websites need performance improvement, better design, or improved conversion rates.</p></article>
      <article class="card svc-card reveal"><span class="card__num">RWD</span><div class="card__icon"><span class="icon i-smartphone"></span></div><h3>Cross-Device Performance</h3><p>Our website development services ensure your website performs well across devices, browsers, and search engines — built mobile-first, fully responsive, and accessibility-aware.</p></article>
    </div>
    <div class="btn-row" style="margin-top:2rem"><a class="btn btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Explore Development Solutions <span class="icon i-arrow-right" aria-hidden="true"></span></a><a class="btn btn--ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Get Website Proposal</a></div>
  </div>
</section>

<!-- SECTION: DEVICE PREVIEW -->
<section class="section section--wash">
  <div class="container">
    <div class="section-head center reveal"><span class="eyebrow" style="justify-content:center;display:flex">Responsive by Default</span><h2 class="h2">Built for <span class="grad-text">Every Device.</span></h2></div>
    <div class="devices reveal" style="margin-top:2.5rem">
      <div><div class="device device--desktop"><img src="<?php echo cs_uri(); ?>/assets/img/u-1522071820081-900.jpg" alt="Website on desktop" loading="lazy" width="900" height="560"></div><p class="device__cap">Desktop</p></div>
      <div><div class="device device--tablet"><img src="<?php echo cs_uri(); ?>/assets/img/u-1551434678-800.jpg" alt="Website on tablet" loading="lazy" width="800" height="600"></div><p class="device__cap">Tablet</p></div>
      <div><div class="device device--phone"><img src="<?php echo cs_uri(); ?>/assets/img/u-1542744173-500.jpg" alt="Website on phone" loading="lazy" width="500" height="700"></div><p class="device__cap">Phone</p></div>
    </div>
    <p class="center muted" style="margin-top:1.5rem">High-performance websites built with WordPress, Shopify, and modern frameworks — 100% responsive across every screen.</p>
  </div>
</section>

<!-- SECTION: TEAM -->
<section class="section">
  <div class="container split split--reverse">
    <div class="split__visual reveal"><img src="<?php echo cs_uri(); ?>/assets/img/u-1551288049-900.jpg" alt="Development team at work" loading="lazy" width="900" height="600" style="border-radius:var(--r);border:1px solid var(--border)"></div>
    <div class="split__copy reveal">
      <span class="eyebrow">Our Team</span>
      <h2 class="h2">100+ Developers Delivering <span class="grad-text">Scalable Digital Platforms.</span></h2>
      <p class="lead" style="margin-top:1rem">Engineering teams that move fast without breaking things.</p>
      <p class="muted" style="margin-top:1rem">Cirova Studio operates with a team of 100+ developers, UI designers, engineers, and project managers who collaborate to deliver professional websites. Each project follows a structured development workflow including planning, wireframing, design, coding, testing, and optimization.</p>
      <p class="muted" style="margin-top:1rem">With our development infrastructure and experienced team, we provide website development services that support both startups launching new websites and enterprises expanding their digital presence.</p>
    </div>
  </div>
</section>

<!-- SECTION: PROCESS -->
<section class="section section--wash">
  <div class="container">
    <div class="section-head reveal"><span class="eyebrow">Our Process</span><h2 class="h2">From Idea to <span class="grad-text">Live Site.</span></h2><p class="lead" style="margin-top:1rem">Every project follows a structured workflow built for clarity, speed, and quality.</p></div>
    <div class="steps steps--3" style="margin-top:2.5rem">
      <div class="step reveal"><div class="step__n">01</div><h3>Plan</h3><p>Goals, audience, sitemap, and scope.</p></div>
      <div class="step reveal"><div class="step__n">02</div><h3>Wireframe</h3><p>Information architecture and user flow.</p></div>
      <div class="step reveal"><div class="step__n">03</div><h3>Design</h3><p>Visual system and high-fidelity mockups.</p></div>
      <div class="step reveal"><div class="step__n">04</div><h3>Code</h3><p>Build with chosen stack and best practices.</p></div>
      <div class="step reveal"><div class="step__n">05</div><h3>Test</h3><p>QA across devices, browsers, performance.</p></div>
      <div class="step reveal"><div class="step__n">06</div><h3>Launch</h3><p>Deploy, monitor, optimize, iterate.</p></div>
    </div>
  </div>
</section>

<!-- SECTION: WHY -->
<section class="section">
  <div class="container">
    <div class="section-head reveal"><span class="eyebrow">Why Cirova</span><h2 class="h2">Why Businesses <span class="grad-text">Choose Cirova Studio.</span></h2><p class="lead" style="margin-top:1rem">Companies choose our website development services because we combine technical expertise, structured development processes, and scalable production to deliver reliable websites that support business growth.</p></div>
    <div class="grid grid--3" style="margin-top:2.5rem">
      <div class="feature reveal"><div class="feature__icon"><span class="icon i-users"></span></div><div><h3>Experienced team of 100+ developers</h3><p>Engineers, designers, and technical specialists who work across multiple technologies to build websites tailored to specific business goals.</p></div></div>
      <div class="feature reveal"><div class="feature__icon"><span class="icon i-layers"></span></div><div><h3>Platform expertise across technologies</h3><p>WordPress, Shopify, PHP frameworks, and custom coding environments — businesses pick the platform best suited to their requirements.</p></div></div>
      <div class="feature reveal"><div class="feature__icon"><span class="icon i-search"></span></div><div><h3>SEO-friendly website architecture</h3><p>Optimized code, fast loading speed, and search-friendly architecture to support long-term search engine visibility.</p></div></div>
      <div class="feature reveal"><div class="feature__icon"><span class="icon i-target"></span></div><div><h3>Conversion-focused design &amp; UX</h3><p>Design strategy combined with development expertise to create websites that guide users through clear navigation and encourage meaningful actions.</p></div></div>
      <div class="feature reveal"><div class="feature__icon"><span class="icon i-lock"></span></div><div><h3>Secure &amp; scalable infrastructure</h3><p>Every website follows security best practices, optimized hosting configurations, and scalable frameworks to ensure long-term reliability.</p></div></div>
      <div class="feature reveal"><div class="feature__icon"><span class="icon i-workflow"></span></div><div><h3>Ongoing support &amp; flexibility</h3><p>We support businesses after launch with maintenance, upgrades, and additional development as digital platforms evolve.</p></div></div>
    </div>
  </div>
</section>

<!-- SECTION: CTA -->
<section class="section section--wash" id="contact">
  <div class="container"><div class="cta reveal"><div class="cta__inner">
    <span class="eyebrow" style="justify-content:center;display:flex">Work With Our Development Team</span>
    <h2 class="h2">Build Your Website With Our <span class="grad-text">Development Experts.</span></h2>
    <p class="lead" style="margin:1rem auto 0">If you are looking for professional website development services, Cirova Studio offers experienced developers, scalable technology solutions, and structured development processes to build websites that support long-term growth.</p>
    <div class="btn-row"><a class="btn btn--primary" href="<?php echo esc_url(home_url('/contact/')); ?>">Request Website Development Quote <span class="icon i-arrow-right" aria-hidden="true"></span></a><a class="btn btn--ghost" href="<?php echo esc_url(home_url('/contact/')); ?>">Start Your Project Today</a></div>
  </div></div></div>
</section>

<!-- SECTION: FAQ -->
<section class="section" id="faq">
  <div class="container">
    <div class="section-head center reveal"><span class="eyebrow" style="justify-content:center;display:flex">Common Questions</span><h2 class="h2">Frequently Asked <span class="grad-text">Questions.</span></h2></div>
    <div class="faq" style="margin-top:2.5rem">
      <div class="faq__item"><button class="faq__q" aria-expanded="false">What do website development services include? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Professional website development services include website design, coding, platform development, ecommerce setup, performance optimization, mobile responsiveness, security configuration, and technical support to ensure websites function smoothly and efficiently.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">Which platforms does Cirova Studio use for website development? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Our developers build websites using WordPress, Shopify, custom PHP development, HTML, CSS, JavaScript, and modern frameworks to ensure flexibility, scalability, and performance.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">Do you build ecommerce websites? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Yes. Our team includes experienced ecommerce developers who build online stores using platforms like Shopify and custom ecommerce frameworks with secure payment integrations and optimized product pages.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">Can you redesign existing websites? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Yes. We provide professional website redesign services to improve website design, loading speed, user experience, and conversion performance while maintaining brand consistency.</p></div></div>
      <div class="faq__item"><button class="faq__q" aria-expanded="false">How large is your development team? <span class="icon i-plus" aria-hidden="true"></span></button><div class="faq__a"><p>Cirova Studio works with a team of more than 100 developers, designers, and technical specialists who collaborate on every project, ensuring expertise across the entire development lifecycle.</p></div></div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
