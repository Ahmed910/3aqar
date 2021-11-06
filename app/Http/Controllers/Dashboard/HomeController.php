<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tracker;
use App\Models\{Branch, Car, CarModel, Category, City, Country, Order, Product, User , Ad};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!request()->ajax()) {
            //statistics
            $data['managers_count'] = User::where('user_type' , 'admin')->latest()->count();

            $clients = \DB::table('users')->where('user_type' , 'owner')->get();
            $data['clients'] = $clients ;
            $data['clients_count'] = $clients->count();
            $data['clients_is_ban_count'] = $clients->where('is_ban',1)->count();
            $data['clients_is_active_count'] = $clients->where('is_active',0)->count();

           
            $features = \DB::table('features')->get();
            $data['features_count'] = $features->count();

            $cities = \DB::table('cities')->get();
            $data['cities_count'] = $cities->count();

            $countries = \DB::table('countries')->get();
            $data['countries_count'] = $cities->count();
           

            $categories = \DB::table('categories')->get();
            $data['categories_count'] = $cities->count();
         

            $ads_query = Ad::latest()->get();
            $data['ads'] = $ads_query;
            $data['ads_count'] = $ads_query->count();

            $ads_rent= Ad::where('ad_type','rent')->latest()->get();
            $data['ads_rent_count'] = $ads_rent->count();

            $ads_rent= Ad::where('ad_type','sale')->latest()->get();
            $data['ads_sale_count'] = $ads_rent->count();
            
            $mowthqs = \DB::table('mowthqs')->get();
            $data['mowthqs_count'] = $mowthqs->count();

            $contracts = \DB::table('contracts')->get();
            $data['contracts_count'] = $contracts->count();

            $data['managers_count'] = User::where('user_type' , 'admin')->latest()->count();

            $clients = \DB::table('users')->where('user_type' , 'owner')->get();


            $data['clients_count'] = $clients->count();
            $data['clients_is_ban_count'] = $clients->where('is_ban',1)->count();
            $data['clients_is_inactive_count'] = $clients->where('is_active',0)->count();
            $data['clients_is_active_count'] = $clients->where('is_active',1)->count();

        ///////////////////////////////////////////////////////////////////////////////////////////
        $from_date = '';
        $to_date = '';
        if ($request->from_date && $request->to_date) {
            $from_date = \Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
            $to_date = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
        } elseif ($request->from_date) {
            $from_date = \Carbon\Carbon::parse($request->from_date)->format('Y-m-d');
        } elseif ($request->to_date) {
            $to_date = \Carbon\Carbon::parse($request->to_date)->format('Y-m-d');
        }
        // <==============================Charts============================>
        $client_active_analytics = $data['clients']->filter(function ($item) {
            return $item->is_active == true && $item->is_ban == false;
        })->when($request->from_date || $request->to_date, function ($collection) use ($from_date, $to_date) {
            if ($from_date && $to_date) {
                return $collection->filter(function ($item) use ($from_date, $to_date) {
                    if ($item->created_at->format("Y-m-d") <= $to_date && $item->created_at->format("Y-m-d") >= $from_date) {
                        return $item;
                    }
                });
            } elseif ($from_date) {
                return $collection->filter(function ($item) use ($from_date) {
                    if ($item->created_at->format("Y-m-d") >= $from_date) {
                        return $item;
                    }
                });
            } elseif ($to_date) {
                return $collection->filter(function ($item) use ($to_date) {
                    if ($item->created_at->format("Y-m-d") <= $to_date) {
                        return $item;
                    }
                });
            }
        })->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('Y-m');
        });
        $client_deactive_analytics = $data['clients']->filter(function ($item) {
            return $item->is_active == false  && $item->is_ban == false;
        })->when($request->from_date || $request->to_date, function ($collection) use ($from_date, $to_date) {
            if ($from_date && $to_date) {
                return $collection->filter(function ($item) use ($from_date, $to_date) {
                    if ($item->created_at->format("Y-m-d") <= $to_date && $item->created_at->format("Y-m-d") >= $from_date) {
                        return $item;
                    }
                });
            } elseif ($from_date) {
                return $collection->filter(function ($item) use ($from_date) {
                    if ($item->created_at->format("Y-m-d") >= $from_date) {
                        return $item;
                    }
                });
            } elseif ($to_date) {
                return $collection->filter(function ($item) use ($to_date) {
                    if ($item->created_at->format("Y-m-d") <= $to_date) {
                        return $item;
                    }
                });
            }
        })->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('Y-m');
        });
        $client_banned_analytics = $data['clients']->filter(function ($item) {
            return $item->is_ban == true;
        })->when($request->from_date || $request->to_date, function ($collection) use ($from_date, $to_date) {
            if ($from_date && $to_date) {
                return $collection->filter(function ($item) use ($from_date, $to_date) {
                    if ($item->created_at->format("Y-m-d") <= $to_date && $item->created_at->format("Y-m-d") >= $from_date) {
                        return $item;
                    }
                });
            } elseif ($from_date) {
                return $collection->filter(function ($item) use ($from_date) {
                    if ($item->created_at->format("Y-m-d") >= $from_date) {
                        return $item;
                    }
                });
            } elseif ($to_date) {
                return $collection->filter(function ($item) use ($to_date) {
                    if ($item->created_at->format("Y-m-d") <= $to_date) {
                        return $item;
                    }
                });
            }
        })->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('Y-m');
        });

        for ($i = 0; $i <= 12; $i++) {
            if (isset($client_active_analytics[now()->subMonths($i)->format('Y-m')])) {
                $data['client_active_analytics'][now()->subMonths($i)->format('Y-m')] = $client_active_analytics[now()->subMonths($i)->format('Y-m')]->count();
            } else {
                $data['client_active_analytics'][now()->subMonths($i)->format('Y-m')] = 0;
            }
            if (isset($client_deactive_analytics[now()->subMonths($i)->format('Y-m')])) {
                $data['client_deactive_analytics'][now()->subMonths($i)->format('Y-m')] = $client_deactive_analytics[now()->subMonths($i)->format('Y-m')]->count();
            } else {
                $data['client_deactive_analytics'][now()->subMonths($i)->format('Y-m')] = 0;
            }
            if (isset($client_banned_analytics[now()->subMonths($i)->format('Y-m')])) {
                $data['client_banned_analytics'][now()->subMonths($i)->format('Y-m')] = $client_banned_analytics[now()->subMonths($i)->format('Y-m')]->count();
            } else {
                $data['client_banned_analytics'][now()->subMonths($i)->format('Y-m')] = 0;
            }
        }



          return view('dashboard.home.index' , $data);
        }
    }

    // Search Method

    public function getSearch(Request $request)
    {
        $query = request()->search;
        $request->validate([
            'search' => 'required'
        ]);
        $user_query = User::latest();
        $clients = $user_query->where('user_type','customer')->where(function($q)use($query){
            $q->where('name',"LIKE","%{$query}%")->orWhere('email',"LIKE","%{$query}%")->orWhere('phone',"LIKE","%{$query}%");
        });

        $drivers = $user_query->where('user_type','driver')->where(function($q)use($query){
            $q->where('name',"LIKE","%{$query}%")->orWhere('email',"LIKE","%{$query}%")->orWhere('phone',"LIKE","%{$query}%");
        });

        $admins = $user_query->where('user_type','admin')->where(function($q)use($query){
            $q->where('name',"LIKE","%{$query}%")->orWhere('email',"LIKE","%{$query}%")->orWhere('phone',"LIKE","%{$query}%");
        })->where('id',"<>",auth()->id());

        //$brands = Brand::whereTranslationLike('name',"%{$query}%",'ar')->orWhereTranslationLike('name',"%{$query}%",'en')->orWhereTranslationLike('desc',"%{$query}%",'ar')->orWhereTranslationLike('desc',"%{$query}%",'en');

        $search_type = 'client';
        if (array_key_exists('admin',$request->query()) || ($admins->count() && !$clients->count())) {
            $search_type = 'admin';
        }elseif (array_key_exists('driver',$request->query()) || (!$admins->count() && !$clients->count() && $drivers->count())) {
            $search_type = 'driver';
        }

        $data = [
                'clients_count' => $clients->count(),
                'admins_count' => $admins->count(),
                'drivers_count' => $drivers->count(),

                'clients' => $clients->paginate(50,['*'],'client'),
                'admins' => $admins->paginate(50,['*'],'admin'),
                'drivers' => $drivers->paginate(50,['*'],'driver'),

                'keyword' => $query,
                'search_type' => $search_type,
                'total_count' => $clients->count() + $admins->count() + $drivers->count()
            ];
        return view('dashboard.search.search',$data);
    }

}
