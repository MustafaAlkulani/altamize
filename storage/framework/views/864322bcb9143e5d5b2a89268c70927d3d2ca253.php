<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section>
		<div class="feature-photo">
			<figure><img src="<?php echo e(Storage::url($groupInfo->cover_image)); ?>"  style="height: 300px ; width: 100%"  alt=""></figure>
			<div class="add-btn">
				<span>	<?php echo e(count($groupInfo->userAccounts )); ?> member</span>

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
									<h5><?php echo e($groupInfo->name); ?></h5>
									<span>Group Admin : <?php echo e($groupInfo->studyCourse->teacher->name); ?></span>
								</li>
								<li>
									<a <?php if($active=="group"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/group/'.$Cource_id)); ?>" title="" data-ripple="">Group</a>
									<a <?php if($active=="members"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/members/'.$Cource_id)); ?>" title="" data-ripple="">Group Members</a>
									<a <?php if($active=="assignment"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/assignment/'.$Cource_id)); ?>" title="" data-ripple="">Assignment</a>
									
									
									<a <?php if($active=="studentAssignment"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/StudentAssignmentAssignment/'.$Cource_id)); ?>" title="" data-ripple="">student Assignment </a>

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