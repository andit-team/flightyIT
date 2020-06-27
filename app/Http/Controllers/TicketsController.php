<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Users\EloquentUser;
use App\Permission;
use App\Ticket;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Core;
use Sentinel;
use Session;
use Illuminate\Support\Facades\Storage;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Check Permission
        $this->check('ticket-view');

        $tickets = Ticket::orderBy('id', 'DESC')->get();
        return view('admin.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Permission
        $this->check('ticket-create');
            $agents = Sentinel::findRoleBySlug('agent'); 
            $agents = $agents->users()->get();
        return view('admin.ticket.create',compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Ticket $ticketModel)
    {
        // Check Permission
        $this->check('ticket-store');
        
        for ($i = 0; $i < count($request->ticket_no); $i++) {
            $ticketItem  = [
                'fname'           => $request->first_name[$i],
                'lname'           => $request->last_name[$i],
                'departure'       => $request->departure[$i],
                'return'          => $request->return[$i],
                'from'            => $request->from[$i],
                'to'              => $request->to[$i],
                'airline'         => $request->airline[$i],
                'mobile'          => $request->mobile[$i],
                'passport'        => $request->passport[$i],
                'ticket_no'       => $request->ticket_no[$i],
                'rate'            => $request->rate[$i],
                'agent'           => $request->agent[$i],
                'status'          => 'Unpaid',
            ];
            $ticketModel->create($ticketItem);
        }

        Session::flash('success', 'Ticket Added Succeed!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function check($txt){
        if (!Sentinel::hasAccess($txt)) {
            Session::flash('warning', 'Permission Denied!');
            return redirect()->back();
        }
    }
}
