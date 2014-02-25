<div class="inputcontainer">
	<p>Page</p>
	<input class="small-input" id="page_<?= $index ?>" type="text" name="bug_page">
	<br>
	<p>Description</p>
	<input class="small-input" id="description_<?= $index ?>" type="text" name="bug_description">
	<br>
	<p>Steps to Reproduce</p>
	<textarea rows="5" class="large-input" id="steps_to_reproduce_<?= $index ?>" name="bud_recreate"></textarea>
	<br>
</div>
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