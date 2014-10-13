
    var http_request = false;

    function makeRequest(url) {

        http_request = false;

        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType) {
                http_request.overrideMimeType('text/xml');
                // Ver nota sobre esta linea al final
            }
        } else if (window.ActiveXObject) { // IE
            try {
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }

        if (!http_request) {
            alert('Falla :( No es posible crear una instancia XMLHTTP');
            return false;
        }
        http_request.onreadystatechange = alertContents;
        http_request.open('GET', url, true);
        http_request.send(null);

    }

    function alertContents() {
	var varRes = document.getElementById('registroslist');
	
        if (http_request.readyState == 4) {
            if (http_request.status == 200) {
                varRes.innerHTML = http_request.responseText;
            } else {
                alert(http_request.status);
                alert('Hubo problemas con la petición.');
            }
        }

    }
    

function findPosX(varobj){
  var obj = document.getElementById(varobj);
    var curleft = 0;
    if(obj.offsetParent)
        while(1) 
        {
          curleft += obj.offsetLeft;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.x)
        curleft += obj.x;
		
	return curleft;
	
  }

  function findPosY(varobj){
  var obj = document.getElementById(varobj);
    var curtop = 0;
    if(obj.offsetParent)
        while(1)
        {
          curtop += obj.offsetTop;
          if(!obj.offsetParent)
            break;
          obj = obj.offsetParent;
        }
    else if(obj.y)
        curtop += obj.y;
    return curtop;
  }

function formatoDosDecimales(valor){
	if (valor.indexOf(".")<0) valor = valor+'.00';
	
	
	var tblF = valor.split('.');
	
	
	tblF[1] = tblF[1]+'00';
	var valRes = tblF[0]+'.'+tblF[1].substring(0,2);
	
	return valRes;
}

function EsCIFNIF(val) {
    val = val.toUpperCase()
    if (val.charAt(0) == 'X' || EsDigito(val.charAt(0)) )
        return EsNIF(val)
    else
        return EsCIF(val);
}

function EsNIF(val) {
    val = val.toUpperCase()
    var LetrasNIF = "TRWAGMYFPDXBNJZSQVHLCKE"
    
    if (!MinCaracteres(val,8)) return false;
    Letra = val.charAt(val.length-1);
    if (LetrasNIF.indexOf(Letra) == -1) return false;
    if (val.charAt(0) == 'X')
       Numero = val.substring(1,val.length-1)
    else
       Numero = val.substring(0,val.length-1);
    if (!EsDigitos(Numero)) return false;
    Numero = parseInt(Numero,10)
    Indice = Numero-(parseInt(Numero/23,10)*23);
    if (Letra != LetrasNIF.charAt(Indice)) return false;
    return true;
}

function EsCIF(val) {
    val = val.toUpperCase();
    var LetrasCIF = "ABCDEFGHNPSQ";
    var LetrasOrganismos = "JABCDEFGHI";
    var Organismo = false;
    
    if (!MinCaracteres(val,9)) return false;
    var Letra = val.charAt(0);
    if (LetrasCIF.indexOf(Letra) == -1) return false;
    if (Letra == 'P' || Letra == 'Q' || Letra == 'S') Organismo = true;
    if (!EsDigitos(val.substr(1,val.length-2))) return false;
    var CodigoControl = val.charAt(val.length-1)

    Suma1 = parseInt( val.charAt(2), 10) + parseInt( val.charAt(4), 10) + parseInt(val.charAt(6), 10 );
    Suma2 = 0;
    for( var i = 1; i < 8; i += 2) {
         Aux = parseInt(val.charAt(i), 10) * 2;
         if (Aux > 9) 
            Suma2 = Suma2 + parseInt(Aux / 10, 10) + Aux % 10
         else
            Suma2 = Suma2 + Aux;
    }
    Suma = Suma1 + Suma2;
    Codigo = 10 - Suma % 10;
    if( Codigo > 9) Codigo = 0;
    
    if (!Organismo) {
       if (Codigo != parseInt(CodigoControl, 10)) return false; }
    else {
       if (LetrasOrganismos.charAt(Codigo) != CodigoControl ) return false; }
    
    return true;
}

function mostrarCapa(varid){
	var idcapa = document.getElementById(varid);
	
	idcapa.style.visibility='visible';
}

