let volumen,radio,altura,radioAlC;
const pi = 3.14;

radio = prompt("Introduzca el radio del cono: ");
altura = prompt("Introduzca la altura del cono: ");

radioAlC = radio * radio;

volumen = ((1/3*pi)*radioAlC*altura);

console.log("EL volumen del cono es: " + volumen);