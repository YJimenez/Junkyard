function validateVideo () {
	archive=document.getElementById("archive");
	titlename=document.getElementById("titlename");
	description=document.getElementById("description");
	if(!archive.value){
    	alert('File is required'); 
        archive.focus();
        return false;
	} else if(!titlename.value){
		alert('Title is required'); 
		titlename.focus();
		return false;                                                
	} else if(!description.value){
		alert('Description is required'); 
		description.focus();
		return false;
	}
	document.getElementById("videoForm").submit();
}