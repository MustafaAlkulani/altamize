<?php echo $__env->make('social.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<section>

		<div class="feature-photo">

			<figure >
				<img  id="preview_cover_image_group" src="<?php echo e(Storage::url($groupInfo->cover_image)); ?>" style="width: 100% ; height: 400px; object-fit: cover; /*object-fit: cover;*/  ;" alt="">
				<i id="loading_cover_image_group" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>

			</figure>

			<div class="add-btn">
				<span>	<?php echo e(count($groupInfo->userAccounts )); ?> member</span>

			</div>

			<div class="add-btn" style="right: 200px">
				<a href="javascript:changeCoverImage()" style="text-decoration: none;">
					<i class="glyphicon glyphicon-edit"></i> Change
				</a>

			</div>

			<input Imagetype="cover_image_group"  type="file" id="cover_image" style="display: none"/>
			<input type="hidden" id="file_name_cover_image_group"/>




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
									<a <?php if($active=="members"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('groupMembers/'.$Cource_id)); ?>" title="" data-ripple="">Group Members</a>
									<a <?php if($active=="files"): ?><?php echo e('class=active'); ?> <?php endif; ?> href="<?php echo e(surl('myCource/files/'.$Cource_id)); ?>" title="" data-ripple="">Files</a>
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