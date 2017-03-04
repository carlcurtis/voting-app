<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Voting extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function makeVote()
    {
        //Fetch values from DB
        $data['constituencies'] = DB::select('select * from voting.constituencies order by name');//select sll constituencies
        $data['parties'] = DB::select('select * from voting.parties order by name');//select all parties
        return view('vote.make', $data);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveVote(Request $request)
    {
        //Get posted values
        $constit = $request->input('constituency');
        $party   = $request->input('party');
        $voting  = $request->input('voting');
        //Insert Values into DB
        DB::insert('insert into voting.votes (constituency, party, voting) values (?, ?, ?)', [$constit, $party, $voting]);

        //Display Success Page
        return view('vote.success');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showVotes()
    {
        //Get Stats from DB

        //Select results grouped by constituency and party
        $data['constituencyResults'] = DB::select('
        SELECT
          voting.constituencies.name as constit,
          voting.parties.name as party,
          sum(case voting.votes.voting when 1 then 1 end) as intend_to_vote,
          sum(case voting.votes.voting when 0 then 1 end) as non_voters
        FROM
          voting.votes,
          voting.constituencies,
          voting.parties
        WHERE
        	voting.votes.party = voting.parties.id AND
        	voting.votes.constituency = voting.constituencies.id
        GROUP BY
          constit,
          party
        ORDER BY
        	constit,
          party
        ');

        //select results group by party only
        $data['nationalResults'] = DB::select('
        SELECT
          voting.parties.name as party,
          sum(case voting.votes.voting when 1 then 1 end) as intend_to_vote,
          sum(case voting.votes.voting when 0 then 1 end) as non_voters
        FROM
          voting.votes,
          voting.parties
        WHERE
          voting.votes.party = voting.parties.id
        GROUP BY
          party
        ORDER BY
          party
        ');

        return view('vote.stat', $data);
    }
}
