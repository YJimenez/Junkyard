//javascript:window.location.href =\'?section=adminDelete&id='.$property['idProperty'].'&type=properties\'
function confirmDelete(name, id, type) {
	if (confirm('Are you sure to delete '+name+' ?')) {
		window.location.href ='?section=adminDelete&id='+id+'&type='+type;
	}
}