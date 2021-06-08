var xmlhttp = new XMLHttpRequest();
var url = "http://localhost:8888/Projet%20Final/json/data.json";
xmlhttp.open("GET",url, true);
xmlhttp.send();
xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var data = JSON.parse(this.responseText);
        // Années, axe x
        var year = data.evolution.map(function(elem){
            return elem.annee;
        });
        // Evolution nombre de joueurs
        var number = data.evolution.map(function(elem){
            return elem.nombre;
        });
        // Evolution nombre d'évenements
        var event = data.evolution.map(function(elem){
            return elem.evenement;
        });
        // Nombre de champions sortis
        var champion = data.evolution.map(function(elem){
            return elem.champion;
        });
        // Nombre de telechargements mobile
        var  download = data.evolution.map(function(elem){
            return elem.telechargement;
        });
        // Nombre de rework
        var  rework = data.evolution.map(function(elem){
            return elem.rework;
        });
        // Tranche d'age
        var  age = data.tranche_age.map(function(elem){
            return elem.age;
        });
        // Pourcentage de joueur par tranche d'age
        var  pourcent = data.tranche_age.map(function(elem){
            return elem.pourcentage;
        });

        // Premier graph
        var ctx = document.getElementById("graph1").getContext("2d")

        var data = {
            labels: year,
            datasets: [
                {
                    label: "Nombre de joueurs (en million)",
                    backgroundColor: "transparent",
                    borderColor: "red",
                    borderWidth: 4,
                    data: number,
                },
                {
                    label: "Nombre d'évenements",
                    backgroundColor: "transparent",
                    borderColor: "blue",
                    borderWidth: 4,
                    data: event,
                },
                {
                    label: "Nombre de champions sortis",
                    backgroundColor: "transparent",
                    borderColor: "green",
                    borderWidth: 4,
                    data: champion,
                },
            ]
        
        }
        
        var options = {
            responsive: true,
        }
        var config = {
            type: 'line',
            data: data,
            options: options
        }
        var graph1 = new Chart(ctx, config);
    

        //Deuxièeme graph
        var ctx = document.getElementById('graph2').getContext('2d');
        new Chart(ctx, {
        type: 'line',
        data: {
            labels: year,
            datasets: [{
            label: "Nombre de joueurs",
            yAxisID: 'A',
            borderColor: '#ffbaa2',
            backgroundColor: 'white',
            data: number,
            fill: false
            }, {
            label: "Nombre d'évenements",
            yAxisID: 'B',
            borderColor: '#91cf96',
            backgroundColor: 'white',
            data: event,
            fill: false
            }, {
            label: "Nombre de champions sortis",
            yAxisID: 'C',
            borderColor: '#c881d2',
            backgroundColor: 'white',
            data: champion,
            fill: false
            }, {
            label: "Nombre de rework",
            yAxisID: 'D',
            borderColor: '#c881r8',
            backgroundColor: 'white',
            data: rework,
            fill: false
            }, {
            label: 'Nombre de téléchargement mobile',
            yAxisID: 'E',
            borderColor: '#29b6f6',
            backgroundColor: 'white',
            data: download,
            fill: false
            }]
        },
        options: {
            tooltips: {
            mode: 'nearest'
            },
            scales: {
            yAxes: [{
                id: 'A',
                type: 'linear',
                position: 'left',
                ticks: {
                fontColor: '#ffbaa2',
                }
            }, {
                id: 'B',
                type: 'linear',
                position: 'right',
                ticks: {
                fontColor: '#91cf96',
                }
            }, {
                id: 'C',
                type: 'linear',
                position: 'right',
                ticks: {
                fontColor: '#c881d2',
                }
            }]
            },
            point: {
                radius: 5,
                borderWidth: 2,
                pointStyle: 'circle'
            }
        }
    })
        // troisième graph
        var ctx = document.getElementById("graph3").getContext("2d")

        var data = {
            labels: age,
            datasets: [
                {
                    label: "Nombre de joueurs (en million)",
                    backgroundColor: "#c881d2",
                    data: pourcent,
                }
            ]
        }

        var options = {
            responsive: true,
        }
        var config = {
            type: 'bar',
            data: data,
            options: options
        }
        var graph3 = new Chart(ctx, config);

}
}

