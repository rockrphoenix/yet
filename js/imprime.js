function imprimir(){
	var objetos = document.getElementById('imprime');  //obtenemos el objeto a imprimir
	var ventana = window.open('','_blank');
	ventana.document.write(objetos.innerHTML);
	ventana.document.close();
	ventana.print();
	ventana.close();
}