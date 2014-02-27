<div class="inputcontainer">
	<!-- Page -->
	<label for="page_<?= $index ?>">Page</label>
	<input class="small-input page-input" id="page_<?= $index ?>" type="text" data-index="<?= $index ?>"<?php if ( ADD_TEST_FORM_DATA ): ?> value="index.php <?= $index ?>"<?php endif ?>>
	<br>

	<!-- Description -->
	<label for="description_<?= $index ?>">Description</label>
	<input class="small-input description-input" id="description_<?= $index ?>" type="text" data-index="<?= $index ?>"<?php if ( ADD_TEST_FORM_DATA ): ?> value="Description <?= $index ?>"<?php endif ?>>
	<br>

	<!-- Steps to Reproduce -->
	<label for="steps_to_reproduce_<?= $index ?>">Steps to Reproduce</label>
	<textarea rows="5" class="large-input steps-to-reproduce-input" id="steps_to_reproduce_<?= $index ?>" data-index="<?= $index ?>"><?php if ( ADD_TEST_FORM_DATA ): ?>Steps to reproduce <?= $index ?>.<?php endif ?></textarea>
	<br>
</div>

<!-- Buttons -->
<div class="buttonContainer">
	<div class="nobugsbuttondiv">
		<a href="#bottom" class="nobugsbutton close" data-index="<?= $index ?>">
			No More Bugs
		</a>
	</div>
	<div class="newbugbuttondiv">
		<a href="javascript:" class="newbugbutton" data-index="<?= $index ?>">
			Add New Bug
		</a>
	</div>
</div>