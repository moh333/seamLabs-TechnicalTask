<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->macroApiResponse();
    }

    /**
     * @return void
     */
    public function macroApiResponse(): void
    {
        Response::macro("requestValidation", function ($validator,$code=200) {

            return response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ],$code);

        });

        Response::macro("successResponse", function ($message,$data,$code = 200) {
            return response()->json([
                'success'   => true,
                'message'   => $message,
                'data'      => $data
            ],$code);
        });

        Response::macro("failResponse", function ($message,$code = 200) {
            return response()->json([
                'success'   => false,
                'message'   => $message,
            ],$code);
        });

        Response::macro("unAuthorizeResponse", function ($code = 401) {
            return response()->json([
                'success'   => false,
                'message'   => trans('Unauthenticated'),
            ],$code);
        });
        
    }
}
