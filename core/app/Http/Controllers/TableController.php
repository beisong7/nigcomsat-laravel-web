<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function loadDB(Request $request){

        if($request->input('sponsor')==='super_admin'){




            $config = App::make('config');

            // Will contain the array of connections that appear in our database config file.
            $connections = $config->get('database.connections');

            // This line pulls out the default connection by key (by default it's `mysql`)
            $defaultConnection = $connections[$config->get('database.default')];

            // Now we simply copy the default connection information to our new connection.
            $newConnection = $defaultConnection;
            // Override the database name.
            $dbname = env('DB_DATABASE', '');
            $newConnection['database'] = $dbname;

            // This will add our new connection to the run-time configuration for the duration of the request.
            App::make('config')->set('database.connections.'.$dbname, $newConnection); // removed $newConnection


            Artisan::call('migrate',[
                '--path' => 'database/migrations',
                '--force' => true,
                '--database' => $newConnection['database']
            ]);

            return response()->json([
                'message'=>'Database Created ',
                'retry'=>false,
                'status'=>true
            ]);

        }else{
            return response()->json(['response'=>'invalid request']);
        }

    }

    public function resetDB(Request $request){

        if($request->input('sponsor')==='super_admin'){




            $config = App::make('config');

            // Will contain the array of connections that appear in our database config file.
            $connections = $config->get('database.connections');

            // This line pulls out the default connection by key (by default it's `mysql`)
            $defaultConnection = $connections[$config->get('database.default')];

            // Now we simply copy the default connection information to our new connection.
            $newConnection = $defaultConnection;
            // Override the database name.
            $dbname = env('DB_DATABASE', '');
            $newConnection['database'] = $dbname;

            // This will add our new connection to the run-time configuration for the duration of the request.
            App::make('config')->set('database.connections.'.$dbname, $newConnection); // removed $newConnection


            Artisan::call('migrate:refresh',[
                '--path' => 'database/migrations',
                '--force' => true,
                '--database' => $newConnection['database']
            ]);

            return response()->json([
                'message'=>'Database Rebuilt ',
                'retry'=>false,
                'status'=>true
            ]);

        }else{
            return response()->json(['response'=>'invalid request']);
        }

    }
}
