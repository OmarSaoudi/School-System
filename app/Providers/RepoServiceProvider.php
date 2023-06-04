<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\MyparentRepositoryInterface', 'App\Repository\MyparentRepository');
        $this->app->bind('App\Repository\TeacherRepositoryInterface', 'App\Repository\TeacherRepository');
        $this->app->bind('App\Repository\StudentRepositoryInterface', 'App\Repository\StudentRepository');
        $this->app->bind('App\Repository\StudentPromotionRepositoryInterface', 'App\Repository\StudentPromotionRepository');
        $this->app->bind('App\Repository\FeeRepositoryInterface', 'App\Repository\FeeRepository');
        $this->app->bind('App\Repository\FeeInvoiceRepositoryInterface', 'App\Repository\FeeInvoiceRepository');
        $this->app->bind('App\Repository\ReceiptStudentRepositoryInterface', 'App\Repository\ReceiptStudentRepository');
        $this->app->bind('App\Repository\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
        $this->app->bind('App\Repository\PaymentStudentRepositoryInterface', 'App\Repository\PaymentStudentRepository');
        $this->app->bind('App\Repository\AttendanceRepositoryInterface', 'App\Repository\AttendanceRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
