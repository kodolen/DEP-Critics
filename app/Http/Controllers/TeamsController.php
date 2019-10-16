<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class TeamsController extends Controller
{
    public function showTeams(){
        $teams = Team::all();

        if($teams->isEmpty()){
            $this->fillAllTeamsInDB();
            $teams = Team::all();
        }

        return view('home', [
           'teams' => $teams
        ]);
    }

    public function getAllTeams(){
        $client = new Client();
        $uri = 'https://api.football-data.org/v2/competitions/2003/teams';
        $header = ['headers' => ['X-Auth-Token' => '6328bfcb1468465c83bfecd7bada80c7']];
        $res = $client->get($uri, $header);
        $data = json_decode($res->getBody()->getContents(), true);
        return $data['teams'];
    }

    public function fillAllTeamsInDB(){
        $teams = $this->getAllTeams();

        collect($teams)
            ->each(function($team, $key){
                Team::create([
                    'team_id' => $team['id'],
                    'name' => $team['name'],
                    'logo' => $team['crestUrl']
                ]);
            });
    }

    public function showTeam($id){
        $teams = Team::findOrFail($id);
        echo $teams['name'];
        echo $teams['team_id'];
    }

}