function mostrarCapaAdv(varid,varVal,varPos){
	var obj = document.getElementById(varid);
	
	obj.style.visibility=varVal;
	obj.style.position=varPos;
}

function mostrarCapaAdvxx(obj,varVal,varPos){
	obj.style.visibility=varVal;
	obj.style.position=varPos;
}

function ocultaMenuH(){
	var idcapa1 = document.getElementById('menuh1');
	var idcapa2 = document.getElementById('menuh2');
	var idcapa3 = document.getElementById('menuh3');
	var idcapa4 = document.getElementById('menuh4');
	
	idcapa1.style.visibility='hidden';
	idcapa1.style.position='absolute';
	idcapa2.style.visibility='hidden';
	idcapa2.style.position='absolute';
	idcapa3.style.visibility='hidden';
	idcapa3.style.position='absolute';
	idcapa4.style.visibility='hidden';
	idcapa4.style.position='absolute';
}

function mostrarCapaAdv2(varid,varVal,varPos,px,py){
	var idcapa = document.getElementById(varid);
	
	idcapa.style.left=px;
	idcapa.style.top=py;	
	idcapa.style.visibility=varVal;
	idcapa.style.position=varPos;
}

function openWindow(url,name,w,h,sc){
	var ancho_interface=10;
	var alto_interface=29;
	var tamx=screen.width;
	var tamy=screen.height;
	var posx=(tamx-(parseInt(w)+ancho_interface))/2;
	var posy=(tamy -(parseInt(h)+alto_interface))/2;
		
	var parameters = 'width='+w+',height='+h+',top='+posy+',left='+posx+',scrollbars='+sc;
	window.open(url,name,parameters);
}

function EsDigito(val) {
    return ((val >= "0") && (val <= "9"));
}

function EsDigitos(val) {
    for(i=0;i<val.length;i++){
        if(!EsDigito(val.charAt(i))) return false;
    }
    return true;
}    
    
function EsRango(val,min,max) {
    if (!EsNumerico(val)) return false;
    if (val<min || max<val) return false;
    return true;
}

function MinCaracteres(val,num) {
    return !(val.length<num);
}

function EsTelefono(val) {
    if (!MinCaracteres(val,9)) return false;
    if (!EsDigitos(val)) return false;
    if (val.charAt(0)!="9") return false;
    return true;
}

function EsMovil(val) {
    if (!MinCaracteres(val,9)) return false;
    if (!EsDigitos(val)) return false;
    if (val.charAt(0)!="6") return false;
    return true;
}

function EsVacio(val) {
    return ((val == null) || (val.length == 0));
}

function EsNumerico(val) {
    num = parseFloat(val);
    if (val!=''+num) return false;
    return true;
}

function EsFecha(val) {
    var dia = parseInt(val.substr(0,2),10);
    var mes = parseInt(val.substr(3,2),10);
    var anyo = parseInt(val.substr(6,4),10);
  
    if(val.length!=10) return false;
    d = new Date(val)
    if (isNaN( d.valueOf() )) return false;
    sArray = val.split("/")
    if (sArray.length > 3) return false;
    if( (sArray[0].length!=2) || (sArray[1].length!=2) || (sArray[2].length!=4) ) return false;
    if( (anyo<0) || (anyo>9999) ) return false;
    if((mes>12) || (mes<1)) return false;
    if((mes==4)||(mes==6)||(mes==9)||(mes==11)) {
        if((dia>30) || (dia<1)) return false;
    }
    if((mes==1)||(mes==3)||(mes==5)||(mes==7)||(mes==8)||(mes==10)||(mes==12)) {
            if((dia>31) || (dia<1)) return false;
    }
    if((mes==2) && (!EsBisiesto(anyo))) {
            if((dia>28) || (dia<1)) return false;
    } else if((mes==2) && (EsBisiesto(anyo))) {
            if((dia>29) || (dia<1)) return false;
    }
    return true;
}

function EsBisiesto(val) {
    return ((val % 4 == 0) && ((!(val % 100 == 0)) || (val % 400 == 0)));
}

function EsEmail(val) {
    arroba = val.lastIndexOf('@');

    if ( arroba < 1 )
        return false;
    else {
    punto = val.indexOf('.', arroba);
      if ( punto < arroba + 2 ||
         punto > val.length - 2 ) {
         return false;
      }
   }
   return true;
}

