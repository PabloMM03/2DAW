//onload en body
function focus(){
  document.getElementById('nombre').focus();  
}


document.getElementById('formulario').setAttribute('novalidate',true);
document.getElementById('nombre').addEventListener('blur',blur,false);
document.getElementById('nombre').addEventListener('invalid',avisa,false);
document.getElementById('nombre').addEventListener('input',quita,false);


document.getElementById('pass').addEventListener('blur',blur,false);
document.getElementById('pass').addEventListener('invalid',avisa,false);
document.getElementById('pass').addEventListener('input',quita,false);

document.getElementById('email').addEventListener('blur',blur,false);
document.getElementById('email').addEventListener('invalid',avisa,false);
document.getElementById('email').addEventListener('input',quita,false);

document.getElementById('phone').addEventListener('blur',blur,false);
document.getElementById('phone').addEventListener('invalid',avisa,false);
document.getElementById('phone').addEventListener('input',quita,false);
document.getElementById('phone').addEventListener('change',quitaPhone2,false);

document.getElementById('phone2').addEventListener('blur',blur,false);
document.getElementById('phone2').addEventListener('invalid',avisa,false);
document.getElementById('phone2').addEventListener('input',quita,false);

document.getElementById('desc').addEventListener('blur',blur,false);
document.getElementById('desc').addEventListener('invalid',avisa,false);
document.getElementById('desc').addEventListener('input',quitaText,false);

document.getElementById('intereses').addEventListener('blur',blurcheked,true);
document.getElementById('intereses').addEventListener('invalid',avisa,true);
document.getElementById('intereses').addEventListener('input',quitaCheck,true);

document.getElementById('submit').addEventListener('click',final,false);

let losChequed=false;
function blur(e){
  const obj=e.target;
  
  comp(obj);
  
  obj.checkValidity();
  
  
}
function avisa(e){
  const obj=e.target;
  
  document.getElementById('p_'+obj.id).innerHTML=obj.validationMessage;
}
function quita(e){
  const obj=e.target;
  
  comp(obj);
  if(obj.validity.valid){
    document.getElementById('p_'+obj.id).innerHTML='';
  }
  
}
function comp(obj)
{
  let mensaje=('');
  let identificador=obj.id
  if(obj.type=='type[checkbox')
  {
    identificador='intereses';
  }
  switch (identificador) {
    case 'nombre':
      if(obj.value.length===0){mensaje='Este campo no puede estar vacio<br>'};
      if(obj.value.length<8){mensaje=mensaje+'Campo menor de 8 caracteres<br>'};
      if(obj.value.length>15){mensaje=mensaje+'Campo mayor de 15 caracteres<br>'};
      break;
      
      case 'pass':
      if(obj.value.length<8){mensaje='Campo menor de 8 caracteres<br>'};
      let elMatc=obj.value.match(/.{0,}[A-Z].{0,}/g);
      if(elMatc===null){mensaje=mensaje+'Almenos una Mayúcula<br>'};
      elMatc=obj.value.match(/.{0,}[_].{0,}/g);
      if(elMatc===null){mensaje=mensaje+'Almenos un guión bajo<br>'};
      break;

      case 'email':
      let elMatc2=obj.value.match(/.{1,}@gmail\.com$/);
      if(elMatc2===null){mensaje=mensaje+'El email debe de ser de google<br>'};
      break;

      case 'phone':
      let elMatc3=obj.value.match(/^[1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/);
      if(elMatc3===null){mensaje=mensaje+'Debe ser un número válido<br>'};
      break;

      case 'phone2':
      let elMatc4=obj.value.match(/^[1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/);
      if(elMatc4===null){mensaje=mensaje+'Debe ser un número válido<br>'};
      if(document.getElementById('phone').value===document.getElementById('phone2').value){mensaje=mensaje+'Debe ser distinto al Teléfono<br>'};
      break;

      case 'desc':
      if(obj.value.length>400){mensaje='Caracteres máximo 400<br>'}
      break;

      case 'intereses':
      let chequed=0;
      let grupo=document.getElementsByClassName('form-check-input');
      for (let index = 0; index < grupo.length; index++) {
        if(grupo[index].checked)
        {
          chequed++;
          
        }  
      }
      if(chequed<2){
        mensaje='Debe seleccionar almenos dos intereses<br>';
        losChequed=false;
      }else{
        losChequed=true;
      }
      obj=document.getElementById('intereses');
      break;

    default:
      break;
  }
  obj.setCustomValidity(mensaje);
}
function quitaPhone2(){
  const obj=document.getElementById('phone2');
  comp(obj);
  if(obj.value!='')
  {
    document.getElementById('p_'+obj.id).innerHTML=obj.validationMessage;
  }
}
function quitaText(e){
  const obj=e.target;
  let restantes=400-obj.value.length;
  if(restantes<0){
    restantes=0;
  }
  document.getElementById('p2_'+obj.id).innerHTML='Caracteres restantes: '+restantes;
  comp(obj);
  document.getElementById('p2_'+obj.id).className =document.getElementById('p2_'+obj.id).className.replace( /(?:^|\s)valido(?!\S)/g , '' )
  if(obj.validity.valid){
    document.getElementById("p2_"+obj.id).className += " valido";
    document.getElementById('p_'+obj.id).innerHTML='';
  }
  
}
function quitaCheck(e){
  const obj=document.getElementById('intereses');
  
  comp(obj);
  if(obj.validity.valid){
    document.getElementById('p_'+obj.id).innerHTML='';
  }
  
}
function blurcheked(){
  let chequed=0;
      let grupo=document.getElementsByClassName('form-check-input');
     
      for (let index = 0; index < grupo.length; index++) {
        if(grupo[index].checked)
        {
          chequed++;
          
        }  
      }
      if(chequed<2){
        document.getElementById('p_intereses').innerHTML= 'Debe seleccionar almenos dos intereses<br>';
        losChequed=false;
      }else{
        losChequed=true;
      }
  
}

function final(e){
  if(losChequed==false)
  {
    e.preventDefault();
    document.getElementById('p_intereses').innerHTML= 'Debe seleccionar almenos dos intereses<br>';
  }
  let elform=document.getElementById('formulario');
  for (let index = 0; index < elform.length; index++) {
    
    if(elform[index].validity.valid==false)
    {
      let cartel=document.getElementById('p_submit');
      cartel.innerHTML='Algún campo no está correcto';
      e.preventDefault();
      setTimeout(function(){
        cartel.innerHTML=''},3000);
    }
    
  }

}