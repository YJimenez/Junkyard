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

function call_cbox(id){
	player=document.getElementById("playerid"+id).value;
	embed=document.getElementById("embed_code"+id).value;
	//alert(player+"-"+embed);
    $.colorbox({width:"640px", height:"400px", iframe:true, href:"embedCode.php?player="+player+"&embed_code="+embed+"&height=420&width=260"});
}