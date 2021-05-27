<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template_item/head_css') ?> 
	
	<body>
		<div class="main-wrapper">
			<!-- sidebar partial -->
            <?php $this->load->view('template_item/sidebar_menu') ?> 

			<div class="page-wrapper">
				<!-- navbar partial -->
            <?php $this->load->view('template_item/header_menu') ?> 

				<div class="page-content">
                    <?php echo $contents; ?>
                </div>

				<!-- partial:../../partials/_footer.html -->
				<!-- <footer
					class="footer d-flex flex-column flex-md-row align-items-center justify-content-between"
				>
					<p class="text-muted text-center text-md-left">
						Copyright © 2020
						<a href="https://www.nobleui.com" target="_blank">NobleUI</a>. All
						rights reserved
					</p>
					<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">
						Handcrafted With
						<i
							class="mb-1 text-primary ml-1 icon-small"
							data-feather="heart"
						></i>
					</p>
				</footer> -->
				<!-- partial -->
			</div>
		</div>
            <?php $this->load->view('template_item/foot_javascript') ?> 

	</body>
</html>
