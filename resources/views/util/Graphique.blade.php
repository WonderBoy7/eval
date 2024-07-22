@extends('include.forme')
@section('titre', 'Statistiques')
@section('content')

    <main class="main">
        @include('include.sidebar')
        <div class="content">

            <div class="py-4 px-3 px-md-4">
                <div class="card mb-3 mb-md-4">
                    <div class="card-body">

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0 ">Vente par mois global</div>
                            <div class="form-group">
                                <label for="annee">DateDebut :</label>
                                <input type="datetime-local" class="form-control" value="2023-01-01T00:00" id="anneeDebut" name="anneeDebut">
                                <label for="anneeFin">DateFin :</label>
                                <input type="datetime-local" class="form-control" value="2023-12-31T23:59" id="anneeFin" name="anneeFin">
                            </div>
                                <button onclick="setGraphique()" type="submit" class="btn btn-success">Statistique de ces Annees</button>
                    </div>
                    <div style="width: 70% ;  ">
                        <canvas id="canvas" height="450" width="600" token="{{ csrf_token() }}"></canvas>
                    </div>
                    </div>
                </div>
            </div>


        </div>
    </main>

{{--Graphiques_VenteParMoisGlobal--}}
{{--Graphiques_VenteParMoisParMagasin--}}
{{--Graphiques_Benefice--}}
    <script src="{{asset("assets/chart/chart.js")}}"></script>
    <script>
        function setGraphique() {
            alert('yo')
            var request = new XMLHttpRequest();
            var url = "/Graphiques_VenteParMoisGlobal";
            request.open("POST", url, true);
            request.setRequestHeader("Content-Type", "application/json");
            // Ajout du jeton CSRF à l'en-tête de la requête
            var csrfToken = document.getElementById('canvas').getAttribute('token');
            request.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            // Récupération des valeurs de anneeDebut et anneeFin
            var anneeDebut = document.getElementById('anneeDebut').value;
            var anneeFin = document.getElementById('anneeFin').value;

// Extraction de l'année et du mois de anneeDebut
            var dateDebut = new Date(anneeDebut);
            var anneeDebutValue = dateDebut.getFullYear();
            var moisDebutValue = dateDebut.getMonth() + 1; // Les mois sont indexés de 0 à 11, donc on ajoute 1

// Extraction de l'année et du mois de anneeFin
            var dateFin = new Date(anneeFin);
            var anneeFinValue = dateFin.getFullYear();
            var moisFinValue = dateFin.getMonth() + 1;

// Affichage des valeurs
//             alert("Année de début : " + anneeDebutValue);
//             alert("Mois de début : " + moisDebutValue);
//             alert("Année de fin : " + anneeFinValue);
//             alert("Mois de fin : " + moisFinValue);
            var tosend = {
                'anneeDebut': anneeDebutValue,
                'moisDebut': moisDebutValue,
                'anneeFin': anneeFinValue,
                'moisFin': moisFinValue
            };

            request.onreadystatechange = function () {
                if (request.readyState === 4 && request.status === 200) {
                    // Traitement des données de réponse
                    var response = JSON.parse(request.responseText);
                    console.log(response);
                    // alert(response);
                    // alert(response);
                    // var labels = response.labels;
                    // var data = response.data;
                    var labels = [];
                    var data = [];
                    // Boucler sur les éléments de la réponse
                    for (var i = 0; i < response.length; i++) {
                        labels.push(response[i].date);
                        data.push(response[i].prixtotal);
                    }
                    console.log(labels);
                    console.log(data);

// Boucler sur les données reçues
//                     for (var i = 0; i < labels.length; i++) {
//                         console.log("Label:", labels[i]);
//                         console.log("Data:", data[i]);
//                     }
                    initLinearChart(labels, data, 'canvas');
                    // initBoriboryChart(labels, data, 'canvas');
//                     initPieChart(labels, data, 'canvas');
                    // Reste du code...
                }
            };

            request.send(tosend);
        }



        window.addEventListener('load', function () {
            console.log('yo');
            var request = new XMLHttpRequest();
            var url = "/Graphiques_VenteParMoisGlobal";
            request.open("POST", url, true);
            request.setRequestHeader("Content-Type", "application/json");
            // Ajout du jeton CSRF à l'en-tête de la requête
            var csrfToken = document.getElementById('canvas').getAttribute('token');
            request.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            request.onreadystatechange = function () {
                if (request.readyState === 4 && request.status === 200) {
                    // Traitement des données de réponse
                    var response = JSON.parse(request.responseText);
                    console.log(response);
                    // alert(response);
                    // alert(response);
                    // var labels = response.labels;
                    // var data = response.data;
                    var labels = [];
                    var data = [];
                    // Boucler sur les éléments de la réponse
                    for (var i = 0; i < response.length; i++) {
                        labels.push(response[i].date);
                        data.push(response[i].prixtotal);
                    }
                    console.log(labels);
                    console.log(data);

// Boucler sur les données reçues
//                     for (var i = 0; i < labels.length; i++) {
//                         console.log("Label:", labels[i]);
//                         console.log("Data:", data[i]);
//                     }
                    initLinearChart(labels, data, 'canvas');
                    // initBoriboryChart(labels, data, 'canvas');
//                     initPieChart(labels, data, 'canvas');
                }
            };

            request.send();
        });

        function initLinearChart(labels, data, id) {
            var chartData = {
                labels: labels,
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "#265df1",
                        pointColor: "rgba(220,220,220,0.2)",
                        pointStrokeColor: "#265df1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "#265df1",
                        data: data
                    }
                ]
            };


            // window.onload = function () {
            var chartOptions = {responsive: true};
            var chart = document.getElementById(id).getContext("2d");
            // window.myBar = new Chart(chart).Line(chartData, chartOptions);
            window.myBar = new Chart(chart).Bar(chartData, chartOptions);
            // window.myBar = new Chart(chart).Radar(chartData, chartOptions);
            // }
        }

        function initBoriboryChart(labels, data, id) {
            var getRandomDataArray = function () {
                var dataArray = [];
                for (var i = 0; i < 7; i++) dataArray.push(Math.round(Math.random() * 100));
                return dataArray;
            }
            // alert('yo')
            var chartData = {
                labels: labels,
                datasets: [
                    {
                        fillColor: "#265df1",
                        strokeColor: "rgba(220,220,220,0.8)",
                        highlightFill: "rgba(220,220,220,0.75)",
                        highlightStroke: "rgba(220,220,220,1)",
                        data: data
                    }
                ]
            }
            var chartOptions = {responsive: true};
            var chart = document.getElementById(id).getContext("2d");
            window.myBar = new Chart(chart).Bar(chartData, chartOptions);

        }

        function initPieChart(labels, data, id) {
            console.log(labels);
            var chartData = [];
            for (var i = 0; i < labels.length; i++) {
                // alert(chartData);
                chartData.push({
                    value: data[i],
                    color: getRandomColor(),
                    highlight: 'black',
                    label: labels[i]
                });
            }
            var chartOptions = {responsive: true};
            var chart = document.getElementById(id).getContext("2d");
            window.myBar = new Chart(chart).PolarArea(chartData, chartOptions);
            // window.myBar = new Chart(chart).Pie(chartData, chartOptions);

            // window.myBar = new Chart(chart).Bar(chartData, chartOptions);
        }

        // function getRandomColor() {
        //     var letters = '0123456789ABCDEF';
        //     var color = '#';
        //
        //     for (var i = 0; i < 6; i++) {
        //         color += letters[Math.floor(Math.random() * 8)]; // Utilisez '8' au lieu de '16' pour des couleurs sombres
        //     }
        //
        //     return color;
        // }
        function getRandomColor() {
            var colors = [
                "#333333", // Gris foncé
                "#666666", // Gris moyen
                "#999999", // Gris clair
                "#CCCCCC", // Blanc cassé
                "#000000", // Noir
                "#00008B",  // Bleu foncé (navy)
                "#265df1"  // Bleu foncé (navy)
            ];

            var randomIndex = Math.floor(Math.random() * colors.length);
            return colors[randomIndex];
        }


        function lightenDarkenColor(color, percent) {
            var num = parseInt(color.slice(1), 16);
            var amt = Math.round(2.55 * percent);
            var R = (num >> 16) + amt;
            var B = (num >> 8 & 0x00FF) + amt;
            var G = (num & 0x0000FF) + amt;
            var newColor = "#" + (0x1000000 + (R < 255 ? (R < 1 ? 0 : R) : 255) * 0x10000 +
                (B < 255 ? (B < 1 ? 0 : B) : 255) * 0x100 +
                (G < 255 ? (G < 1 ? 0 : G) : 255)).toString(16).slice(1);
            return newColor;
        }
    </script>

    @endsection
    </body>

    </html>
