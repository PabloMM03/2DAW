/*****************************************
DEFINICIÓN DE CÓDIGOS UNICODE
*****************************************/
const PALO_PICAS = "♠";
const PALO_TREBOLES = "♣";
const PALO_CORAZONES = "♥";
const PALO_DIAMANTES = "♦";

const SIMBOLO_A = "A";
const SIMBOLO_2 = "2";
const SIMBOLO_3 = "3";
const SIMBOLO_4 = "4";
const SIMBOLO_5 = "5";
const SIMBOLO_6 = "6";
const SIMBOLO_7 = "7";
const SIMBOLO_J = "J";
const SIMBOLO_Q = "Q";
const SIMBOLO_K = "K";

const ESQUINA_SUP_IZQ = "┏";
const ESQUINA_SUP_DER = "┓";
const ESQUINA_INF_IZQ = "┗";
const ESQUINA_INF_DER = "┛";

const BORDE_HORIZONTAL = "━";
const BORDE_VERTICAL = "┃";

const ESPACIO_EN_BLANCO = " ";
const FILAS = 7;
const COLUMNAS = 9;
const PALOS = ['picas', 'diamantes', 'treboles', 'corazones'];
const SIMBOLOS = [SIMBOLO_A, SIMBOLO_2, SIMBOLO_3, SIMBOLO_4, SIMBOLO_5, SIMBOLO_6, SIMBOLO_7, SIMBOLO_J, SIMBOLO_K, SIMBOLO_Q];

/*****************************************
CLASE CARTA
*****************************************/
class Carta {

    #sSimbolo;
    #sPalo;
    #aCarta;

