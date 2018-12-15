/*SCRIPT RESPONSÁVEL PELA SIMULAÇÃO DO EMPRESTIMO*/




/*Click para simulação*/


class Simulacao {

    constructor() {


        /*Criar váriaveis*/
    }

    Simular () {

        //build button
        //prevbtn.draw();

        //button listener
        // document.getElementById('simulation-value').addEventListener('click', function() {
        //
        //     console.log('pressed');
        // }.bind(this));

        $(document).on('click','#simulation-value', function(){

            this.calcular();
        });

    }
    // prevbtn.draw(){
    //console.log('prev btn')
    //}

    calcular() {
        console.log('simulando..!');
    }

}

var call = new Simulacao();
call.Simular();



