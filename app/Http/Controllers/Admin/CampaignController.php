<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    //Devuelve la vista con las campañas
    public function index()
    {

        $campaigns = Campaign::all();

        //dd($products);

        return view('admin.campaigns')
            ->with('campaigns', $campaigns);
    }

    //Guarda una nueva campaña
    public function store(Request $request)
    {


        $campaign = new Campaign();

        $campaign->name = $request->input('name');
        $campaign->description = $request->input('description');
        $campaign->expectedrevenue = $request->input('expectedrevenue');
        $campaign->status = $request->input('status');
        $campaign->beginning_month = $request->input('beginning_month');
        $campaign->beginning_year = $request->input('beginning_year');

        $campaign->ending_month = $request->input('ending_month');
        $campaign->ending_year = $request->input('ending_year');

        if ($campaign->beginning_year <= $campaign->ending_year) {
            if ($campaign->beginning_year == $campaign->ending_year && $campaign->beginning_month >= $campaign->ending_month) {
                return redirect('/campaigns')->with('errorstatus', 'Error. El mes de inicio es posterior al mes de finalizacion.');
            }
            $campaign->save();
            return redirect('/campaigns')->with('status', 'Campaña añadida con éxito.');
        } else {

            return redirect('/campaigns')->with('errorstatus', 'Error.Las fechas introducidas incorrectas.');
        }
    }


    /* funcion que redirige a la pagina para editar los datos de una campaña con id $id */
    public function campaignedit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaignEdit')->with('campaign', $campaign);
    }


    /* funcion que permite cambiar los datos de una campaña */
    public function campaignupdate(Request $request, $id)
    {


        $campaign = Campaign::find($id);
        $campaign->name = $request->input('name');
        $campaign->description = $request->input('description');
        $campaign->expectedrevenue = $request->input('expectedrevenue');
        $campaign->status = $request->input('status');
        $campaign->beginning_month = $request->input('beginning_month');
        $campaign->beginning_year = $request->input('beginning_year');

        $campaign->ending_month = $request->input('ending_month');
        $campaign->ending_year = $request->input('ending_year');

        if ($campaign->beginning_year <= $campaign->ending_year) {


            if ($campaign->beginning_year == $campaign->ending_year && $campaign->beginning_month >= $campaign->ending_month) {
                return redirect('/campaigns')->with('errorstatus', 'Error. El mes de inicio es posterior al mes de finalizacion.');
            }

            $campaign->update();
            return redirect('/campaigns')->with('status', 'Cambios guardados con exito');
        } else {

            return redirect('/campaigns')->with('errorstatus', 'Error. Las fechas introducidas son incorrectas.');
        }
    }


    /* funcion que permite eliminar una campaña de la base de datos */
    public function campaigndelete($id)
    {

        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        return redirect('/campaigns')->with('status', 'Campaña eliminada con exito');
    }
}
