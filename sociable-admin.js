jQuery(document).ready(function(){
  jQuery("#sociable_site_list").sortable({});
});
/* make checkbox action prettier */
function toggle_checkbox(id) {
	var checkbox = document.getElementById(id);

	checkbox.checked = !checkbox.checked;
	if (checkbox.checked)
		checkbox.parentNode.className = 'active';
	else
		checkbox.parentNode.className = 'inactive';
}