function ValidarTexto(texto){
    
    if ( texto.indexOf('@',0) != -1 || texto.indexOf(';',0) != -1
     || texto.indexOf(' ',0) != -1 || texto.indexOf('/',0) != -1
     || texto.indexOf(';',0) != -1 || texto.indexOf('<',0) != -1
     || texto.indexOf('>',0) != -1 || texto.indexOf('*',0) != -1
     || texto.indexOf('|',0) != -1 || texto.indexOf('`',0) != -1
     || texto.indexOf('&',0) != -1 || texto.indexOf('$',0) != -1
     || texto.indexOf('!',0) != -1 || texto.indexOf('"',0) != -1
     || texto.indexOf(':',0) != -1 || texto.indexOf("'",0) != -1
     || texto.indexOf(',',0) != -1)
       { return false; }
    
    return true;
}
 
function openCalendar(varX,varY,varCampo,varFecha,nForm){
	args = openCalendar.arguments;
	window.open('calendario/calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nForm='+nForm+'&nolimit='+args[5],'calendar','left='+varX+',top='+varY+',height=140,width=145');
}

function openCalendarfc(varX,varY,varCampo,varFecha,nForm,nolimit,fc){
	window.open('calendario/calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nForm='+nForm+'&nolimit='+nolimit+'&fc='+fc,'calendar','left='+varX+',top='+varY+',height=140,width=145');
}

function openCalendar2(varX,varY,varCampo,varFecha){
	args = openCalendar2.arguments;
	
	window.open('calendario2/calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nolimit='+args[4],'calendar','left='+varX+',top='+varY+',height=140,width=145');
}

