<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section>
		<div class="feature-photo">
			<figure><img src="images/resources/timeline-1.jpg" alt=""></figure>
			<div class="add-btn">
				<span>1205 member</span>

			</div>

			<form class="edit-phto">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Edit Cover Photo
				<input type="file"/>
				</label>
			</form>


			<div class="container-fluid">
				<div class="row merged">

					<div class="col-lg-12 col-sm-12">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
									<h5>Janice Griffith</h5>
									<span>Group Admin</span>
								</li>
								<li>
									<a <?php if($active=="group"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="" title="" data-ripple="">Group</a>
									<a <?php if($active=="members"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('course.members')); ?>" title="" data-ripple="">Group Members</a>
									<a <?php if($active=="assignment"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('course.assignment')); ?>" title="" data-ripple="">Assignment</a>
									<a <?php if($active=="references"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('course.references')); ?>" title="" data-ripple="">References</a>
									<a <?php if($active=="allReferences"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('course.allReferences')); ?>" title="" data-ripple=""> allReferences </a>
									<a <?php if($active=="studentAssignment"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(route('course.studentAssignment')); ?>" title="" data-ripple="">student Assignment </a>

									<a <?php if($active==""): ?><?php echo e('class=active'); ?> <?php endif; ?> href="timeline-groups.html" title="" data-ripple="">Groups</a>
									<a <?php if($active==""): ?><?php echo e('class=active'); ?> <?php endif; ?> href="about.html" title="" data-ripple="">about</a>
									<a <?php if($active==""): ?><?php echo e('class=active'); ?> <?php endif; ?> href="#" title="" data-ripple="">more</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>


		</div>
	</section><!-- top area -->




<?php echo $__env->yieldContent('content'); ?>



<?php echo $__env->make('social.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>