<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


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
    public function boot()
    {
        Validator::extend('fecha', function ($attribute, $value, $parameters, $validator) {
            $fnacimiento = $validator->getData()['fnacimiento'];
            $fechaMinima = date('Y-m-d', strtotime($fnacimiento . ' +18 years'));
            return $value >= $fechaMinima;
        });
            Validator::extend('imc', function ($attribute, $value, $parameters, $validator) {
                $talla = $validator->getData()['talla'];
                $peso = $validator->getData()['peso'];
                $imc = $this->calcularIMC($talla, $peso);
                return $imc <= 25;
            });
        }
        
        private function calcularIMC($talla, $peso) {
            if (empty($talla)) {
                return "La talla no puede estar vacía";
            }
            
            $alturaMetros = $talla / 100; // Convertir la altura a metros
            return $peso / ($alturaMetros * $alturaMetros);
        }
        
    
    
}