<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\WebApp;

class RegisterController extends Controller {
    
    public function store(Request $request) {
        $params = $request->all();
        $web_app = new WebApp($params['page_name'], $params['url'], $params['root_domain'], $params['hosting'], $params['metas'], $params['age']); 

        $result = DB::table('web_apps')->insert([[
            'name' => $web_app->getPageName(), 
            'url' => $web_app->getUrl(),
            'root_domain' => $web_app->getRootDomain(),
            'hosting' => $web_app->getHosting(),
            'metas' => $web_app->getMetas(),
            'age' => $web_app->getAge()
        ],]);

        if ($result) {
            $data = array(
                'code' => 200,
                'msg' => 'Registro Almacenado Correctamente!'
            );
        } else {
            $data = array(
                'code' => 400,
                'msg' => 'Error al Almacenar el Registro!'
            );
        }

        return view('welcome', compact('data'));
    }

    public function show() {
        $web_apps  = DB::table('web_apps')
            ->select()
            ->get();
    
        return view('welcome', compact('web_apps'));
    }

    public function delete(Request $request) {
        $params = $request->all();
        $web_app = new WebApp($params['delete_page_name'], null, null, null, null, null);

        $pdo = DB::getPdo();
        $x = $web_app->getPageName();

        $stmt = $pdo->prepare("begin :y := delete_record(:x); end;");
        $stmt->bindParam(':y', $y);
        $stmt->bindParam(':x', $x);
        $stmt->execute();

        if ($y > 0) {
            $data_delete = array(
                'code' => 200,
                'msg' => 'Registro Eliminado Correctamente!',
                'records' => $y
            );
        } else {
            $data_delete = array(
                'code' => 400,
                'msg' => 'Error al Eliminar el Registro!'
            );
        }

        return view('welcome', compact('data_delete'));
    }

    public function getOldest() {
        
        $age = DB::selectOne("select get_oldest as value from dual");

        $web_app = DB::table('web_apps')->select()->where('age', (int)$age->value)->first();

        $web_apps = array($web_app);

        return view('welcome', compact('web_apps'));
    }

    public function decrease(Request $request) {
        $params = $request->all();
        $p1 = $params['dec_page_name'];
        $pdo = DB::getPdo();

        $stmt = $pdo->prepare("begin decrease_age(:p1, :p2); end;");
        $stmt->bindParam(':p1', $p1, \PDO::PARAM_STR);
        $stmt->bindParam(':p2', $p2, \PDO::PARAM_INT);
        $stmt->execute();

        $response = array(
            'code' => 200
        );

        return view('welcome', compact('response'));
    }

    public function increase(Request $request) {
        $params = $request->all();
        $p1 = $params['inc_page_name'];
        $pdo = DB::getPdo();

        $stmt = $pdo->prepare("begin increase_age(:p1, :p2); end;");
        $stmt->bindParam(':p1', $p1, \PDO::PARAM_STR);
        $stmt->bindParam(':p2', $p2, \PDO::PARAM_INT);
        $stmt->execute();

        $response = array(
            'code' => 200
        );

        return view('welcome', compact('response'));
    }
}