function openCalendarSMS(varX,varY,varCampo,varFecha){
	window.open('calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nolimit=','calendar','left='+varX+',top='+varY+',height=140,width=145');
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe contener una dirección de e-mail.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' debe ser un número.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' debe ser un número entre '+min+' y '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es obligatorio.\n'; }
  } if (errors) alert('se han producido los siguientes errores:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

function sobre(src,Color) {
	  src.style.backgroundColor = Color;
}

function fuera(src,Color) {
	  src.style.backgroundColor = Color;
	
}

function sobreADV2(src,Color,Cursor) {	  
	  src.style.cursor = Cursor;
	  src.style.backgroundColor = Color;
}

function fueraADV2(src,Color,Cursor) {
	src.style.cursor = Cursor;
	src.style.backgroundColor = Color;
}

function EsIP(val) {
  	var tblIPSNulas = new Array('127.0.0.1','255.255.255.0','255.255.255.255','0.0.0.0');
	if(EsVacio(val)) return false;
	
	sArray = val.split(".");
	if (sArray.length != 4) return false;
	if( (!EsNumerico(sArray[0])) || (!EsNumerico(sArray[1])) 
	|| (!EsNumerico(sArray[2])) || (!EsNumerico(sArray[3])) ) return false;
	if( (parseFloat(sArray[0])>255) || (parseFloat(sArray[1])>255) 
	|| (parseFloat(sArray[2])>255) || (parseFloat(sArray[3])>255) ) return false;
	if( (parseFloat(sArray[0])<0) || (parseFloat(sArray[1])<0) 
	|| (parseFloat(sArray[2])<0) || (parseFloat(sArray[3])<0) ) return false;
	
	for (var i=0;i<tblIPSNulas.length;i++){
		if (val==tblIPSNulas[i]){return false;}
	}
	
	return true;
}

function EsDominio(val) {
	if(EsVacio(val)) return false;
	
	sArray = val.split(".");
	if (sArray.length != 2) return false;
	if (!ValidarTexto(sArray[0])) return false;
	if (!ValidarTexto(sArray[1])) return false;
	if ( (sArray[0].length<=0) || (sArray[1].length<=1) ) return false;
		
	return true;
}

function selecionaTodosLista(objLista){
	for (i=0;i<=(objLista.length-1);i++){
		objLista.options[i].selected = true;
	}
}

function cambiaImagen(img, src){	
	img.src = src;
}

function cambiaImagenADV(img, src){	
	var imgo = document.getElementById(img);
	imgo.src = src;
}

function high(which2){
theobject=which2
highlighting=setInterval("highlightit(theobject)",50)
}
function low(which2){
clearInterval(highlighting)
if (which2.style.MozOpacity)
which2.style.MozOpacity=0.3
else if (which2.filters)
which2.filters.alpha.opacity=30
}

function highlightit(cur2){
if (cur2.style.MozOpacity<1)
cur2.style.MozOpacity=parseFloat(cur2.style.MozOpacity)+0.1
else if (cur2.filters&&cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=10
else if (window.highlighting)
clearInterval(highlighting)
}

function confirmarVaciar(){
	if (confirm('Se dispone a vaciar la cesta de compra.\n\n¿Desea continuar?')){
		document.location='cestavacia.asp';
	}
}

function ChequeoLetras(chequeo)
{
  var digitos = "0123456789";
  for (i = 0;  i < chequeo.length;  i++)
  {
    ch = chequeo.charAt(i);
    for (j = 0;  j < digitos.length;  j++)
      if (ch == digitos.charAt(j))
        break;
    if (j == digitos.length)
    { return (true); }
   }
  return (false);
}
function valora(valor)
{this.valor=valor}

function Calcula(valor){

var val = new valora(11);

val[1] = new valora(1);
val[2] = new valora(2);
val[3] = new valora(4);
val[4] = new valora(8);
val[5] = new valora(5);
val[6] = new valora(10);
val[7] = new valora(9);
val[8] = new valora(7);
val[9] = new valora(3);
val[10] = new valora(6);
var Total=0;
  for (i = 0;  i < valor.length;  i++)
  {
    Total += valor.charAt(i)*val[i+1].valor;
   }
	Total = 11-(Total % 11)
	if (Total==10) {Total=1}
	if (Total==11) {Total=0}
  return Total;
}


function CalcularCC(CB,CS,CC,CD)
{
if ((CB.value=='0000')&&(CS.value='0000')&&(CC.value='0000000000')&&(CD.value='00')){
	alert("La cuenta introducida no es valida.");
	return false;
	}

  if (CB.value.length != 4)
  {
    alert("Escriba el valor para el campo \"C.Banco\" con cuatro digitos.");
    CB.focus();
    return (false);
  }
  if (CS.value.length != 4)
  {
    alert("Escriba el valor para el campo \"C.Sucursal\" con cuatro digitos.");
    CS.focus();
    return (false);
  }
  if (CD.value.length != 2)
  {
    alert("Escriba el valor para el campo \"C.Control\" con dos digitos.");
    CD.focus();
    return (false);
  }
  if (CC.value.length != 10)
  {
    alert("Escriba el valor para el campo \"C.Corriente\" con diez digitos.");
    CC.focus();
    return (false);
  }

  if (ChequeoLetras(CB.value))
  {
    alert("Escriba solo numeros (0-9) el campo \"C.Banco\" .");
    CB.focus();
    return (false);
  }
  if (ChequeoLetras(CS.value))
  {
    alert("Escriba solo numeros (0-9) el campo \"C.Sucursal\" .");
    CS.focus();
    return (false);
  }
  if (ChequeoLetras(CD.value))
  {
    alert("Escriba solo numeros (0-9) el campo \"C.Control\" .");
    CD.focus();
    return (false);
  }
  if (ChequeoLetras(CC.value))
  {
    alert("Escriba solo numeros (0-9) el campo \"C.Corriente\" .");
    CC.focus();
    return (false);
  }
  
  redun =Calcula("00"+CB.value+CS.value);
  redun =""+Calcula("00"+CB.value+CS.value)+Calcula(CC.value);
	if (redun!=CD.value)
		{
		alert("La cuenta introducida no es valida.");
		return false;
		}
	else
		{
		return true;
		}
  return false;
}

//*****************SHOMENU***************************

var linkset=new Array()
//SPECIFY MENU SETS AND THEIR LINKS. FOLLOW SYNTAX LAID OUT

linkset[0]='<div class="menuitems"><a href="categorias.asp?id=44" class="txtblancogr"><font color="ffffff"><b>·</b>&nbsp;Bombones</a>&nbsp;</font></div>'
linkset[0]+='<div class="menuitems"><a href="categorias.asp?id=2" class="txtblancogr"><font color="ffffff"><b>·</b>&nbsp;Peluches</a>&nbsp;</font></div>'
//linkset[0]+='<div class="menuitems"><a href="categorias.asp?id=43" class="txtblancogr"><font color="ffffff"><b>·</b>&nbsp;iPods</a>&nbsp;</font></div>'
linkset[0]+='<div class="menuitems"><a href="categorias.asp?id=45" class="txtblancogr"><font color="ffffff"><b>·</b>&nbsp;Libros</a>&nbsp;</font></div>'

////No need to edit beyond here

var ie4=document.all&&navigator.userAgent.indexOf("Opera")==-1
var ns6=document.getElementById&&!document.all
var ns4=document.layers

function showmenu(e,which){

if (!document.all&&!document.getElementById&&!document.layers)
return

clearhidemenu()

menuobj=ie4? document.all.popmenu : ns6? document.getElementById("popmenu") : ns4? document.popmenu : ""
menuobj.thestyle=(ie4||ns6)? menuobj.style : menuobj

if (ie4||ns6)
menuobj.innerHTML=which
else{
menuobj.document.write('<layer name=gui bgColor=#E6E6E6 width=165 onmouseover="clearhidemenu()" onmouseout="hidemenu()">'+which+'</layer>')
menuobj.document.close()
}

menuobj.contentwidth=(ie4||ns6)? menuobj.offsetWidth : menuobj.document.gui.document.width
menuobj.contentheight=(ie4||ns6)? menuobj.offsetHeight : menuobj.document.gui.document.height
eventX=ie4? event.clientX : ns6? e.clientX : e.x
eventY=ie4? event.clientY : ns6? e.clientY : e.y

//Find out how close the mouse is to the corner of the window
var rightedge=ie4? document.body.clientWidth-eventX : window.innerWidth-eventX
var bottomedge=ie4? document.body.clientHeight-eventY : window.innerHeight-eventY

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<menuobj.contentwidth)
//move the horizontal position of the menu to the left by it's width
menuobj.thestyle.left=ie4? document.body.scrollLeft+eventX-menuobj.contentwidth : ns6? window.pageXOffset+eventX-menuobj.contentwidth : eventX-menuobj.contentwidth
else
//position the horizontal position of the menu where the mouse was clicked
menuobj.thestyle.left=ie4? document.body.scrollLeft+eventX : ns6? window.pageXOffset+eventX : eventX

//same concept with the vertical position
if (bottomedge<menuobj.contentheight)
menuobj.thestyle.top=ie4? document.body.scrollTop+eventY-menuobj.contentheight : ns6? window.pageYOffset+eventY-menuobj.contentheight : eventY-menuobj.contentheight
else
menuobj.thestyle.top=ie4? document.body.scrollTop+event.clientY : ns6? window.pageYOffset+eventY : eventY
menuobj.thestyle.visibility="visible"
return false
}

function contains_ns6(a, b) {
//Determines if 1 element in contained in another- by Brainjar.com
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function hidemenu(){
if (window.menuobj)
menuobj.thestyle.visibility=(ie4||ns6)? "hidden" : "hide"
}

function dynamichide(e){
if (ie4&&!menuobj.contains(e.toElement))
hidemenu()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
hidemenu()
}

function delayhidemenu(){
if (ie4||ns6||ns4)
delayhide=setTimeout("hidemenu()",500)
}

function clearhidemenu(){
if (window.delayhide)
clearTimeout(delayhide)
}

function highlightmenu(e,state){
if (document.all)
source_el=event.srcElement
else if (document.getElementById)
source_el=e.target
if (source_el.className=="menuitems"){
source_el.id=(state=="on")? "mouseoverstyle" : ""
}
else{
while(source_el.id!="popmenu"){
source_el=document.getElementById? source_el.parentNode : source_el.parentElement
if (source_el.className=="menuitems"){
source_el.id=(state=="on")? "mouseoverstyle" : ""
}
}
}
}

if (ie4||ns6)
document.onclick=hidemenu

var ie=document.all
var ns6=document.getElementById&&!document.all

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat" && !window.opera)? document.documentElement : document.body
}

function enlarge(which, e, position, imgwidth, imgheight){
if (ie||ns6){
crossobj=document.getElementById? document.getElementById("showimage") : document.all.showimage
if (position=="center"){
pgyoffset=ns6? parseInt(pageYOffset) : parseInt(ietruebody().scrollTop)
horzpos=ns6? pageXOffset+window.innerWidth/2-imgwidth/2 : ietruebody().scrollLeft+ietruebody().clientWidth/2-imgwidth/2
vertpos=ns6? pgyoffset+window.innerHeight/2-imgheight/2 : pgyoffset+ietruebody().clientHeight/2-imgheight/2
if (window.opera && window.innerHeight) //compensate for Opera toolbar
vertpos=pgyoffset+window.innerHeight/2-imgheight/2
vertpos=Math.max(pgyoffset, vertpos)
}
else{
var horzpos=ns6? pageXOffset+e.clientX : ietruebody().scrollLeft+event.clientX
var vertpos=ns6? pageYOffset+e.clientY : ietruebody().scrollTop+event.clientY
}
crossobj.style.left=horzpos+"px"
crossobj.style.top=vertpos+"px"

crossobj.innerHTML='<div align="right" id="dragbar" onMouseOver=sobre(this,"007B0D") onMouseOut=fuera(this,"")><span id="closetext" class="menu" onClick="closepreview()"><img src="pics/close_d.gif" width="11" height="11" align="absmiddle" alt="CERRAR" hspace="2"></span> </div><img src="'+which+'" vspace="2" hspace="2">'
crossobj.style.visibility="visible"
return false
}
else //if NOT IE 4+ or NS 6+, simply display image in full browser window
return true
}

function closepreview(){
crossobj.style.visibility="hidden"
}

function drag_drop(e){
if (ie&&dragapproved){
crossobj.style.left=tempx+event.clientX-offsetx+"px"
crossobj.style.top=tempy+event.clientY-offsety+"px"
}
else if (ns6&&dragapproved){
crossobj.style.left=tempx+e.clientX-offsetx+"px"
crossobj.style.top=tempy+e.clientY-offsety+"px"
}
return false
}

function initializedrag(e){
if (ie&&event.srcElement.id=="dragbar"||ns6&&e.target.id=="dragbar"){
offsetx=ie? event.clientX : e.clientX
offsety=ie? event.clientY : e.clientY

tempx=parseInt(crossobj.style.left)
tempy=parseInt(crossobj.style.top)

dragapproved=true
document.onmousemove=drag_drop
}
}

document.onmousedown=initializedrag
document.onmouseup=new Function("dragapproved=false")

//*****************SHOMENU***************************



function abreventana(varurl){
	window.open(varurl);
}

function confirmarBorrar(){
	if (confirm('¿Está seguro de borrar el registro definitivamente?')){
		return true;
	}
	return false;
}

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);


