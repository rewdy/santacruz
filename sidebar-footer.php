<?php /*

Santa Cruz Theme
----------------

sidebar-footer.php

Sidebar footer template file
*/?>

						<?php if (is_active_sidebar('footer-widgets')) : ?>
							<div id="footer-widgets" class="liner">
								<div class="row">
									<?php dynamic_sidebar('footer-widgets'); ?>
								</div>
							</div>
						<?php endif; ?>
