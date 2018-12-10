function confirmDelete(zona,url) {
	switch(zona){
		case "noticias":
				if (confirm("Estás seguro de borrar esta noticia? Esta acción no puede ser deshecha y las imágenes asociadas a este elemento serán también eliminadas.")) {
	        		window.open(url,"_self");
	    		} else {
	        		return false;
	    		} 
	    		break;
		case "trabajos":
				if (confirm("Estás seguro de borrar este trabajo? Esta acción no puede ser deshecha y las imágenes asociadas a este elemento serán también eliminadas.")) {
	        		window.open(url,"_self");
	    		} else {
	        		return false;
	    		} 
	    		break;
		case "citas":
				if (confirm("Estás seguro de borrar esta cita? Esta acción no puede ser deshecha.")) {
	        		window.open(url,"_self");
	    		} else {
	        		return false;
	    		} 
	    		break;
	}      
}