function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }
}

function YY_checkform() { //v4.02
  var args = YY_checkform.arguments; var myDot=true; var myV=''; var myErr='';var addErr=false;
  var myForm = MM_findObj(args[0]);
  for (var i=1; i<args.length;i=i+4){
    if (args[i+1].charAt(0)=='#'){var myReq=true; args[i+1]=args[i+1].substring(1);}else{myReq=false}
    var myObj = MM_findObj(args[i].replace(/\[\d+\]/ig,""));//eval(myForm+'.'+args[i]);
    myV=myObj.value;
    if (myObj.type=='text'||myObj.type=='password'){
      if (myReq&&myObj.value.length==0){addErr=true}
      if ((myV.length>0)&&(args[i+2]==1)){ //fromto
        if (isNaN(parseInt(myV))||myV<args[i+1].substring(0,args[i+1].indexOf('_'))/1||myV > args[i+1].substring(args[i+1].indexOf('_')+1)/1){addErr=true}
      }
      if ((myV.length>0)&&(args[i+2]==2)&&!myV.match("^[\\w\\.=-]+@[\\w\\.-]+\\.[a-z]{2,4}$")){addErr=true}// email
      if ((myV.length>0)&&(args[i+2]==3)){ // date
        var myD=''; myM=''; myY=''; myYY=0; myDot=true;
        for(var j=0;j<args[i+1].length;j++){
          var myAt = args[i+1].charAt(j);
          if(myAt=='D')myD=myD.concat(myObj.value.charAt(j));
          if(myAt=='M')myM=myM.concat(myObj.value.charAt(j));
          if(myAt=='Y'){myY=myY.concat(myObj.value.charAt(j)); myYY++}
          if(myAt=='-'&&myObj.value.charAt(j)!='-')myDot=false;
          if(myAt=='.'&&myObj.value.charAt(j)!='.')myDot=false;
          if(myAt=='/'&&myObj.value.charAt(j)!='/')myDot=false;
        }
        if(myD/1<1||myD/1>31||myM/1<1||myM/1>12||myY.length!=myYY)myDot=false;
        if(!myDot){addErr=true}
       }
      if ((myV.length>0)&&(args[i+2]==4)){ // time
        myDot=true;
        var myH = myObj.value.substr(0,myObj.value.indexOf(':'))/1;
        var myM = myObj.value.substr(myObj.value.indexOf(':')+1,2)/1;
                var myP = myObj.value.substr(myObj.value.indexOf(':')+3,2);
        if ((args[i+1])=="12:00pm"){if(myH<0||myH>12||myM<0||myM>59||(myP!="pm"&&myP!="am")||myObj.value.length>7)myDot=false;}
        if ((args[i+1])=="12:00"){if(myH<0||myH>12||myM<0||myM>59||myObj.value.length>5)myDot=false;}
        if ((args[i+1])=="24:00"){if(myH<0||myH>23||myM<0||myM>59||myObj.value.length>5)myDot=false;}
        if(!myDot){addErr=true}
      }
      if (myV.length>0&&args[i+2]==5){
            var myObj1 = MM_findObj(args[i+1].replace(/\[\d+\]/ig,""));
            if(!myObj1[args[i+1].replace(/(.*\[)|(\].*)/ig,"")].checked){addErr=true} // check this 2
          }
    }else
    if (!myObj.type&&myObj.length>0&&myObj[0].type=='radio'){
      if (args[i+2]==1&&myObj.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
      if (args[i+2]==2){
        var myDot=false;
        for(var j=0;j<myObj.length;j++){myDot=myDot||myObj[j].checked}
        if(!myDot){myErr+='* ' +args[i+3]+'\n'}
      }
    }else
    if (myObj.type=='checkbox'){
      if(args[i+2]==1&&myObj.checked==false){addErr=true}
      if(args[i+2]==2&&myObj.checked&&MM_findObj(args[i+1]).value.length/1==0){addErr=true}
    }else
    if (myObj.type=='select-one'||myObj.type=='select-multiple'){
      if(args[i+2]==1&&myObj.selectedIndex/1==0){addErr=true}
    }else
    if (myObj.type=='textarea'){
      if(myV.length<args[i+1]){addErr=true}
    }
    if (addErr){myErr+='* '+args[i+3]+'\n'; addErr=false}
  }
  if (myErr!=''){alert('La información requerida está incompleta o contiene errores:\t\t\t\t\t\n\n'+myErr)}
  document.MM_returnValue = (myErr=='');
}

function openCalendar(varX,varY,varCampo,varFecha){
	args = openCalendar.arguments;
	
	window.open('admin/calendario/calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nolimit='+args[4],'calendar','left='+varX+',top='+varY+',height=140,width=145');
}
function openCalendarAdmin(varX,varY,varCampo,varFecha){
	args = openCalendarAdmin.arguments;
	
	window.open('calendario/calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nolimit='+args[4],'calendarAdmin','left='+varX+',top='+varY+',height=140,width=145');
}

function openCalendarSMS(varX,varY,varCampo,varFecha){
	window.open('calendario.asp?Campo='+varCampo+'&Fecha='+varFecha+'&nolimit=','calendar','left='+varX+',top='+varY+',height=140,width=145');
}

function soloNumeros(evt)
      {

          var keyPressed = (evt.which) ? evt.which : event.keyCode
          //alert(keyPressed);
          //return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
          return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
      }



      function soloNumero(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          if (tecla == 44) return true;
          patron = /[A-Za-z]/;
          te = String.fromCharCode(tecla);
          return !patron.test(te);
      }


function CreateBookmarkLink(vurl,vtitle) {
	if (window.sidebar) { // Mozilla Firefox Bookmark
		window.sidebar.addPanel(vtitle, vurl,"");
	} else if( window.external ) { // IE Favorite
		window.external.AddFavorite( vurl, vtitle); }
	else if(window.opera && window.print) { // Opera Hotlist
		return true; }
 }