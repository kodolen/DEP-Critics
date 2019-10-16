<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEP Critics</title>


    <!-- TODO: Install via NPM. -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>

{{--<script>--}}
{{--    let apiUrlPath = 'https://api.football-data.org/v2/competitions/2003/teams';--}}
{{--    console.log("HEY");--}}

{{--    let myHeaders = new Headers({--}}
{{--        'X-Auth-Token': '6328bfcb1468465c83bfecd7bada80c7'--}}
{{--    });--}}



{{--    fetch(apiUrlPath, {--}}
{{--        headers: myHeaders--}}
{{--    })--}}
{{--        .then(response => response.json())--}}
{{--        .then(data => {--}}
{{--            console.log(data);--}}
{{--            for(let i = 0; i <= data.teams.length; i++){--}}
{{--                console.log(data.teams[i]);--}}
{{--                let teamsRow = document.getElementById("teams-row");--}}
{{--                let teamColumn = document.createElement("div");--}}
{{--                let teamLogo = document.createElement("img");--}}
{{--                teamLogo.src = data.teams[i].crestUrl + "";--}}
{{--                teamLogo.width = "50";--}}
{{--                teamColumn.className = "col-md-3";--}}
{{--                teamColumn.innerHTML = data.teams[i].name + "";--}}
{{--                teamColumn.appendChild(teamLogo);--}}
{{--                teamsRow.appendChild(teamColumn);--}}
{{--            }--}}
{{--        });--}}



{{--</script>--}}

<div class="row" id="teams-row">
    <div class="col-md-8 offset-md-2">
        <div class="row">
            @foreach($teams as $team)
                <div class="col-md-3">
                    <h3>{{ $team->name }}</h3>
                    <a href="{{ url('/team/'.$team->team_id)}}"><span>link</span></a>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
