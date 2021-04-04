<?php
use App\Setting;
use App\Schedulle;
use App\Tour;
use App\Booking;

if (!function_exists('routeController')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function routeController($prefix, $controller)
    {
    	$name = str_replace("/",".",$prefix);
    	$prefix = trim($prefix, '/').'/';

    	if(substr($controller,0,1) != "\\") {
    		$controller = "\App\Http\Controllers\\".$controller;
    	}

    	$exp = explode("\\", $controller);
    	$controller_name = end($exp);

    	try {
    		Route::get($prefix, ['uses' => $controller.'@getIndex', 'as' => $name]);

    		$controller_class = new \ReflectionClass($controller);
    		$controller_methods = $controller_class->getMethods(\ReflectionMethod::IS_PUBLIC);
    		$wildcards = '/{one?}/{two?}/{three?}/{four?}/{five?}';
    		foreach ($controller_methods as $method) {

    			if ($method->class != 'Illuminate\Routing\Controller' && $method->name != 'getIndex') {
    				if (substr($method->name, 0, 3) == 'get') {
    					$method_name = substr($method->name, 3);
    					$slug = array_filter(preg_split('/(?=[A-Z])/', $method_name));
    					$as = $name.'.'.strtolower(implode('.', $slug));
    					$slug = strtolower(implode('-', $slug));
    					$slug = ($slug == 'index') ? '' : $slug;
    					Route::get($prefix.$slug.$wildcards, ['uses' => $controller.'@'.$method->name, 'as' => $as]);
    				} elseif (substr($method->name, 0, 4) == 'post') {
    					$method_name = substr($method->name, 4);
    					$slug = array_filter(preg_split('/(?=[A-Z])/', $method_name));
    					$as = $name.'.'.strtolower(implode('.', $slug));
    					$slug = strtolower(implode('-', $slug));
    					Route::post($prefix.$slug.$wildcards, [
    						'uses' => $controller.'@'.$method->name,
    						'as' => $as,
    					]);
    				}
    			}
    		}
    	} catch (\Exception $e) {

    	}
    }
}

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function setting($slug)
    {
        $setting = Setting::where('slug', $slug)->first();

        if (empty($setting)) {
            $null = Setting::where('slug', 'null')->first();

            return $null;
        }

        return $setting;
    }
}

if (!function_exists('tour')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function tour()
    {
        $tour = Tour::limit(2)->get();

        return $tour;
    }
}

if (!function_exists('destination')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function destination()
    {
        $destination = Schedulle::select('destination_code')
                        ->groupBy('destination_code')
                        ->orderByRaw('COUNT(*) DESC')
                        ->take(5)
                        ->get();

        return $destination;
    }
}

if (!function_exists('seat')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function seat($schedulle_id)
    {
        $schedulle = Schedulle::findOrFail($schedulle_id);

        $economy_booked_amount = Booking::where('schedulle_id', $schedulle_id)->where('type', 'Economy')->count();
        $data['economy'] = $schedulle->transportation->economy_seat - $economy_booked_amount;

        $bussiness_booked_amount = Booking::where('schedulle_id', $schedulle_id)->where('type', 'Bussiness')->count();
        $data['bussiness'] = $schedulle->transportation->bussiness_seat - $bussiness_booked_amount;

        $first_booked_amount = Booking::where('schedulle_id', $schedulle_id)->where('type', 'First')->count();
        $data['first'] = $schedulle->transportation->first_seat - $first_booked_amount;

        return $data;
    }
}