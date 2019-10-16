<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class TeamsController extends Controller
{
    public function showTeams()
    {
        $teams = Team::all();
        $this->fillAllPlayersInDB();

        if ($teams->isEmpty()) {
            $this->fillAllTeamsInDB();
            $teams = Team::all();
            $this->fillAllPlayersInDB();
        }

        return view('home', [
            'teams' => $teams
        ]);
    }

    public function getAllTeams()
    {
        $client = new Client();
        $uri = 'https://api.football-data.org/v2/competitions/2003/teams';
        $header = ['headers' => ['X-Auth-Token' => '6328bfcb1468465c83bfecd7bada80c7']];
        $res = $client->get($uri, $header);
        $data = json_decode($res->getBody()->getContents(), true);
        return $data['teams'];
    }

    public function fillAllTeamsInDB()
    {
        $teams = $this->getAllTeams();

        collect($teams)
            ->each(function ($team, $key) {
                Team::create([
                    'team_id' => $team['id'],
                    'name' => $team['name'],
                    'logo' => $team['crestUrl']
                ]);
            });
    }

    public function showTeam($id)
    {
        $teams = Team::findOrFail($id);
        echo $teams['name'];
        echo $teams['team_id'];
    }

    public function fillAllPlayersInDB()
    {
//        $teams_id = Team::pluck('team_id');
//
//        foreach ($teams_id as $team_id) {
//            $uri = 'https://api.football-data.org/v2/teams/' . $team_id;
//        }

        $header = ['headers' => ['X-Auth-Token' => '6328bfcb1468465c83bfecd7bada80c7']];
        $client = new Client(['debug' => true]);
        $res = $client->send(array(
            $client->get('https://api.football-data.org/v2/teams/666'),
            $client->get('https://api.football-data.org/v2/teams/1920'),
            $client->get('https://api.football-data.org/v2/teams/6806')
        ));
        $data = json_decode($res->getBody()->getContents(), true);
        return $data;

    }
}