    constructor(sSimbolo, sPalo){
        this.sSimbolo = sSimbolo;
        this.sPalo = sPalo;
        this.aCarta = [];
    }
    toString(){
        let a = '';
        for(let i =0; i<FILAS; i++){
            for(let j =0; j<COLUMNAS; j++){
                a = a + this.aCarta[i][j];
            }
            a = a + '\n';
        }
        return 'Carta: \n' + a;
    }
    get sSimbolo(){
        return this.#sSimbolo;
    }
    set sSimbolo(sSimbolo){
        switch(sSimbolo){
            case 'A':
                this.#sSimbolo = SIMBOLO_A;
                break;
            case '2': 
                this.#sSimbolo = SIMBOLO_2;
                break;
            case '3':
                this.#sSimbolo = SIMBOLO_3;
                break
            case '4':
                this.#sSimbolo = SIMBOLO_4;
                break;
            case '5':
                this.#sSimbolo = SIMBOLO_5;
                break;
            case '6':
                this.#sSimbolo = SIMBOLO_6;
                break;
            case '7':
                this.#sSimbolo = SIMBOLO_7;
                break;
            case 'J': 
                this.#sSimbolo = SIMBOLO_J;
                break;
            case 'Q':
                this.#sSimbolo = SIMBOLO_Q;
                break;
            case 'K':
                this.#sSimbolo = SIMBOLO_K;
                break;
            default:
                console.error('Parametro no valido');
                break;   
        }
    }
    get sPalo(){
        return this.#sPalo;
    }
    set sPalo(sPalo){
        switch(sPalo){
            case 'diamantes':
                this.#sPalo = PALO_DIAMANTES;
                break;
            case 'picas':
                this.#sPalo = PALO_PICAS;
                break;
            case 'corazones':
                this.#sPalo = PALO_CORAZONES;
                break;
            case 'treboles':
                this.#sPalo = PALO_TREBOLES;
                break;
            default:
                console.error('Parametro no valido');
                break;
        }
    }
    get aCarta(){
        return this.#aCarta;
    }
    set aCarta(aCarta){
        if(!this.sPalo || !this.sSimbolo){
            console.error('Parametros no validos');
        }else{
            aCarta = this.#inicializarCarta(aCarta);
            aCarta = this.#incluirLineas(aCarta);
            aCarta = this.#incluirPalo(aCarta);
            aCarta = this.#incluirSimbolo(aCarta);
            this.#aCarta = aCarta;
           
        }
    }
    #inicializarCarta(){
        let arrayCarta = [];
            for(let i = 0; i<FILAS; i++){
                let fila = [];
                for(let j = 0; j<COLUMNAS; j++){
                    fila.push(" ");
                }
                arrayCarta.push(fila);
            }
            return arrayCarta;
    }
    #incluirLineas(arrayCarta){
        for(let i = 0; i<FILAS; i++){
            ;
            for(let j = 0; j<COLUMNAS; j++){
                if(i === 0 || i === FILAS - 1){
                    arrayCarta[i][j] = BORDE_HORIZONTAL;
                }else if(j === 0 || j === COLUMNAS - 1){
                    arrayCarta[i][j] = BORDE_VERTICAL;
                }if(i === 0 && j ===0){
                    arrayCarta[i][j] = ESQUINA_SUP_IZQ;
                }if (i === 0 && j === COLUMNAS - 1) {
                    arrayCarta[i][j] = ESQUINA_SUP_DER;
              }
              if (i === FILAS - 1 && j === 0) {
                    arrayCarta[i][j] = ESQUINA_INF_IZQ;
              }
              if (i === FILAS - 1 && j === COLUMNAS - 1) {
                    arrayCarta[i][j] = ESQUINA_INF_DER;
              }
            }
        }
        return arrayCarta;
    }
    #incluirSimbolo(arrayCarta){
            for(let i = 0; i<FILAS; i++){
                for(let j = 0; j<COLUMNAS; j++){
                    if((i === 1 && j === 1) || (i === 5 && j === 7)){
                        switch(this.sSimbolo){
                        case 'A':
                            arrayCarta[i][j] = SIMBOLO_A;
                            break;
                        case '2':
                            arrayCarta[i][j] = SIMBOLO_2;
                            break;
                        case '3':
                            arrayCarta[i][j] = SIMBOLO_3;
                            break;
                        case '4':
                            arrayCarta[i][j] = SIMBOLO_4;
                            break;
                        case '5':
                            arrayCarta[i][j] = SIMBOLO_5;
                            break;
                        case '6':
                            arrayCarta[i][j] = SIMBOLO_6;
                            break;
                        case '7':
                            arrayCarta[i][j] = SIMBOLO_7;
                            break;
                        case 'J':
                            arrayCarta[i][j] = SIMBOLO_J;
                            break;
                        case 'Q':
                            arrayCarta[i][j] = SIMBOLO_Q;
                            break;
                        case 'K':
                            arrayCarta[i][j] = SIMBOLO_K;
                            break;
                        default:
                            console.error('Parametro no valido');
                            break;
                        }
                    }
                }
            }
            return arrayCarta;
    }
    #incluirPalo(arrayCarta){
        for(let i = 0; i<FILAS; i++){
            for(let j = 0; j<COLUMNAS; j++){
                if(i === 3 && j ===4){
                    if(this.sPalo == PALO_PICAS){
                        arrayCarta[i][j] = PALO_PICAS;
                    }if(this.sPalo == PALO_CORAZONES){
                        arrayCarta[i][j] = PALO_CORAZONES;
                    }if(this.sPalo == PALO_DIAMANTES){
                        arrayCarta[i][j] = PALO_DIAMANTES;
                    }if(this.sPalo == PALO_TREBOLES){
                        arrayCarta[i][j] = PALO_TREBOLES;
                    }

                }
            }
        }
        return arrayCarta;
    }


}

/*****************************************
MONTONES
*****************************************/

class Baraja{
    #baraja;

    constructor(){
        this.baraja = [];
    }
    get baraja(){
        return this.#baraja;
    }
    set baraja(baraja){
        for (let i = 0; i < SIMBOLOS.length; i++) {
            for (let j = 0; j < PALOS.length; j++) {
                  baraja.push(new Carta(SIMBOLOS[i], PALOS[j]));
            }
      }
      this.#baraja = baraja;
}
toString() {
      let a = '';
      for (let i = 0; i < this.baraja.length; i++) {
            a = a + this.baraja[i].toString();
      }
      return a;
}
barajar() {
      let valorAuxiliar;
      for (let i = this.baraja.length - 1; i > 0; i--) {
            const j = aleatorioEntre(0, i - 1);
            valorAuxiliar = this.baraja[i];
            this.baraja[i] = this.baraja[j];
            this.baraja[j] = valorAuxiliar;
      }
      return this.#baraja;
}
}
//TODO
function aleatorioEntre(min, max) {
return Math.floor(Math.random() * (max - min + 1) + min);
}