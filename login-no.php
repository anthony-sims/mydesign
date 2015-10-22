            <form name="loginform" id="loginform" action="<?php echo get_site_url(); ?>/wp-login.php" method="post">
              <li class="has-form">
                <div class="row collapse">
                  <div class="large-10 columns">
                    <div class="row">
                      <div class="large-6 columns">
                        <input type="text" name="log" id="log" value="" size="" tabindex="1" placeholder="Username"/>
                      </div>
                      <div class="large-6 columns">
                        <input type="password" name="pwd" id="pwd" value="" tabindex="2" placeholder="Password"/>
                      </div>
                    </div>
                  </div>
                  <div class="large-2 columns">
                    <input class="button tiny" type="submit" name="submit" id="submit" value="Login &raquo;" tabindex="3" />
                    <input type="hidden" name="redirect_to" value="wp-admin/" />
                  </div>
                </div>
              </li>
            </form>