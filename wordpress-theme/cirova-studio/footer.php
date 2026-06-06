<footer class="footer">
  <div class="container">
    <div class="footer__grid">
      <div class="footer__brand">
        <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( cs_logo_url() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> logo" width="30" height="30"><span><b>Cirova</b> <i>Studio</i></span></a>
        <p><?php echo esc_html( cs_field( 'footer_tagline', 'A growth-focused marketing partner delivering strategy, creative production, and measurable results for modern brands.', true ) ); ?></p>
        <div class="socials">
          <a href="<?php echo esc_url( cs_field( 'social_instagram', '#', true ) ); ?>" aria-label="Instagram"><span class="icon i-brand-instagram"></span></a>
          <a href="<?php echo esc_url( cs_field( 'social_linkedin', '#', true ) ); ?>" aria-label="LinkedIn"><span class="icon i-brand-linkedin"></span></a>
          <a href="<?php echo esc_url( cs_field( 'social_facebook', '#', true ) ); ?>" aria-label="Facebook"><span class="icon i-brand-facebook"></span></a>
        </div>
      </div>
      <div class="footer__col"><h4>Services</h4><ul>
        <li><a href="<?php echo esc_url(home_url('/smm-services/')); ?>">SMM Services</a></li>
        <li><a href="<?php echo esc_url(home_url('/video-editing-services/')); ?>">Video Editing</a></li>
        <li><a href="<?php echo esc_url(home_url('/website-development/')); ?>">Website Development</a></li>
        <li><a href="<?php echo esc_url(home_url('/ppc-services/')); ?>">PPC Services</a></li>
        <li><a href="<?php echo esc_url(home_url('/digital-marketing-services/')); ?>">Digital Marketing</a></li>
      </ul></div>
      <div class="footer__col"><h4>Company</h4><ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
      </ul></div>
      <?php
        $cs_email = cs_field( 'contact_email', 'cirovastudio@gmail.com', true );
        $cs_phone = cs_field( 'contact_phone', '+91 9877147660', true );
        $cs_addr  = cs_field( 'contact_address', 'Gurugram, Haryana · India', true );
        $cs_note  = cs_field( 'contact_note', 'Remote worldwide', true );
      ?>
      <div class="footer__col"><h4>Get in touch</h4><ul>
        <li><a href="mailto:<?php echo esc_attr( $cs_email ); ?>"><?php echo esc_html( $cs_email ); ?></a></li>
        <li><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $cs_phone ) ); ?>"><?php echo esc_html( $cs_phone ); ?></a></li>
        <li><span><?php echo esc_html( $cs_addr ); ?></span></li>
        <li><span><?php echo esc_html( $cs_note ); ?></span></li>
      </ul></div>
    </div>
    <div class="footer__bottom">
      <span>© <span data-year>2026</span> Cirova Studio. All rights reserved.</span>
      <span class="links"><a href="#">Privacy policy</a><a href="#">Terms of service</a></span>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
