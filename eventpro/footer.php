
    <!-- footer start  -->
    <footer>
      <div class="container">
        <div class="main-footer">
          <div class="row">
            <div class="col-md-4 help-link">
              <h3><?php _e('HELPFUL LINKS', 'eventpro'); ?></h3>

              <?php
                wp_nav_menu(array (
                  'theme_location'    => 'footer-left',
                  'menu_id'           => 'footer-left',
                  ) );
              ?>

            </div>

            <div class="col-md-4 download-images">
            <h2><?php _e('DOWNLOAD OUR APP!', 'eventpro'); ?></h2>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/App-Store.png" alt="">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play-store.png" alt="">
            </div>

            <div class="col-md-4">
              <form action="">
                <div class="form-mother">
                  <h2>SUBSCRIBE</h2>
                  <div class="email-add">
                    <label for="email">Email Address</label>
                    <br>
                    <input type="email" value name="email" class="email" id="email">
                  </div>
                  <div class="first-name">
                    <label for="name">First Name</label>
                    <br>
                    <input type="text" value name="f-name" class="f-name" id="name">
                  </div>
                  <div class="last-name">
                    <label for="name">Last Name</label>
                    <br>
                    <input type="text" value name="name" class="name" id="name">
                  </div>
                  <button type="submit" class="submit-button">SUBSCRIBE</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </footer> <!-- footer end  -->

    <footer class="footer-2">
      <div class="container">
        <div class="row">
          <div class="col-md-5 first-p">
            <?php
              if(is_active_sidebar('footer-bottom-section')){
                dynamic_sidebar('footer-bottom-section');
              }
            ?>
          </div>
          <div class="col-md-7 second-p">
          <?php
              if(is_active_sidebar('footer-bottom-right')){
                dynamic_sidebar('footer-bottom-right');
              }
            ?>
          </div>
        </div>
      </div>
    </footer> <!-- end footer  -->

    <?php wp_footer(); ?>
    
</body>
</html>