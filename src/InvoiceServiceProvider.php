<?php
/**
 * Invoicr For Laravel.
 *
 * @author      The Departed 
 * @license     https://opensource.org/license/gpl-3-0/ GNU-3.0
 *
 * @link        https://github.com/theDepart3d/laravel-source-encryption
 */

namespace thedepart3d\InvoicrForLaravel;

use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        // Publish files
        $this->publishes([
            __DIR__ . '/config/invoicr.php' => config_path('invoicr.php'),
            __DIR__ . '/app/Models/GenerateInvoice.php' => base_path('app/Models/GenerateInvoice.php'),
            __DIR__ . '/app/Models/invlib/' => base_path('app/Models/invlib/'),
        ], 'laravel-assets');
    }
}